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
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'startDate' => 'datetime:Y-m-d H:i:s',
        'endDate' => 'datetime:Y-m-d H:i:s',
        'createdAt' => 'datetime:Y-m-d H:i:s',
        'updatedAt' => 'datetime:Y-m-d H:i:s',
        'deletedAt' => 'datetime:Y-m-d H:i:s'
    ];

    public function workEntries(){
        $this->hasMany('App\Models\WorkEntry');
    }

}
