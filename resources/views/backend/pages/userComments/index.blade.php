@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('public/css/toggle-text-style.css') !!}
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
@endpush

<style type="text/css">
  .word_breck{
      white-space: normal!important;
      overflow-wrap: break-word;
      word-break: break-word;
  }
</style>

@section('content')
    <div class="col-md-13 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Comments</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Comments List</span></li>
                        </ol>
                        @permission('add_comments')
                          <a href="{{ route('admin.userComments.create') }}"
                                class="btn btn-sm btn-info button-custom">Comments Add
                          </a>
                        @endpermission
                    </nav>
                </div>
            </div>
            <div class="col-md-12 text-right" style="margin-top: 8px; margin-bottom: 8px">
              <button id='btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
            </div>            
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr>
                              <th>SL#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Comments</th>
                              @permission('status_comments')
                                <th>Status</th>
                              @endpermission
                              @permission('view_comments', 'edit_comments', 'delete_comments')
                                <th style="text-align:center">Actions</th>
                              @endpermission  
                            </tr>
                          </thead>
                          <tbody>
                              @php
                                  $key = 0;
                              @endphp
                              @foreach($userComments as $comments)
                                  <tr id="{{$comments->id}}">
                                      <td>{{ ++$key }}</td>
                                      <td>{{ $comments->user->name ?? '-' }}</td>
                                      <td>{{ $comments->user->email ?? '-' }}</td>
                                      <td class="word_breck">{{ $comments->comments?? '-' }}</td>
                                      <td>
                                        @permission('status_comments')
                                          <input data-id="{{$comments->id}}" class="toggle-class" type="checkbox" data-width="60px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Publish" data-off="Unpublish" {{ $comments->status ? 'checked' : '' }}>
                                        @endpermission
                                      </td>
                                      <td style="text-align: center">
                                        @permission('view_comments')
                                            <a href="javascript:void(0)" class="btn btn-warning view-modal"
                                              title="View" data-id={{$comments->id }}>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                          @endpermission
                                          @permission('edit_comments')
                                            <a href="{{ route('admin.userComments.edit', $comments->id)}}" class="btn btn-success"
                                              title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                          @endpermission
                                          @permission('delete_comments')
                                            <a href="javascript:void(0)" class="btn btn-danger delete"
                                              title="delete" data-id={{$comments->id}}>
                                                <i class="fa fa-trash"></i>
                                            </a>
                                          @endpermission
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
    </div>

    @include('backend.pages.userComments.modal.userComments-view')
    @include('backend.pages.userComments.modal.userComments-delete') 

  <div class="printDiv" style="visibility: hidden; display:inline;">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="table-responsive table table-bordered print-container p-3" id="div-id-name"><br>
                <div class="row justify-content-center align-items-center mb-3">
                  <div class="float-left mr-4">
                    <img id='img' src="{{($generalSettings) ? url('/uploads/files/logo/').'/'.$generalSettings->image : '' }}" class="" style="background-color:#900c3f; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                  </div>
                  {{-- <div class="float-right mb-5">
                    <span class="font-weight-bold" style="font-size: 25px; margin-top:150px">{{($generalSettings) ? $generalSettings->name : ''}}</span>
                  </div> --}}
                </div>
                <h3  style="text-align:center">All Comment's List</h3>
                <table id="order-listing" class="table student-dm">
                  <thead>
                    <tr>
                      <th style="text-align:center; font-size: 20px;">SL#</th>
                      <th style="text-align:center; font-size: 20px;">Name</th>
                      <th style="text-align:center; font-size: 20px;">Email</th>
                      <th style="text-align:center; font-size: 20px;">Title</th>
                      <th style="text-align:center; font-size: 20px;">Comments</th>
                      <th style="text-align:center; font-size: 20px;">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $key = 0;
                    @endphp
                    @foreach($userComments as $comments)
                        <tr id="{{$comments->id}}">
                            <td style="text-align:center;font-size:18px;">{{ ++$key }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $comments->user->name ?? '-' }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $comments->user->email ?? '-' }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $comments->subject ?? '-' }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $comments->comments ?? '-' }}</td>
                            <td style="text-align:center;font-size:18px;">{{ date('d-m-Y', strtotime($comments->created_at ?? '-')) ?? '-' }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table><br>
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
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('public/assets/js/printThis.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}
  
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
      url:"userComments/delete/"+user_id,
      dataType: "JSON",
      data: {
      "id": user_id

      },
      beforeSend:function(){
      $('#ok_button').text('Deleting...');
      },
      success:function(response)
      {
      // console.log(response);
      $('#confirmModal').modal('hide');
      $('#'+user_id).remove();
      $('#ok_button').text("OK");
      showSuccessToast(response.success);
      // window.location.replace('userComments');
      }
      })
      });
    </script>
  {{-- Ajax delete by modal js code end --}}
  
  
  {{-- Ajax View by modal js code start --}}
      <script type="text/javascript">
        $(document).on('click', '.view-modal', function() {
        var id = $(this).data('id');
        var APP_URL = {!! json_encode(url('/')) !!};
        // alert(APP_URL);

        $.ajax({
        cache: false,
        type: 'get',
        url: "userComments/"+id,
        data: { 'id': id },
        success: function(data) {
        console.log(data);
        $('#name').text(data.userComment.user.name);
        $('#email').text(data.userComment.user.email);
        $('#mobile').text(data.userComment.user.phone);
        $('#status').text((data.userComment.status) ? "Active" : "Inactive");
        $('#subject').text(data.userComment.subject); 
        $('#comments').text(data.userComment.comments);
        $('#date').text(data.userComment.created_at);    
        $('#user_image'). attr("src", APP_URL+"/uploads/user_images/"+data.userComment.user.user_image);
        $('#viewModal').modal('show');

        }
        });

      });
      </script>
      {{-- Ajax View by modal js code end --}}
    
    <script type="text/javascript">   
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    {{-- Print option start --}}
    <script>
      $('#btn').click( function(){
        $('.print-container').printThis();
      })
    </script>

    <script>
      $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var category_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'changePublishStatus',
                data: {'status': status, 'category_id': category_id},
                success: function(data){
                  showSuccessToast('Status changed successfully');
                  console.log(data.success)
                }
            });
        })
      })
    </script>
@endpush
