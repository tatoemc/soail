<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Degree extends Model
{
    //
     public function user()
   {
   	return $this->hasMany('App\User'); 
   	
   }
 

}
