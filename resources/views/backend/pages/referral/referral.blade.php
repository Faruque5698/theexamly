@extends('backend.layout.master')
@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush
@push('plugin-styles')
    {!! Html::style('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@php($courses = \App\Models\Backend\Course::all())
@php($referrals = \App\Models\Backend\ReferralBonus::with('course')->get())

{{--{{dd($referrals)}}--}}

@section('content')

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Referral</a></li>
{{--                                <li class="breadcrumb-item"><a--}}
{{--                                        href="{{ route('admin.course.index') }}">Add Group</a></li>--}}
                                <li class="breadcrumb-item active" aria-current="page">
{{--                                    <span>{{ $course ? 'Update':'Create' }}</span></li>--}}
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">
                    <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus "></i></a>

                    <div class="table-responsive mt-5">
                        <table class="table" id="myTable">

                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Referral Bonus</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($referrals as $r)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$r->course->full_name}}</td>
                                <td>{{$r->referral_bonus}}</td>
                                <td><a href="{{route('admin.referral.delete',['id'=>$r->id])}}" class="btn btn-danger button delete-confirm">Delete</a></td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--{{dd($courses)}}--}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Referral Bonus Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.referral.save')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course Name</label>
                            <select name="course_id" id="" class="form-control" required>
                                <option value="">--Select--</option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->full_name}}</option>
                                @endforeach
{{--                                <option value=""></option>--}}
{{--                                <option value=""></option>--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bonus Amount</label>
                            <input type="number" class="form-control" name="referral_bonus" required>
                        </div>



                        <button type="submit" class="btn btn-primary">Save changes</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')

@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/dashboard.js') !!}
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

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <script >
            $(document).ready( function () {
            $('#myTable').DataTable()
        } );
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>

@endpush
