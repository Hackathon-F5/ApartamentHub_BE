<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'availability', 'people'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'apartment_tags');
    }

    public function pictures()
    {
        return $this->belongsToMany(Picture::class, 'apartment_pictures');
    }
}
