<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ["upgrade_completetime"];

    public function resources()
    {
        # code...
        return $this->belongsToMany("App\Models\Resource", "resource_users", "user_id", "resource_id")->withPivot("amount");
    }

    public function buildings()
    {
        # code...
        return $this->belongsToMany("App\Models\Building", "building_users", "user_id", "building_id")->withPivot("level");
    }

    public function slots()
    {
        # code...
        return $this->hasMany("App\Models\BuildingUser");
    }
}
