<?php

namespace App\Http\Services\Admin;

use App\Model\News;
use App\Model\Category;
use Intervention\Image\ImageManagerStatic as Image;

class SiteService
{
	protected $newsModel, $categoryModel;

	public function __construct(News $newsModel, Category $categoryModel)
	{
		$this->newsModel = $newsModel;
		$this->categoryModel = $categoryModel;
	}

	public function login($inputs)
	{
		$data = [
			'name' => $inputs['username'],
			'password' => $inputs['password'],
		];

		if (auth()->attempt($data)) {
			return true;
		} else {
			return false;
		}
	}

	public function listCategory()
	{
		return $data = [
			'categories' => $this->getCategory(),
		];
	}

	public function listNews()
	{
		return $data = [
			'stt' => 0,
			'newsList' => $this->newsModel->latest('id')->paginate(10),
		];
	}

	public function newsPostForm()
	{
		$data = [
			'categories' => $this->getCategory(),
		];

		return $data;
	}

	public function getCategory()
	{
		return $this->categoryModel->all();
	}

	public function newsAdd($inputs)
	{
		return News::create([
			'title' => $inputs['title'],
			'slug' => str_slug($inputs['title']),
			'image' => $this->uploadImage($inputs['file'], $inputs['title']),
			'summury' => $inputs['summury'],
			'content' => $inputs['content'],
			'category_id' => $inputs['category_id'],
			'keyword' => $inputs['keyword'],
			'author' => $inputs['author'],
			'date' => date('Y-m-d H:i:s'),
			'type' => 1,
		]);
	}

	public function newsEdit($inputs, $id)
	{
		if (empty($inputs['file'])) {
			$image = $inputs['file_old'];
		} else {
			$image = $this->uploadImage($inputs['file'], $inputs['title']);

			if (file_exists(public_path('upload/thumbnails/' . $inputs['file_old']))) {
				unlink(public_path('upload/thumbnails/' . $inputs['file_old']));
			}
			if (file_exists(public_path('upload/og_images/' . $inputs['file_old']))) {
				unlink(public_path('upload/og_images/' . $inputs['file_old']));
			}
		}

		return News::updateOrCreate(
			[
				'id' => $id
			],
			[
				'title' => $inputs['title'],
				'slug' => str_slug($inputs['title']),
				'image' => $image,
				'summury' => $inputs['summury'],
				'content' => $inputs['content'],
				'category_id' => $inputs['category_id'],
				'keyword' => $inputs['keyword'],
				'author' => $inputs['author'],
				'date' => date('Y-m-d H:i:s'),
				'type' => 1,
			]
		);
	}

	public function editForm($id)
	{
		$news = $this->newsModel->findOrFail($id);
		$data = [
			'news' => $news,
			'categories' => $this->getCategory(),
		];

		return $data;
	}

	public function uploadImage($image, $title)
	{
		$format = $image->getClientOriginalExtension();
		$nameFile = str_slug($title) . '-' . rand() . '.' . $format;
		$data = getimagesize($image->getRealPath());
        $width = $data[0];
        $height = $data[1];
        $widthThumbnailResize = 200;
        $widthOgImageResize = 640;
        $heightThumbnailResize = ($height * $widthThumbnailResize) / $width;
        $heightOgImageResize = ($height * $widthOgImageResize) / $width;
    //resize thumbnail
	    $thumbnail_resize = Image::make($image->getRealPath());              
	    $thumbnail_resize->resize($widthThumbnailResize, $heightThumbnailResize);
	    $thumbnail_resize->save(public_path('upload/thumbnails/' . $nameFile));
	// resize og:image
	    $og_image_resize = Image::make($image->getRealPath());              
	    $og_image_resize->resize($widthOgImageResize, $heightOgImageResize);
	    $og_image_resize->save(public_path('upload/og_images/' . $nameFile));

	    return $nameFile;
	}
}
