<?php

namespace App;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use UsesUUID;

    protected $fillable = ['name'];
    protected $primaryKey = 'id';

    // tidak perlu menggunakan script dibawah karna sudah di buat di trait UsesUUID

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
    // }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
