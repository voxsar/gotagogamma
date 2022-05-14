<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingUser extends Model
{
    use HasFactory;

    public function user()
    {
        # code...
        return $this->belongsTo("App\Models\User");
    }

    public function building()
    {
        # code...
        return $this->belongsTo("App\Models\Building", "building_id");
    }
}
