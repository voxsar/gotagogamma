<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;

    protected $dates = ["expiry_date"];

    public function buyer()
    {
        # code...
        return $this->belongsTo("App\Models\User", "buyer_user_id");
    }

    public function seller()
    {
        # code...
        return $this->belongsTo("App\Models\User", "seller_user_id");
    }

    public function resources()
    {
        # code...
        return $this->belongsToMany("App\Models\Resource", "market_resources", "market_id", "resource_id")->withPivot("amount");
    }
}
