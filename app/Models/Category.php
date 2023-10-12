<?php

namespace App\Models;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function listings()
    {
        $this->hasMany(Listing::class, 'category_id', 'id');
    }

    public function getRouteKey(): mixed
    {
        return $this->slug;
    }
}
