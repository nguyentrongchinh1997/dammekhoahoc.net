<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>@yield('title')</title>
    @yield('seo')
    <base href="{{asset('')}}">
    <!-- TEMPLATE STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/style.css')}}">
    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/custom.css')}}">
    <link rel="icon" type="image/png" href="{{asset('asset/images/16x16-01.png')}}" sizes="16x16">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('asset/images/180x180-01.png')}}">
    <link rel="icon" type="image/png" href="{{asset('asset/images/32x32-01.png')}}" sizes="32x32">
    

</head>

<body>
    <div id="wrapper">
        <div class="logo-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <a class="navbar-brand" href="index.html"><img src="{{asset('asset/images/logo2.png')}}" alt=""></a>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="ads-widget clearfix">
                            <a href="#"><img src="{{asset('asset/upload/banner_03.jpg')}}" alt="" class="img-responsive"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <header class="header">
            <div class="container">
                <nav class="navbar navbar-default yamm">
                    <div class="container-full">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active home cate0"><a href="{{route('home')}}"><i class="fa fa-home"></i> Trang chủ</a></li>
                                @foreach ($categories as $cate)
                                    @if ($cate->id < 7)
                                        <li data="{{$cate->id}}" class="cate{{$cate->id}} dropdown yamm-fw">
                                            <a href="{{route('category', ['slug' => $cate->slug])}}" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">{{$cate->name}} <span class="fa fa-angle-down"></span></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="yamm-content">
                                                        <div class="row">
                                                            @foreach (\App\Helper\helper::getNewsCategory($cate->id) as $newsItem)
                                                                @php $path = \App\Helper\helper::getImage($newsItem->type); @endphp
                                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                    <div class="widget">
                                                                        <div class="mini-widget m30">
                                                                            <div class="post clearfix">
                                                                                <div class="mini-widget-thumb">
                                                                                    <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
                                                                                        <img alt="" src='{{asset("$path/thumbnails/$newsItem->image")}}' class="img-responsive">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="mini-widget-title">
                                                                                    <h3 class="title-header">
                                                                                        <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">{{$newsItem->title}}</a>
                                                                                    </h3>
                                                                                    <small>{{date('d/m/Y', strtotime($newsItem->date))}}</small>
                                                                                    <div class="mini-widget-hr"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                                
                            </ul>
                            <ul class="nav navbar-nav navbar-right searchandbag">
                                <li class="dropdown searchdropdown hasmenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
                                    <ul class="dropdown-menu show-right">
                                        <li>
                                            <div id="custom-search-input">
                                                <div class="input-group col-md-12">
                                                    <input type="text" class="form-control input-lg" placeholder="Search here..." />
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary btn-lg" type="button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>