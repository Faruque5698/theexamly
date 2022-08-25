@extends('backend.layout.master')

@push('plugin-styles')
{!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
{!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
{!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('public/css/loader.css') !!}

<style>
.pagination {
    display: flex !important;
    justify-content: center !important;
}
</style>

@endpush

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item"><a>Student</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Student List</span></li>
                        </ol>
                        @permission('add_student_btn')
                            <a href="{{ route('admin.students.admit') }}" class="btn btn-sm btn-info button-custom">Add New Student
                            </a>
                        @endpermission  
                    </nav>
                </div>
                <div class="col-md-12 text-right" style="margin-top: 8px; margin-bottom: 8px">
                    <button id='print-btn' class="btn btn-sm btn-success float right"><i class="fa fa-print"
                            aria-hidden="true" style="width: 44px;font-size: 14px;"> Print</i></button>
                </div>
                <div class="col-md-3 float-right">
                    <div class="form-group">
                       <input type="text" name="serach" id="serach" class="form-control" placeholder="Search" />
                    </div>
                </div>
            </div>
            <div class="ajax_loader">
                <img src="{{ url('assets/images/loading.gif') }}" class="img-responsive" />
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered student-dm">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id">Student ID <span id="id_icon"></span></th>
                                        <th width="25%" class="sorting" data-sorting_type="asc"
                                            data-column_name="post_title">Student's Name <span id="post_title_icon"></span></th>
                                        <th width="12%">Student's Phone</th>
                                        <th width="25%">Student's Email</th>
                                        <th width="30%">Exam Name</th>

                                        @permission('view_student' , 'edit_student' , 'delete_student')        
                                            <th width="10%">Actions</th>
                                        @endpermission
                                    </tr>
                                </thead>
                                <tbody id="paginate-table-body">
                                    @include('backend.pages.student.pagination_data')
                                </tbody>
                            </table>
                            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                            <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                            <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="printDivDetails" style="display:inline; visibility:hidden;">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <div class="table-responsive table table-bordered print-details-container p-3" id="div-id-name">
                                    <br>
                                    <div class="row justify-content-center align-items-center mb-3">
                                        <div class="float-left mr-4">
                                            <img id='img' src="{{($generalSettings) ? url('public/uploads/files/logo/').'/'.$generalSettings->image : '' }}" class="" style="background-color:; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                                        </div>
                                        <div class="float-right mb-4">
                                            <span class="font-weight-bold" style="font-size: 25px; margin-top:150px">{{($generalSettings) ? $generalSettings->name : ''}}</span>
                                            <br>
                                            <span class="font-weight-bold" style="font-size: 25px">Exam: All Exams</span>
                                        </div>
                                    </div>
                                    <h3 style="text-align:center">Student List</h3>
                                    <br>
                                    <table id="order-listing" class="table student-dm">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center; font-size: 20px;">SL</th>
                                                <th style="text-align:center; font-size: 20px;">Student's ID</th>
                                                <th style="text-align:center; font-size: 20px;">Student's Name</th>
                                                <th style="text-align:center; font-size: 20px;">Student's Phone No</th>
                                                <th style="text-align:center; font-size: 20px;">Students's Email</th>
                                                <!--<th style="text-align:center; font-size: 20px;">Batch Name</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($studentsPrint as $key=>$student)
                                            <tr class="item">
                                                <td style="text-align:center;font-size:18px;">{{ ++$key }}</td>
                                                <td style="text-align:center;font-size:18px;">@if($student->student_id!='null'){{ $student->student_id }}@endif</td>
                                                <td style="text-align:center;font-size:18px;">{{ $student->user->name }}</td>
                                                <td style="text-align:center;font-size:18px;">{{ $student->user->phone ?? '-' }}</td>
                                                <td style="text-align:center;font-size:18px;">{{ $student->user->email ?? '-' }}</td>
                                                <!--<td style="text-align:center;font-size:18px;">{{ $student->batch->name ?? '-' }}</td>-->
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="float-left ml-2">
                                        <p>Powered By : Desktopit.net</p>
                                    </div>
                                    <div class="float-right">
                                        <p>Date: {{date('d-m-Y')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('backend.pages.student.modal.student-view')
@include('backend.pages.student.modal.student-delete')
@endsection

@push('plugin-scripts')
{{-- {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
{!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!} --}}
{!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js') !!}
{!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
{!! Html::script('public/assets/js/printThis.js') !!}
{!! Html::script('public/assets/plugins/moment/moment.js') !!}
@endpush

@push('custom-scripts')
{{-- {!! Html::script('public/assets/js/data-table.js') !!} --}}
{!! Html::script('public/assets/js/toastDemo.js') !!}
<script type="text/javascript">
    $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('danger'))
            showDangerToast('{{ session('danger') }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });
</script>

{{-- Ajax View by modal js code start --}}
<script type="text/javascript">
    $(document).on('click', '.view-modal', function() {
        var id = $(this).data('id');
        var APP_URL = {!! json_encode(url('/')) !!};
        //alert(APP_URL);

        $.ajax({
        cache: false,
        type: 'get',
        url: "students/"+id,
        data: { 'id': id },
        beforeSend: function(jqXHR, settings) {
            console.log(jqXHR);
        },
        success: function(data) {
            //console.log(data.students);
            $('#firstName').text(data.students.user.first_name);
            $('#firstName_print').text(data.students.user.first_name);
            $('#lastName').text(data.students.last_name);
            $('#lastName_print').text(data.students.last_name);
            $('#email').text(data.students.user.email);
            $('#email_print').text(data.students.user.email);
            $('#mobile').text(data.students.user.phone);
            $('#mobile_print').text(data.students.user.phone);
            $('#password').text(data.students.user.raw_password);
            $('#password_print').text(data.students.user.raw_password);
            $('#permanentAddress').text(data.students.permanent_address);
            $('#permanentAddress_print').text(data.students.permanent_address);
            $('#birth_id').text(data.students.birth_id);
            $('#birth_id_print').text(data.students.birth_id); 
            $('#school_name').text(data.students.school_name);
            $('#school_name_print').text(data.students.school_name);
            $('#class').text(data.students.class);
            $('#class_print').text(data.students.class);
            $('#cashback_way').text(data.students.user.cashback_way);
            $('#entry_date').text(data.students.created_at);
            $('#user_image'). attr("src", APP_URL+"/uploads/user_images/"+data.students.user.user_image);
            $('#viewModal').modal('show');
        }
        });

      });
</script>
{{-- Ajax View by modal js code end --}}

{{-- Ajax delete by modal js code start --}}
<script type="text/javascript">
    var user_id;
        $(document).on('click', '.delete', function(){
        user_id = $(this).data('id');
        $('#confirmModal').modal('show');
        });
        $('#ok_button').click(function(){
        $.ajax({
        cache: false,
        type: 'delete',
        url:"students/"+user_id,
        dataType: "JSON",
        data: {
        "id": user_id, _token: '{{csrf_token()}}'},

        beforeSend:function(){
        $('#ok_button').text('Deleting...');
        },
        success:function(response)
        {
        //console.log(response.success);
        $('#confirmModal').modal('hide');
        $('#'+user_id).remove();
        $('#ok_button').text("OK");
        showSuccessToast(response.success);
        window.location.replace('students');
        }
        })
        });
</script>

{{-- Ajax delete by modal js code end --}}

<script type="text/javascript">
    $(document).ready(function(){
        let search = false;
     function clear_icon()
     {
      $('#id_icon').html('');
      $('#post_title_icon').html('');
     }
    
     function fetch_data(page, sort_type, sort_by, query)
     {
      $.ajax({
       url:"{{ route('admin.students.fetch_data') }}"+"?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
       beforeSend: function()
        {   
            if(!search){
                $('.ajax_loader').css("visibility", "visible");
            }
        },
       success:function(data)
       {
        $('#paginate-table-body').html('');
        $('#paginate-table-body').html(data);
       },
       complete: function()
        {
            $('.ajax_loader').css("visibility", "hidden");
        },
      })
     }
    
     $(document).on('keyup', '#serach', function(){
      search = true;
      var query = $('#serach').val();
      var column_name = $('#hidden_column_name').val();
      var sort_type = $('#hidden_sort_type').val();
      var page = 1;
      fetch_data(page, sort_type, column_name, query);
     });
    
     $(document).on('click', '.sorting', function(){
      var column_name = $(this).data('column_name');
      var order_type = $(this).data('sorting_type');
      var reverse_order = '';
      if(order_type == 'asc')
      {
       $(this).data('sorting_type', 'desc');
       reverse_order = 'desc';
       clear_icon();
       $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
      }
      if(order_type == 'desc')
      {
       $(this).data('sorting_type', 'asc');
       reverse_order = 'asc';
       clear_icon();
       $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
      }
      $('#hidden_column_name').val(column_name);
      $('#hidden_sort_type').val(reverse_order);
      var page = $('#hidden_page').val();
      var query = $('#serach').val();
      fetch_data(page, reverse_order, column_name, query);
     });
    
     $(document).on('click', '.pagination a', function(event){
      search =  false;   
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      $('#hidden_page').val(page);
      var column_name = $('#hidden_column_name').val();
      var sort_type = $('#hidden_sort_type').val();
      var query = $('#serach').val();
    
      $('li').removeClass('active');
        $(this).parent().addClass('active');
      fetch_data(page, sort_type, column_name, query);
     });
    
    });
    </script>
    
{{-- Print option starts --}}
<script>
    $('#print-btn').click( function(){
          $('.print-details-container').printThis();
        })
</script>
<script>
    $('#modal-btn').click( function(){
            $('.print-modal').printThis();
        })
</script>
{{-- Print option edns --}}
@endpush