<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{

    use Authenticatable, Authorizable, CanResetPassword;


    protected $table = 'users';
    protected $fillable =  ['name', 'email', 'created_at', 'updated_at', 'avatar', 'facebook_id', 'facebookAccount', 'facebook_profile_picture'];
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $hidden = ['password', 'remember_token'];

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function loops()
    {
        return $this->hasMany('App\Loop', 'FK_user_id');
    }

/*    public function favouritedLoops()
    {
        return $this->belongsToMany('App\Favourite', 'favourites', 'FK_user_id', 'FK_loop_id');
    }*/
}