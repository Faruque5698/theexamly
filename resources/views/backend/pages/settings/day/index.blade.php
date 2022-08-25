@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('public/css/toggle-text-style.css') !!}
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
                                <li class="breadcrumb-item"><a>Settings</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Day</span></li>
                            </ol>

                            <a href="{{ route('admin.weekDays.create') }}"
                               class="btn btn-sm btn-info button-custom">Add New Day
                            </a>

                        </nav>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table text-center">
                                    <thead>
                                    <tr>
                                        <th>SL #</th>
                                        <th>Day Name</th>
                                        <th>Status</th>
                                        @permission('edit_weekDays')
                                        <th>Actions</th>
                                        @endpermission
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($weekDays as $key=>$weekDay)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $weekDay->name }}</td>
                                            <td>
                                                <input data-id="{{$weekDay->id}}" class="toggle-class" type="checkbox" data-width="60px" data-height="30px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="OnDay" data-off="Holyday" {{ $weekDay->status ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                {{-- <form action="{{ route('admin.course.destroy', $course)}}"
                                                      method="post"> --}}
                                                    @permission('edit_weekDays')
                                                    <a href="{{ route("admin.weekDays.edit", $weekDay)}}"
                                                       class="btn btn-success" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    @endpermission
                                                    @csrf
                                                    @method('DELETE')
                                                    @permission('delete_weekDays')
                                                    <a href="javascript:void(0)" class="btn btn-danger delete"

                                                       title="delete" data-id={{$weekDay->id}}>
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    @endpermission
                                                {{-- </form> --}}
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
     @include('backend.pages.settings.day.modal.day-delete')
@endsection

@push('plugin-scripts')

    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
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

<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var category_id = $(this).data('id');

          $.ajax({
              type: "GET",
              dataType: "json",
              url: 'changeStatusDay',
              data: {'status': status, 'category_id': category_id},
              success: function(data){
                showSuccessToast('Status changed successfully');
                console.log(data.success)
              }
          });
      })
    })
  </script>

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
          url:"weekDays/"+user_id,
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
          window.location.replace('weekDays');
          showSuccessToast(response.success);
          
        }
        })
        });
      </script>
    {{-- Ajax delete by modal js code end --}}  
@endpush
