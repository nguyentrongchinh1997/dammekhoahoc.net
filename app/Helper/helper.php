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
}

