<?php

namespace App;

use App\Traits\UsesUUID;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'email', 'role_id', 'foto_profile', 'email_verified_at',
    ];
    protected $primaryKey = 'id';
    // protected $keyType = 'string';
    // public $incrementing = false;

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model)
    //     {
    //         if (empty($model->{$model->getKeyName})) {
    //             $model->{$model->getKeyName()} = Str::uuid();
    //         }
    //     });

    //     static::creating(function ($model)
    //     {
    //         $user_role = Role::where('name', 'user')->first();
    //         $model->role_id = $user_role->id;
    //     });
    // }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model)
        {
            $user_role = Role::where('name', 'user')->first();
            $model->role_id = $user_role->id;
        });

        static::created(function ($model)
        {
            $model->generate_otp_code();
        });
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function otp_code()
    {
        return $this->hasOne(OtpCode::class);
    }

    public function isAdmin()
    {
        if ($this->role->name === "admin") {
            return true;
        }
        return false;
    }

    public function generate_otp_code()
    {
        do {
            $random = random_int(100000, 999999);
            $check = OtpCode::where('otp', $random)->first();
        } while ($check);

        $now = Carbon::now();

        $otp_code = OtpCode::updateOrCreate(
            ['user_id' => $this->id],
            ['otp' => $random, 'valid_until' => $now->addMinutes(5)]
        );
    }

    // public function get_role_user_id()
    // {
    //     $role = Role::where('name', 'user')->first();

    //     return $role->id;
    // }

    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
