<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    public function costs()
    {
        # code...
        return $this->belongsToMany("App\Models\Resource", "building_costs", "building_id", "resource_id")->withPivot("cost");
    }

    public function productions()
    {
        # code...
        return $this->belongsToMany("App\Models\Resource", "building_productions", "building_id", "resource_id")->withPivot("produce");
    }

    public function requirements()
    {
        # code...
        return $this->belongsToMany("App\Models\Building", "building_requirements", "building_id", "cost_building_class")->withPivot("level");
    }

    public function provision()
    {
        # code...
        return $this->belongsToMany("App\Models\Building", "building_requirements", "cost_building_class", "building_id")->withPivot("level");
    }

    public function getADescriptionAttribute()
    {
        # code...
        $str = "The ".$this->name." building will cost you ";
        foreach ($this->costs as $key => $cost) {
            # code...
            $str .= $cost->pivot->cost ." ". $cost->name. ", ";
        }
        $str .= " and you need to have the follow requirements";
        foreach ($this->requirements as $key => $requirement) {
            # code...
            $str .= " a minimum of ".$requirement->name." at level ". $requirement->pivot->level . ", ";
        }
        $str .= " once you get this building you can get";
        foreach ($this->provision as $key => $provisio) {
            # code...
            $str .= $provisio->name." at level ". $provisio->pivot->level . ", ";
        }
        return $str;
    }

    public function getImageAttribute()
    {
        # code...
        return asset($this->image_url);
    }
}
