<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table = 'product_images';
    protected $guarded = false;

    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->file_path);
    }
}
