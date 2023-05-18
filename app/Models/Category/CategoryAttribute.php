<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAttribute extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id',
        'name'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function values(){
        return $this->hasMany(CategoryAttributeValue::class);
    }
}
