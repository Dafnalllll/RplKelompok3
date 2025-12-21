<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profile';

    protected $fillable = [
        'user_id', 'nim', 'phone', 'ktm', 'avatar', 'alamat'
    ];
public function user()
{
    return $this->belongsTo(User::class);
}
}
