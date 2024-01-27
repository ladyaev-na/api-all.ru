<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Поля необходимые для создание
    protected $fillable = ['name'];

    //Поля исключения
    protected  $hidden = [];

    //Необходимо обработать
    protected $casts = [];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
