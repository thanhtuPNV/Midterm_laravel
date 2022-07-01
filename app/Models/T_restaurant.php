<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use\App\Models\Category;

class T_restaurant extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='t_restaurants';
    protected $fillable = ['name_food','descriptions','price','image','id_category'];
    public function categories(){
        return $this->belongsTo(Category::class,'id_category','id');
    }
}
