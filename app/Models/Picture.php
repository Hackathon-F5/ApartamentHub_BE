<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = ['url'];

    public function apartments()
    {
        return $this->belongsToMany(Apartment::class, 'apartment_pictures');
    }
}
