@extends('frontend.layout.master')


@section('content')
<!-- page title -->
<section class="page_title">
    <div class="page_title_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_overlay_content text-center">
                        <h2>News</h2>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Home</a></li>
                            <li>
                                <span><i class="fas fa-angle-double-right"></i></span>
                            </li>
                            <li>
                                <a class="active" href="{{ route('frontend.news') }}">News</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news -->
<section class="news_page">
    <div class="container">
        <div class="row">
            
            @foreach ($newsCollection as $news)
            <div class="col-12 col-sm-6 col-lg-6">
                <div class="single_news">
                    <div class="card">
                        <a href="{{ route("frontend.news.details", $news)}}">
                            <img src="{{asset('uploads/files/photos/')}}/{{$news->gallery->photos->first()->image}}" class="card-img-top" alt="news" />
                        </a>

                        <div class="card-body single_news_card_body">
                            <small class="text-muted">Last updated at {{ date('h:i A d.m.Y', strtotime($news->updated_at))}}</small>
                            <h5 class="text_title">
                                {{$news->title}}
                            </h5>

                            <div class="card-text" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                <p class="text_paragraph">
                                    {!! $news->description !!}
                                </p>
                                <a href="{{ route("frontend.news.details", $news)}}" class="anchor_link_tag">CONTINUE READING</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-12 mt-5 d-flex justify-content-center">
                <!-- pagination -->
    
                <ul class="pagination">
                  {{ $newsCollection->links() }}
                </ul>
              </div>

        </div>
    </div>
</section>
@endsection