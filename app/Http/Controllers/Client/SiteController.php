<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Model\Category;
use App\Model\News;
use App\Http\Services\SiteService;

class SiteController extends Controller
{
	protected $siteService;

	public function __construct(SiteService $siteService)
	{
		$this->siteService = $siteService;
		
        View::composer('*', function($view){
            $categories = Category::all();
            $newsRandom = News::all()->random(8);
            $data = [
                'categories' => $categories,
                'newsRandom' => $newsRandom,
            ];
            
            $view->with($data);
        });
	}

    public function home()
    {
    	$newsTop = $this->siteService->home();

    	return view('client.pages.home', $newsTop);
    }

    public function newsCategory($slug)
    {
    	$data = $this->siteService->newsCategory($slug);

    	if (!empty($data)) {
    		return view('client.pages.category', $data);
    	} else {
    		return redirect()->route('home');
    	}
    }

    public function detail($slug, $id)
    {
    	$data = $this->siteService->detail($slug, $id);

    	if (!empty($data)) {
    		return view('client.pages.detail', $data);
    	} else {
    		return NULL;
    	}
    }
}

