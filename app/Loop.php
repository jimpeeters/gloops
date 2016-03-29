<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loop extends Model {

	protected $table = 'loops';
	public $timestamps = true;

	public function user()
	{
		return $this->belongsTo('App\User','FK_user_id','id');
	}

	public function category()
    {
        return $this->belongsTo('App\Category', 'FK_category_id');
    }

}