@extends('frontend.layout.master')

@section('content')
<!-- page title -->
<section class="page_title">
    <div class="page_title_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_overlay_content text-center">
                        <h2>Events</h2>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Home</a></li>
                            <li>
                                <span><i class="fas fa-angle-double-right"></i></span>
                            </li>
                            <li>
                                <a class="active" href="{{ route('frontend.events') }}">Events</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- events -->
<section class="event_page">
    <div class="container">
        <div class="row no-gutters">
            @foreach ($events as $key=>$event)
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="event_details">
                                <h2 class="text_title">
                                   {{$event->title}}
                                </h2>

                                <p class="text_subtitle mb-0">
                                    Start Date: <span>{{ date('M d, Y', strtotime($event->start_date)) }}</span>
                                </p>
                                <p class="text_subtitle mb-0">
                                    End Date: <span>{{ date('M d, Y', strtotime($event->end_date)) }}</span>
                                </p>
                                <p class="text_subtitle">
                                    Place:
                                    <span>{{ ($event->location) ? ($event->location) : 'To Be Announced' }}</span>
                                </p>

                                <p class="text_paragraph">
                                    {!! $event->description !!} 
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="event_image" 
                            style="background: url({{(url('uploads/files/event/').'/'.$event->image)}})"></div>
                        </div>
                    </div>
                </div>
                @php $divider = '<div class="custom_divider mt-5 mb-5"></div>'; @endphp
                @if(!$loop->last)
                    {!! $divider !!}
                @endif
                
            @endforeach
            
            
            

            <div class="col-12 mt-5 d-flex justify-content-center">
                <!-- pagination -->

                <ul class="pagination">
                   {{ $events->links() }}
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
