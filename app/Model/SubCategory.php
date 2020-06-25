<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = [
    	'category_id',
        'name',
		'slug',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function news()
    {
    	return $this->hasMany(News::class);
    }
}
