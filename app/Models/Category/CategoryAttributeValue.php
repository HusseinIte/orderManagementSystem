<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category\CategoryAttributeValue
 *
 * @property-read \App\Models\Category\CategoryAttribute|null $attribute
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttributeValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttributeValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttributeValue query()
 * @mixin \Eloquent
 */
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
