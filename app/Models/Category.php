<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function quotes()
    {
        return $this->belongsToMany(Quote::class)->withPivot('quote_id','category_id');
    }
}
