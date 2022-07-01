<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\T_restaurant;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='categories';
    protected $fillable=['name_categoty'];
    public function t_restaurants(){
        return $this->hasMany(T_restaurant::class,'id_category','id');
    }
}
