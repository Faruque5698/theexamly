@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
@endpush

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Update Profile Image</span></li>
                        </ol>
                    </nav>
                </div>
            </div><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <img src="{{ asset('/uploads/user_images') }}/{{$profile->user_image }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <h2>{{ $profile->name }}'s Profile</h2>
                        <form enctype="multipart/form-data" action="{{ route('update.image') }}" method="POST">
                            <label>Update Profile Image</label>
                            <input type="file" name="user_image">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                            <input type="submit" class="btn btn-sm btn-primary" value="Update">
                            <a class="btn btn-sm btn-danger" href="{{ url('/admin/profile') }}">Go Back</a>
                        </form>
                    </div>
                </div><br>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/toastDemo.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });
    </script>
@endpush