<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImgProduct;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'sale_price', 'description', 'image','slug','status', 'category_id', 'stock'
    ];

    // Định nghĩa mối quan hệ với bảng ImgProduct
    public function images()
    {
        return $this->hasMany(ImgProduct::class, 'product_id');
    }

    // Định nghĩa mối quan hệ với bảng Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    
    // public function image (){
    //     return $this->hasMany(ImageProduct::class);
    // }

}

