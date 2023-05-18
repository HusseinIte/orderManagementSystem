<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAttributeValue extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_attribute_id',
        'name'
    ];
public function attribute(){
    return $this->belongsTo(CategoryAttribute::class);
}
}
