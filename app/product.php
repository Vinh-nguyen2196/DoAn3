<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	protected $table ="products";

	public function product_type(){

		return $this->belongsTo('App\Productype','id_type','id');
	}
    //
}
