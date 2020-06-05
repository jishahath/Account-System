<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;



class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    public function department() {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function income() {
        return $this->belongsTo('App\income', 'id');
    }

    public function expense() {
        return $this->belongsTo('App\income', 'id');
    }

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

    public function setPasswordAttribute($password)
    {   
    $this->attributes['password'] = bcrypt($password);
    }

}

