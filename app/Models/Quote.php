<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $guarded = ['categories'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('category_id','quote_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
