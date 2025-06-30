<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name','description','imagepath','price','quantity', 'category_id'
    ];


  // app/Models/Product.php
public function categories()
{
    return $this->belongsToMany(Category::class);
}



// public function category()
// {
//     return $this->belongsTo(Category::class);
// }

// app/Models/Category.php
public function products()
{
    return $this->belongsToMany(Product::class);
}


}
