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

    public function tags()
	{
		return $this->belongsToMany('App\Tag', 'loops_tags', 'FK_loop_id', 'FK_tag_id');
	}

	public function favourites()
	{
		return $this->belongsToMany('App\User', 'favourites', 'FK_loop_id', 'FK_user_id');
	}

	public function loopTags()
	{
		return $this->hasMany('App\LoopTag', 'FK_loop_id');
	}

	public function loopFavourites()
	{
		return $this->hasMany('App\Favourite', 'FK_loop_id');
	}



}