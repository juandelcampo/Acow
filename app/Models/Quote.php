<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('quote_id','category_id');
    }
}
