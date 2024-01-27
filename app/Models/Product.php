<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //Поля необходимые для создание
    protected $fillable = ['name', 'price', 'quantity', 'category_id'];

    //Поля исключения
    protected  $hidden = [];

    //Необходимо обработать
    protected $casts = [];

    public function category(){
        $this->belongsTo(Category::class);
    }
}
