@extends('client.layouts.index')

@section('title', $news->title)

@section('seo')
<meta name="description" content="{{strip_tags($news->summury)}}"/>
<meta name="keywords" content="{{strip_tags($news->keyword)}}"/>
<meta content='{{asset("$server/og_images/$news->image")}}' property="og:image"/>
@endsection

@section('content')
    <div class="container sitecontainer single-wrapper bgw">
        <div class="row">
            <input type="hidden" value="{{$news->category->id}}" id="cate">
            <div class="col-md-8 col-sm-8 col-xs-12 m22 single-post">
                <div class="widget">
                    <div class="large-widget m30 detail-m30">
                        <div class="post clearfix">
                            <div class="title-area">
                                <div class="bread">
                                    <ol class="breadcrumb">
                                        <li><a style="color: #007f74" href="{{route('home')}}"><i class="fa fa-home"></i> Trang chủ</a></li>
                                        <li><a style="color: #818181" href="{{route('category', ['slug' => $news->category->slug])}}">{{$news->category->name}}</a></li>
                                    </ol>
                                </div><!-- end bread -->
                                <h3 title="{{$news->title}}">{{$news->title}}</h3>

                                <div class="large-post-meta">
                                    <span class="avatar"><a href="#">{{$news->author}}</a></span>
                                    <small>&#124;</small>
                                    <span><a href="category.html"><i class="fa fa-clock-o"></i> {{date('d/m/Y', strtotime($news->date))}}</a></span>
                                    <small class="hidden-xs">&#124;</small>
                                    <span class="hidden-xs"><a href="#"><i class="fa fa-eye"></i> {{$news->view}}</a></span>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="hidden-xs">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="hidden-xs">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- /.pull-right -->
                        </div><!-- end post -->

                        <div class="post-desc">
                        	<p class="detail-summury">
                        		{!!$news->summury!!}
                        	</p>
                            <div class="body-content">
                            	{!! $news->content !!}
                            </div>
                            <p style="text-align: right;">
                            	<b>Nguồn: </b>{{$news->author}}
                            </p>
                        </div><!-- end post-desc -->

                        <div class="post-bottom">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tags">
                                        <h4>Từ khóa</h4><br>
                                        	@foreach ($keywords as $key)
	                                        	<a href="#">{{$key}}</a>
	                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (count($newsRelate) > 0)
                            <div class="row m22 related-posts">
                            <div class="col-md-12">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h3>Tin liên quan</h3>
                                        <hr>
                                    </div>
                                    <div class="review-posts row m30">
                                    	@foreach ($newsRelate as $newsItem)
                                            @php $path = \App\Helper\helper::getImage($newsItem->type); @endphp
	                                        <div class="post-review col-md-4 col-sm-12 col-xs-12">
	                                            <div class="post-media entry">
	                                            	<a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
	                                            		<img src='{{asset("$path/thumbnails/$newsItem->image")}}' alt="{{$newsItem->title}}" class="news-latest-image img-responsive">
	                                            	</a>
	                                                
	                                            </div>
	                                            <div class="post-title">
	                                                <h3 class="news-latest"><a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">{{$newsItem->title}}</a></h3>
	                                            </div>
	                                            <div class="large-post-meta home-large-post-meta" style="margin-bottom: 20px">
				                                    <span class="avatar"><a href="{{route('category', ['slug' => $newsItem->category->slug])}}">{{$newsItem->category->name}}</a></span>
				                                    <small>|</small>
				                                    <span><a href="#"><i class="fa fa-eye"></i> {{number_format($news->view)}}</a></span>
				                                </div>
	                                        </div>
	                                        @php
	                                        	$newsItemId[] = $newsItem->id;
	                                        @endphp
                                        @endforeach

                                        @if (count($newsRelate) < 6)
                                        	@foreach (\App\Helper\helper::getNews(6-count($newsRelate), $idNewsRelate, $newsItemId) as $newsItem)
                                                @php $path = \App\Helper\helper::getImage($newsItem->type); @endphp
                                        		<div class="post-review col-md-4 col-sm-12 col-xs-12">
		                                            <div class="post-media entry">
		                                            	<a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
		                                            		<img src='{{asset("$path/thumbnails/$newsItem->image")}}' alt="{{$newsItem->title}}" class="news-latest-image img-responsive">
		                                            	</a>
		                                                
		                                            </div>
		                                            <div class="post-title">
		                                                <h3 class="news-latest"><a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">{{$newsItem->title}}</a></h3>
		                                            </div>
		                                            <div class="large-post-meta home-large-post-meta" style="margin-bottom: 20px">
					                                    <span class="avatar"><a href="{{route('category', ['slug' => $newsItem->category->slug])}}">{{$newsItem->category->name}}</a></span>
					                                    <small>|</small>
					                                    <span><a href="#">Lượt xem: {{number_format($newsItem->view)}}</a></span>
					                                </div>
		                                        </div>
                                        	@endforeach
                                        @endif
                                    </div>
                                </div> 
                            </div>
                        </div>
                        @endif
                        @if (count($categorySameNews) > 0)
                            <div class="row m22 related-posts" style="margin-top: 0px">
                            <div class="col-md-12">
                                <div class="widget">
                                    <div class="widget-title" style="padding-top: 0px">
                                        <h3 style="margin-top: 0px">Tin cùng chuyên mục</h3>
                                        <hr>
                                    </div><!-- end widget-title -->

                                    <div class="review-posts row m30">
                                    	@foreach ($categorySameNews as $newsItem)
                                            @php $path = \App\Helper\helper::getImage($newsItem->type); @endphp
	                                        <div class="post-review col-md-4 col-sm-12 col-xs-12">
	                                            <div class="post-media entry">
	                                            	<a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
	                                            		<img src='{{asset("$path/thumbnails/$newsItem->image")}}' alt="" class="news-latest-image img-responsive">
	                                            	</a>
	                                                
	                                            </div>
	                                            <div class="post-title">
	                                                <h3 title="{{$newsItem->title}}" class="news-latest">
	                                                	<a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">{{$newsItem->title}}</a></h3>
	                                            </div>
	                                            <div class="large-post-meta home-large-post-meta" style="margin-bottom: 20px">
                                                    <span><a href="#">Lượt xem: {{number_format($newsItem->view)}}</a></span>
				                                    <small>|</small>
				                                    <span><a href="#">{{date('d/m/Y', strtotime($newsItem->date))}}</a></span>
				                                </div>
	                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div> 
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-3 col-xs-12">
                <div class="widget">
                    <div class="widget-title">
                        <h4>Tin mới</h4>
                        <hr>
                    </div>

                    <div class="mini-widget carrier-widget m30">
                        @foreach ($newsLatest as $newsItem)
                            @php $path = \App\Helper\helper::getImage($newsItem->type); @endphp
                            <div class="post clearfix">
                                <div class="mini-widget-thumb">
                                    <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
                                        <img alt="" src='{{asset("$path/thumbnails/$newsItem->image")}}' class="img-responsive">
                                    </a>
                                </div>
                                <div class="mini-widget-title">
                                    <h3 class="title-sidebar-right">
                                        <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">{{$newsItem->title}}</a>
                                    </h3>
                                    <p class="meta-sidebar">
                                        <span>Lượt xem: {{number_format($newsItem->view)}}</span>
                                        <span>|</span>
                                        <span>{{date('d/m/Y', strtotime($newsItem->date))}}</span>
                                    </p>
                                    <p class="meta-category">
                                        Chuyên mục: <b>{{$newsItem->category->name}}</b>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="widget-title">
                        <h4>Tin xem nhiều</h4>
                        <hr>
                    </div>

                    <div class="mini-widget carrier-widget m30">
                        @foreach ($bestView as $newsItem)
                            @php $path = \App\Helper\helper::getImage($newsItem->type); @endphp
                            <div class="post clearfix">
                                <div class="mini-widget-title" style="padding-left: 0px; padding-right: 15px">
                                    <h3 class="title-sidebar-right">
                                        <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">{{$newsItem->title}}</a>
                                    </h3>
                                    <p class="meta-sidebar">
                                        <span>Lượt xem: {{number_format($newsItem->view)}}</span>
                                        <span>|</span>
                                        <span>{{date('d/m/Y', strtotime($newsItem->date))}}</span>
                                    </p>
                                    <p class="meta-category">
                                        Chuyên mục: <b>{{$newsItem->category->name}}</b>
                                    </p>

                                </div>
                                <div class="mini-widget-thumb">
                                    <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
                                        <img alt="" src='{{asset("$path/thumbnails/$newsItem->image")}}' class="img-responsive">
                                    </a>
                                </div>
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection