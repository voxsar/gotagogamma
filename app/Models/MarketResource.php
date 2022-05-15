<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketResource extends Model
{
    use HasFactory;

    public function user()
    {
        # code...
        return $this->belongsTo("App\Models\User");
    }

    public function resource()
    {
        # code...
        return $this->belongsTo("App\Models\Resource");
    }

    public function market()
    {
        # code...
        return $this->belongsTo("App\Models\Market");
    }
}
