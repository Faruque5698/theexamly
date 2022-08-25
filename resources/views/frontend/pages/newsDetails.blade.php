@extends('frontend.layout.master')
@push('plugin-styles')
{!! Html::style('public/css/frontend/css/slick.css') !!}
{!! Html::style('public/css/frontend/css/slick-theme.css') !!}
@endpush

@section('content')
<!-- page title -->
<section class="page_title">
    <div class="page_title_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_overlay_content text-center">
                        <h2>News Details</h2>
                        <ul>
                            <li><a href="{{ route("frontend.index")}}">Home</a></li>
                            <li>
                                <span><i class="fas fa-angle-double-right"></i></span>
                            </li>
                            <li>
                                <a href="{{ route("frontend.news")}}">News</a>
                            </li>
                            <li>
                                <span><i class="fas fa-angle-double-right"></i></span>
                            </li>
                            <li>
                                <a class="active" href="{{ route("frontend.news.details", $news)}}">News Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- notice Details -->
<section class="news_details">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div id="news-details-page-slider" class="image_slider">
                        @foreach ($news->gallery->photos as $photo)
                        <div>
                            <img src="{{ asset('/public/uploads/files/photos/') }}/{{$photo->image }}" class="card-img-top" alt="news" />
                        </div>
                        @endforeach
                    </div>

                    <div class="card-body">
                        <small class="text-muted">Last updated at
                            {{ date('h:i A d.m.Y', strtotime($news->updated_at))}}</small>
                        <h2 class="text_title">
                            {{ $news->title }}
                        </h2>

                        <div class="text_paragraph text-justify">
                            {!! $news->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('plugin-scripts')
{!! Html::script('public/js/frontend/slick.min.js') !!}
@endpush

@push('special-scripts')
{!! Html::script('public/js/frontend/news-details.js') !!}
@endpush