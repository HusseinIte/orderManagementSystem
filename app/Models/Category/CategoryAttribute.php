<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category\CategoryAttribute
 *
 * @property-read \App\Models\Category\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category\CategoryAttributeValue> $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute query()
 * @mixin \Eloquent
 */
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
