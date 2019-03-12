<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Constructor for user, all parameter are optionals
     *
     * @param string $name
     * @param string $email
     * @param string $password
     */
    function __construct($name="", $email="", $password=""){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function roles(){
        return $this->belongsToMany('\App\Role');
    }
    
    /**
     * Check if user has a role
     *
     * @param string $role
     * @return boolean
     */
    public function hasRole($role){
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }

    /**
     * Check if user has any role
     *
     * @param string $roles
     * @return boolean
     */
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this->hasRole($role)) return true;
            }
            return false;
        } else {
            return $this->hasRole($roles);
        }
    }

    /**
     * Give to user authorization depending the role
     *
     * @param string $roles
     * @return void
     */
    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)) return true;
        abort(401, 'This action is unauthorized');
    }
}
