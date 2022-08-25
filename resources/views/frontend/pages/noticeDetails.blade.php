@extends('frontend.layout.master')
@push('plugin-styles')
{!! Html::style('public/css/frontend/css/lightbox.min.css') !!}
@endpush

@section('content')
<!-- page title -->
<section class="page_title">
    <div class="page_title_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_overlay_content text-center">
                        <h2>Notice Details</h2>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Home</a></li>
                            <li>
                                <span><i class="fas fa-angle-double-right"></i></span>
                            </li>
                            <li>
                                <a href="{{ route('frontend.notices') }}">Notice</a>
                            </li>
                            <li>
                                <span><i class="fas fa-angle-double-right"></i></span>
                            </li>
                            <li>
                                <a class="active" 
                                href="{{ route("frontend.notices.details", $notice)}}">Notice Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- notice Details -->
<section class="notice_details">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card notice_details_card">
                    <div class="card-header notice_details_card_header text-center bg_color_primary">
                        <h2>Notice Details</h2>
                    </div>
                    <div class="card-body notice_details_card_body">
                        <small class="text-muted">Last updated at {{ date('h:i A d.m.Y', strtotime($notice->updated_at))}}</small>
                        <h2 class="text_title">
                            {{$notice->title}}
                        </h2>

                        <div class="text_paragraph text-justify">
                            {!! $notice->description !!}
                        </div>
                    </div>
                    <div class="card-footer notice_details_card_footer d-flex justify-content-between">
                        <div class="view_pdf">
                            <span class="mr-2">View Notice</span>
                            <!-- Button trigger modal -->
                            @if ($attachmentExtension == 'pdf')
                            {{-- If attachment is pdf model will be shown --}}
                                <button class="btn btn-outline-primary btn_outline_primary" data-toggle="modal"
                                    data-target="#Notice-pdf-show-Modal">
                                    <i class="fas fa-eye"></i>
                                </button>
                            @else
                            {{-- If attachment is image lightbox will be shown --}}
                                <a href="{{asset('uploads/files/notice_files/')}}/{{$notice->file}}" class="btn btn-outline-primary btn_outline_primary" data-lightbox="galleryImage"><i class="fas fa-eye"></i>
                                </a>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="Notice-pdf-show-Modal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">

                                    {{-- If attachment is pdf this block will run --}}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                PDF
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe
                                                src="{{asset('uploads/files/notice_files/')}}/{{$notice->file}}"
                                                width="100%" height="700" allowfullscreen></iframe>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary btn_outline_primary"
                                                data-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <div class="download_pdf">
                            <span class="mr-2">Download Notice</span>
                            <a target="_blank" class="btn btn-outline-primary btn_outline_primary"
                                href="{{asset('uploads/files/notice_files/')}}/{{$notice->file}}"><i
                                    class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('plugin-scripts')
{!! Html::script('public/js/frontend/lightbox.min.js') !!}
@endpush