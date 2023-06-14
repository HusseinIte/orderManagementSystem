<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order\OrderDetail
 *
 * @property int $id
 * @property int $order_id
 * @property int $image_id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderDetail extends Model
{
    use HasFactory;
}
