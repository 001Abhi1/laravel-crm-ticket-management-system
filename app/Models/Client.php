<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'status',
        'notes'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
