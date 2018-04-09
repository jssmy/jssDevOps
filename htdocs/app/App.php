<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    //
	protected $guarded=['id'];
	protected $table='apps';
	public $timestamps = false;


	public function user(){
		return $this->belongsTo(User::class);
	}

}
