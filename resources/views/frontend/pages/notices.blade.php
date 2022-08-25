@extends('frontend.layout.master')

@section('content')
<!-- page title -->
<section class="page_title">
    <div class="page_title_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_overlay_content text-center">
                        <h2>Notice</h2>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Home</a></li>
                            <li>
                                <span><i class="fas fa-angle-double-right"></i></span>
                            </li>
                            <li>
                                <a class="active" href="{{ route('frontend.notices') }}">Notice</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- notice table -->
<section class="notice">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="notice_card">
                    <div class="card">
                        <div class="card-header notice_card_header text-center bg_color_primary">
                            <h2>Notice List</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless table-hover notice_table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 5%">Sl.No.</th>
                                        <th scope="col" style="width: 70%">Title</th>
                                        <th scope="col" style="width: 15%">Date</th>
                                        <th scope="col" style="width: 10%">Page View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notices as $key=>$notice)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>
                                            {{$notice->title}}
                                        </td>
                                        <td>
                                            {{ date('d.m.Y', strtotime($notice->updated_at))}}
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-primary btn_outline_primary"
                                                href="{{ route("frontend.notices.details", $notice)}}"><i class="fas fa-external-link-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection