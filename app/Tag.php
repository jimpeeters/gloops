<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $table = 'tags';
	public $timestamps = true;

	// label belongs to loops
	public function loops() {
		
	    return $this->belongsToMany('App\Loop', 'loops_tags', 'FK_tag_id', 'FK_loop_id');
	}

}



