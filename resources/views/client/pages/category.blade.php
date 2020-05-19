@extends('client.layouts.index')

@section('content')
	<div class="container sitecontainer bgw"> 
        <div class="row">
            @include('client.includes.category')
            <div class="col-md-6 col-sm-6 col-xs-12 m22">
                <div class="widget searchwidget">
                    <input type="hidden" id="cate" value="{{$category->id}}">
                	@foreach ($newsList as $newsItem)
                        @php $path = \App\Helper\helper::getImage($newsItem->type); @endphp
                        <div class="large-widget m30">
                            <div class="post row clearfix">
                            	<div class="col-md-8">
                                    <div class="title-area" style="padding: 0px">
                                        <h3 class="title-cate title" title="{{$newsItem->title}}">
                                        	<a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
                                        		{{$newsItem->title}}
                                        	</a>
                                    	</h3>
                                        <p class="summury">
                                        	{!!strip_tags($newsItem->summury)!!}
                                        </p>
                                        <div class="large-post-meta">
                                            <span class="avatar"><a href="#">{{$newsItem->author}}</a></span>
                                            <small>&#124;</small>
                                            <span><a href="category.html"><i class="fa fa-clock-o"></i> {{date('d/m/Y', strtotime($newsItem->date))}}</a></span>
                                            <small class="hidden-xs">&#124;</small>
                                            <span class="hidden-xs"><a href="#"><i class="fa fa-eye"></i> {{$newsItem->view}}</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
                                            <img alt="{{$newsItem->title}}" src='{{asset("$path/thumbnails/$newsItem->image")}}' class="border-image img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                {{$newsList->links()}}
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="widget">
                    <div class="widget-title">
                        <h4>Tin hot</h4>
                        <hr>
                    </div>

                    <div class="mini-widget carrier-widget m30">
                        @foreach ($bestView as $newsItem)
                            @php $path = \App\Helper\helper::getImage($newsItem->type); @endphp
                            <div class="post clearfix">
                                <div class="mini-widget-title" style="padding-left: 0px; padding-right: 15px">
                                    <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}"> {{$newsItem->title}}</a>
                                    <span class="label label-primary">{{$newsItem->category->name}}</span>
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
