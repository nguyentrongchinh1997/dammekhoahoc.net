<?php

namespace app\Http\Services;

use App\Model\News;
use App\Model\Category;

class SiteService
{
	protected $categoryModel, $newsModel;

	public function __construct(News $news, Category $category)
	{
		$this->newsModel = $news;
		$this->categoryModel = $category;
	}

	public function home()
	{
		$news = $this->newsModel->latest('id')->limit(10)->get();
		$newsLatest = $this->newsModel->latest('date')
									 ->where('date', '<', $news[9]->date)
									 ->limit(8)
									 ->get();
		$categoryRandom = $this->categoryModel->all()->random(4);
		$bestView = $this->newsModel->latest('view')->limit(15)->get();
		$newsHot = $this->newsModel->all()->random(15);
		$data = [
			'news' => $news,
			'newsHot' => $newsHot,
			'newsLatest' => $newsLatest,
			'categoryRandom' => $categoryRandom,
			'bestView' => $bestView,
		];

		return $data;
	}

	public function newsCategory($slug)
	{
		try {
			$cate = $this->categoryModel->where('slug', $slug)->first();
			$newsList = $this->newsModel->where('category_id', $cate->id)->latest('date')->paginate(20);
			$idList = $this->newsModel->where('category_id', $cate->id)->latest('date')->select('id')->paginate(20);
			$bestView = $this->newsModel->latest('view')
										->whereNotIn('id', $idList)
										->where('category_id', $cate->id)
										->get();
			$data = [
				'category' => $cate, 
				'newsList' => $newsList,
				'cate' => $cate,
				'bestView' => $bestView,
			];

			return $data;
		} catch (\Exception $e) {
			return NULL;
		}
	}

	public function detail($slug, $id)
	{
		//try {
			$news = $this->newsModel->findOrFail($id);
			if (count($news->category->news) > 9) {
			    $categorySameNews = $this->newsModel->where('id', '!=', $news->id)
												->where('category_id', $news->category_id)
												->latest('id')
												->limit(9)
												->get();
												
			} else {
			    $categorySameNews = $this->newsModel->where('id', '!=', $news->id)
												->where('category_id', $news->category_id)
												->get();
			}
			
			$newsLatest = $this->newsModel->where('id', '!=', $news->id)
									->latest('id')
									 ->limit(8)
									 ->get();
			$bestView = $this->newsModel->where('id', '!=', $news->id)->latest('view')
									 ->limit(10)
									 ->get();
			
			$keywords = explode(',', $news->keyword);
			$idNewsRelate = $this->getId($categorySameNews);
			foreach ($keywords as $key) {
				$newsRelate = $this->newsModel->where('id', '!=', $news->id)
											  ->whereNotIn('id', $idNewsRelate)
											  ->where(function($query) use ($key){
											  		$query->where('title', 'like', '%' . $key . '%')
											  			  ->orWhere('keyword', 'like', '%' . $key . '%');
											  })
											  ->latest('date')
											  ->limit(6)
											  ->get();
			}
			$news->increment('view');
			$data = [
				'newsLatest' => $newsLatest,
				'newsItemId' => array(),
				'keywords' => $keywords,
				'news' => $news,
				'categorySameNews' => $categorySameNews,
				'newsRelate' => $newsRelate,
				'idNewsRelate' => $idNewsRelate,
				'bestView' => $bestView,
			];

			return $data;	
// 		} catch (\Exception $e) {
// 			return NULL;
// 		}
	}

	public function search($request)
	{
		try {
			$idList = array();
			$key = $request->key;
			$newsList = $this->newsModel->where('title', 'like', '%' . $key . '%')->paginate();
			$idList = $this->getId($idList);
			$hotNews = $this->newsModel->whereNotIn('id', $idList)
									   ->latest('view')
									   ->limit(10)
									   ->get();
			$data = [
				'newsList' => $newsList,
				'hotNews' => $hotNews,
			];

			return $data;
		} catch (\Exception $e) {
			return NULL;
		}
	}

	public function getId($idList)
	{
		$idNewsRelate = array();

		foreach ($idList as $id)
		{
			$idNewsRelate[] = $id->id;
		}

		return $idNewsRelate;
	}
}
