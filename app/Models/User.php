<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //Поля необходимые для создание
    protected $fillable = ['surname','name','login','password'];

    //Поля исключения
    protected  $hidden = ['password','api_token'];

    //Необходимо обработать
    protected $casts = ['password' => 'hashed'];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    //Получение роли пользователя
    public function hasRole($roles){
        return in_array($this->role->code, $roles);
    }

    public function carts(){
        $this->hasMany(Cart::class);
    }
    public function orders(){
        $this->hasMany(Order::class);
    }
}
