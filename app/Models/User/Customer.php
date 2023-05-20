<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'firstName',
        'lastName',
        'centerName',
        'city',
        'address',
        'phone',
        'mobile'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
