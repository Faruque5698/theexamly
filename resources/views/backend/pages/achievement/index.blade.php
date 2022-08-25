@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('public/css/toggle-text-style.css') !!}
@endpush

<style type="text/css">
  .word_breck{
      white-space: normal!important;
      overflow-wrap: break-word;
      word-break: break-word;
  }
</style>

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
                            <li class="breadcrumb-item active" aria-current="page"><a>Frontend CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Achievement</span></li>
                        </ol>
                        @permission('add_achievement_btn') 
                            <a href="{{ route('admin.achievement.create') }}" class="btn btn-sm btn-info button-custom">Add New
                                Achievement
                            </a>
                        @endpermission
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
                                        <th>SL#</th>
                                        <th class="word_breck">Question Bank</th>
                                        <th>No. of Exam</th>
                                        <th>Candidates</th>
                                        <th>Exam Topics</th>
                                        <th>Subject of the Examinee</th>
                                        <th> 
                                            @permission('edit_achievement')
                                                Status  
                                            @endpermission 
                                        </th>
                                        <th>
                                            @permission('edit_achievement', 'delete_achievement')
                                                Actions   
                                            @endpermission 
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($achievement as $key=>$achievements)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $achievements->no_of_quiz }}</td>
                                        <td>{{ $achievements->no_of_exam }}</td>
                                        <td>{{ $achievements->no_of_candidates }}</td>
                                        <td>{{ $achievements->no_of_exam_topics }}</td>
                                        <td>{{ $achievements->subject_of_theExaminee }}</td>
                                        <td>
                                            @permission('activate_notice') 
                                                <input data-id="{{$achievements->id}}" class="toggle-class" type="checkbox" data-width="70px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Publish" data-off="Unpublish" {{ $achievements->status ? 'checked' : '' }}>
                                            @endpermission
                                        </td>
                                        <td>

                                            @permission('edit_achievement')  
                                                <a href="{{ route("admin.achievement.edit", $achievements)}}" class="btn btn-success"
                                                    title="Edit"><i class="fa fa-edit"></i>
                                                </a>
                                            @endpermission
                                            
                                            @permission('delete_achievement')
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0)" class="btn btn-danger delete" title="delete"
                                                    data-id={{$achievements->id}}>
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
@include('backend.pages.achievement.modal.achievement-delete')
@endsection

@push('plugin-scripts')
{!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
{!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
{!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
{!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
@endpush

@push('custom-scripts')
{!! Html::script('public/assets/js/data-table.js') !!}
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

{{-- Ajax delete by modal js code start --}}

<script type="text/javascript">
    var id;
    $(document).on('click', '.delete', function(){
        id = $(this).data('id');
        $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function(){
        $.ajax({
            cache: false,
            type: 'delete',
            url:"achievement/delete/"+id,
            dataType: "JSON",
            data: {"id": id, _token: '{{csrf_token()}}'},
            beforeSend:function(){
                $('#ok_button').text('Deleting...');
            },
            success:function(response)
            {
                // console.log(response.success);
                $('#confirmModal').modal('hide');
                $('#'+id).remove();
                $('#ok_button').text("OK");
                showSuccessToast(response.success);
                window.location.replace('achievement');
            }
        })
    });
</script>
{{-- Ajax delete by modal js code end --}}
    <script>
      $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var category_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'changeAchievementStatus',
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