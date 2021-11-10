<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkEntry extends Model
{
    use HasFactory;

    protected $table = "workentries";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
    */
    protected $fillable = [
        'startDate',
        'endDate'
    ];

    protected $hidden = [
        'userId',
        'createdAt',
        'updatedAt',
        'deletedAt'
    ];
    
    public function user(){
        return $this->belongsTo('App\Models\User', 'userId');
    }

    public function delete(){
        $this->updatedAt = now();
        $this->deletedAt = now();
        $this->save();
        return $this;
    }
}
