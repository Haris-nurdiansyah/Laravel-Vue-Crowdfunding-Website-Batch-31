<?php

namespace App;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use UsesUUID;

    protected $guarded = [];
}
