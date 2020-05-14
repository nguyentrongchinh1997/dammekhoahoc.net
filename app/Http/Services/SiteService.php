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
		$news = $this->newsModel->latest('date')->limit(10)->get();
		$newsLatest = $this->newsModel->latest('date')
									 ->where('date', '<', $news[9]->date)
									 ->limit(8)
									 ->get();
		$categoryRandom = $this->categoryModel->all()->random(4);
		$bewsView = $this->newsModel->latest('view')->limit(15)->get();
		$data = [
			'news' => $news,
			'newsLatest' => $newsLatest,
			'categoryRandom' => $categoryRandom,
			'bewsView' => $bewsView,
		];

		return $data;
	}

	public function newsCategory($slug)
	{
		try {
			$cate = $this->categoryModel->where('slug', $slug)->first();
			$bewsView = $this->newsModel->latest('view')->where('category_id', $cate->id)->limit(15)->get();
			$newsList = $this->newsModel->where('category_id', $cate->id)->paginate(20);
			$data = [
				'category' => $cate, 
				'newsList' => $newsList,
				'cate' => $cate,
				'bewsView' => $bewsView,
			];

			return $data;
		} catch (\Exception $e) {
			return NULL;
		}
	}

	public function detail($slug, $id)
	{
		try {
			$news = $this->newsModel->findOrFail($id);
			$categorySameNews = $this->newsModel->where('id', '!=', $news->id)
												->where('category_id', $news->category_id)
												->get()
												->random(6);
			$newsLatest = $this->newsModel->where('id', '!=', $news->id)
									->latest('date')
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
