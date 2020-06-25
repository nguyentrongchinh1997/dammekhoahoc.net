<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
		'slug',
    ];

    public function news()
    {
    	return $this->hasMany(News::class);
    }

    public function subCategory()
    {
    	return $this->hasMany(SubCategory::class);
    }
}

