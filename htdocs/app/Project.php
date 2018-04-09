<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class Project extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    protected $table='projects';


    public function members(){
        return $this->belongsToMany(User::class,'members','project_id','user_id');
    }

    public function manager(){
        return $this->belongsTo(User::class);
        
    }
}
