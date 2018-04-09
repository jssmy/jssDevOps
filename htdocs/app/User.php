<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Project;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function collaborate_projects(){
        return $this->belongsToMany(Project::class,'members','user_id','project_id');
    }
    public function managment_project(){
        return $this->hasMany(Project::class,'id','manager_id');

    }

    public function apps(){
        return $this->hasMany(App::class);
    }

    // relación de manager y colaborador
    // 1 manager tiene de 0 a más colaboradores
    public function collaborators(){
        return $this->hasMany(User::class,'manager_id','id');
    }

    /// 1 colaborator tiene 1 manager
    public function manager(){
        return $this->belongsTo(User::class,'id','manager_id');
    }

}
