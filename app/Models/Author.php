<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
        /**
         * Get the quote that owns the Author.
         */
        public function quotes()
        {
            return $this->hasMany(Quote::class);
        }


}
