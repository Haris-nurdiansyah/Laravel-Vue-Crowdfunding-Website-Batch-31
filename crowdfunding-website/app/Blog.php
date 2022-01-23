<?php

namespace App;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use UsesUUID;

    protected $guarded = [];
}
