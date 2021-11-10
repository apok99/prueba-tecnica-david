<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    
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
    
    public function delete(){
        $this->updatedAt = now();
        $this->deletedAt = now();
        $this->save();
        return $this;
    }
}
