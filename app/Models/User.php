<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'is_superuser',
        'is_staff',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isSuperUser(){
        return $this->is_superuser;
    }
    public function isStaff(){
        return $this->is_staff;
    }
    public function setPasswordAttribute($value){
        $this->attributes['password'] =bcrypt($value);
    }

    public function superUser(){
        return $this->forceFill([
            'is_superuser' => '1',
        ])->save();
    }
    public function staff(){
        return $this->forceFill([
            'is_staff' => '1',
        ])->save();
    }
}
