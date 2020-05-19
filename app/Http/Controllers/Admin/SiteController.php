<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Admin\SiteService;

class SiteController extends Controller
{
	protected $siteService;

	public function __construct(SiteService $siteService)
	{
		$this->siteService = $siteService;
	}

    public function loginForm()
    {
    	return view('admin.pages.login');
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
    		'username' => 'required|max:10',
    		'password' => 'required|max:10',
    	]);

    	$login = $this->siteService->login($request->all());

    	if ($login == true) {
    		return redirect()->route('admin.home');
    	} else {
    		return back()->with('error', 'Đăng nhập thất bại');
    	}
    }

    public function home()
    {
    	return view('admin.layouts.index');
    }

    public function logout()
    {
    	auth()->logout();

    	return redirect()->route('admin.login');
    }

    public function listCategory()
    {
    	return view('admin.pages.category.list', $this->siteService->listCategory());
    }

    public function listNews()
    {
    	return view('admin.pages.news.list', $this->siteService->listNews());
    }

    public function newsPostForm()
    {
    	return view('admin.pages.news.add', $this->siteService->newsPostForm());
    }

    public function newsAdd(Request $request)
    {
    	$this->siteService->newsAdd($request->all());

    	return redirect()->route('admin.news.list')->with('thongbao', 'Thêm thành công');
    }

    public function editForm($id)
    {
    	return view('admin.pages.news.edit', $this->siteService->editForm($id));
    }

    public function newsEdit(Request $request, $id)
    {
    	$this->siteService->newsEdit($request->all(), $id);

    	return redirect()->route('admin.news.list')->with('thongbao', 'Sửa thành công');
    }
}

