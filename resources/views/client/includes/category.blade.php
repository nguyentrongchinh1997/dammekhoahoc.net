<div class="hidden-xs col-md-3 col-sm-6 col-xs-12">
    <div class="widget">
        <div class="widget-title">
            <h4>Chuyên mục</h4>
            <hr>
        </div>
        <div class="review-posts m30">
        	@foreach ($categories as $cate)
                <div class="post-review">
                    <div class="post-title cate-all">
                        <h3><a href="{{route('category', ['slug' => $cate->slug])}}">{{$cate->name}}</a></h3>
                    </div>
                </div>

                <hr class="hr-custom">
            @endforeach
        </div>
    </div>

    <div class="widget">
        <div class="widget-title">
            <h4>Tin đáng xem</h4>
            <hr>
        </div>

        <div class="mini-widget m30">
            @foreach ($newsRandom as $newsItem)
                <div class="post clearfix" style="margin-bottom: 0px">
                    <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
                        <img class="image-sidebar" src='{{asset("$server/thumbnails/$newsItem->image")}}' alt="{{$newsItem->title}}" title="{{$newsItem->title}}">
                    </a>
                    <h3 class="title-sidebar" title="{{$newsItem->title}}">
                        <a href="{{route('detail', ['slug' => $newsItem->slug, 'id' => $newsItem->id])}}">
                            {{ $newsItem->title }}
                        </a>
                    </h3>
                </div>
                <hr>
            @endforeach
        </div>
    </div>  
</div>