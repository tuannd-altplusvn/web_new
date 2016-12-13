<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Codesleeve\Stapler\ORM\StaplerableInterface;
// use Codesleeve\Stapler\ORM\EloquentTrait;

class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'first_name', 'last_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function __construct(array $attributes = array()) {
    //     $this->hasAttachedFile('avatar', config('customize-image.profile-avatar'));

    //     parent::__construct($attributes);
    // }
}
