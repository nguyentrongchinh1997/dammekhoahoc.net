@extends('client.layouts.index')

@section('content')
        <div class="container sitecontainer bgw"> 
            <div class="row">
                @include('client.includes.category')
                <input type="hidden" value="0" id="cate">
                <div class="col-md-6 col-sm-6 col-xs-12 m22">
                    <div class="widget">
                        <div class="large-widget m30">
                        	@foreach ($news as $newsItem)
	                            <div class="post clearfix">
	                                <div class="post-media">
	                                    <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
	                                        <img alt="{{$newsItem->title}}" src='{{asset("$server/og_images/$newsItem->image") }}' class="img-responsive">
	                                    </a>
	                                </div>
	                                <div class="large-widget-title">
	                                	<h3 class="title" title="{{$newsItem->title}}">
	                                		<a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">{{$newsItem->title}}</a>
	                                	</h3>
	                                	<p class="summury">
	                                		{!! $newsItem->summury !!}
	                                	</p>
	                                </div>
	                                <div class="large-post-meta home-large-post-meta">
	                                    <span class="avatar"><a href="https://www.trendingtemplates.com/demos/techmag/author.html">
	                                    	{{$newsItem->author}}</a></span>
	                                    <small>&#124;</small>
	                                    <span><a href="category.html">{{$newsItem->category->name}}</a></span>
	                                    <small>&#124;</small>
	                                    <span><a href="single.html#comments">Lượt xem: {{$newsItem->view}}</a></span>
	                                    <small>&#124;</small>
	                                    <span><a href="single.html#comments">{{date('d/m/Y', strtotime($newsItem->date))}}</a></span>
	                                </div><!-- end meta -->
	                            </div>
	                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <div class="widget-title">
                            <h4>Tin xem nhiều</h4>
                            <hr>
                        </div>

                        <div class="mini-widget carrier-widget m30">
                            @foreach ($bestView as $newsItem)
                                <div class="post clearfix">
                                    <div class="mini-widget-thumb">
                                        <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
                                            <img alt="" src='{{asset("$server/thumbnails/$newsItem->image")}}' class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="mini-widget-title">
                                        <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}"> {{$newsItem->title}}</a>
                                        <span class="label label-primary">{{$newsItem->category->name}}</span>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-title">
                            <h4>Tin hot</h4>
                            <hr>
                        </div>

                        <div class="mini-widget carrier-widget m30">
                            @foreach ($bestView as $newsItem)
                                <div class="post clearfix">
                                    <div class="mini-widget-title" style="padding-left: 0px; padding-right: 15px">
                                        <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}"> {{$newsItem->title}}</a>
                                        <span class="label label-primary">{{$newsItem->category->name}}</span>
                                    </div>
                                    <div class="mini-widget-thumb">
                                        <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
                                            <img alt="" src='{{asset("$server/thumbnails/$newsItem->image")}}' class="img-responsive">
                                        </a>
                                    </div>
                                    
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-title">
                            <h4>Tin mới</h4>
                            <hr>
                        </div><!-- end widget-title -->

                        <div class="review-posts row m30">
                        	@foreach ($newsLatest as $newsItem)
	                            <div class="post-review col-xs-12 col-sm-4 col-md-3 col-lg-3">
	                                <div class="post-media entry">
	                                	<a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
	                                		<img src='{{asset("$server/og_images/$newsItem->image")}}' alt="{{$newsItem->title}}" class="news-latest-image img-responsive">
	                                	</a>
	                                    
	                                </div>
	                                <div class="post-title">
	                                    <h3 title="{{$newsItem->title}}" class="news-latest"><a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">{{$newsItem->title}}</a></h3>
	                                </div>
	                                <div class="large-post-meta home-large-post-meta" style="margin-bottom: 20px">
	                                    
	                                    <span><a href="{{route('category', ['slug' => $newsItem->category->slug])}}">{{$newsItem->category->name}}</a></span>
	                                    <small>&#124;</small>
	                                    <span><a href="#"><i class="fa fa-eye"></i> {{$newsItem->view}}</a></span>
                                        <small>&#124;</small>
                                        <span>{{date('d/m/Y', strtotime($newsItem->date))}}</span>
	                                </div>
	                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($categoryRandom as $categoryItem)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4>{{$categoryItem->name}}</h4>
                                    <hr>
                                </div>
                                <div class="mini-widget m30">
                                    @foreach (\App\Helper\helper::getNewsCategory($categoryItem->id) as $newsItem)
                                        <div class="post clearfix">
                                            <div class="mini-widget-thumb">
                                                <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
                                                    <img alt="{{$newsItem->title}}" src='{{asset("$server/thumbnails/$newsItem->image") }}' class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="mini-widget-title">
                                                <h3 class="title-sidebar-right" title="{{$newsItem->title}}">
                                                    <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}"> {{$newsItem->title}}</a>
                                                </h3>
                                                <small>{{date('d/m/Y', strtotime($newsItem->date))}}</small>
                                                <div class="mini-widget-hr"></div>
                                            </h3>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
@endsection