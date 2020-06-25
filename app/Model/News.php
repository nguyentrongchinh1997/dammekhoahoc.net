<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
		'slug',
		'image',
		'summury',
		'content',
		'content_origin',
		'view',
		'category_id',
		'sub_category_id',
		'keyword',
		'link',
		'md5_link',
		'author',
		'date',
		'status',
		'type'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
    	return $this->belongsTo(SubCategory::class);
    }
}

