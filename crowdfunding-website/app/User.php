<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'email', 'username', 'role_id',
    ];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model)
        {
            if (empty($model->{$model->getKeyName})) {
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });

        static::creating(function ($model)
        {
            $user_role = Role::where('name', 'user')->first();
            $model->role_id = $user_role->id;
        });
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function ote_code()
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
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
