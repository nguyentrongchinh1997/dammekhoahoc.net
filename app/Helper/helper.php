<?php

namespace app\Helper;

use App\Model\News;

class Helper
{
	public static function getNews($limit, $idList1, $idList2)
	{
		$idList = array_merge($idList1, $idList2);
		$news = News::whereNotIn('id', $idList)->get()->random($limit);

		return $news;
	}

	public static function getNewsCategory($categoryId)
	{
		return News::where('category_id', $categoryId)->take(4)->get();
	}

	public static function getImage($type)
	{
		if ($type == 0) {
			return 'http://static.dammekhoahoc.net/photos';
		} else if ($type == 1) {
			return 'upload';
		}
	}
}

