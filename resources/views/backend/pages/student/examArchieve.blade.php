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
                            <li class="breadcrumb-item active" aria-current="page"><span>Archieve</span></li>
                        </ol>
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
                                        <th>Exam Name</th>
                                        <th>Category Name</th>
                                        <th>Subject Name</th>
                                        <th>Price</th>
                                        <th>
                                            @permission('view_blog','edit_blog', 'delete_blog')  
                                                Actions   
                                            @endpermission 
                                        </th>
                                       
                                           
                                    </tr>
                                </thead>
                                <tbody>

                            
                                   @php 
                                    use App\Models\Backend\Subject;
                                    use App\Models\Backend\CourseCategory;
                                    use App\Models\Backend\Course;
                                    $date = today()->format('Y-m-d'); 
                                   @endphp
                                    @foreach ($subject_id as $key => $value) 
                                       @php 
                                       // var_dump($value);exit;
                                       $examArchieve[] = Subject::with('courseCategory')->where('end_date','<',$date)->where('id',$value)->latest()->get();
                                       
                                       @endphp

                                    
                                        @foreach ($examArchieve as $key => $value2) 

                                            @foreach ($value2 as $key => $value3) 
                                            
                                            
                                            @endforeach
                                          
                                          
                                        @endforeach

                                    @endforeach

                                    <tr>
                                        <td>{{ +$key }}</td>
                                        <?php $examCategory = CourseCategory::where('id',$value3->exam_category)->get()->pluck('name')->first()?>
                                        <td>{{ $examCategory}}</td>
                                        <?php $course = Course::where('id',$value3->group_id)->get()->pluck('full_name')->first()?>
                                        <td>{{ $course}}</td>
                                        <!--@if(!empty($value3))-->
                                        <td>{{ $value3->name }}</td>
                                        <td>{{ $value3->price }}</td>
                                        
                                        <!--@else-->
                                        <!--<span></span>-->
                                        <!--@endif-->
                                        <td>
                                            @permission('view_blog')  
                                                <a href="javascript:void(0)" class="btn btn-warning view-modal" title="View"
                                                    data-id={{ $value3->id }}>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endpermission
                                    
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('backend.pages.blog.modal.blog-delete')
@include('backend.pages.blog.modal.blog-view')
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
            url:"blogs/delete/"+id,
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
                window.location.replace('blogs');
            }
        })
    });
</script>
{{-- Ajax delete by modal js code end --}}

{{-- Toggle button js code starts --}}
<script>
    $(function() {
          $('.toggle-class').change(function() {
              var status = $(this).prop('checked') == true ? 1 : 0;
              var category_id = $(this).data('id');
    
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: 'changeBlogStatusPublish',
                  data: {'status': status, 'category_id': category_id},
                  success: function(data){
                    showSuccessToast('Status changed successfully');
                    // console.log(data.success)
                  }
              });
          })
         })
</script>
{{-- Toggle button js code ends --}}

{{-- Ajax view modal starts --}}
<script type="text/javascript">
    $(document).on('click', '.view-modal', function() {

            var id = $(this).data('id');
            var APP_URL = {!! json_encode(url('/')) !!};
            // console.log(id);
            $.ajax({
                cache: false,
                type: 'get',
                url: "blogs/"+id,
                data: { 'id': id },
                success: function(data) {
                    // console.log(data.attachmentExtension);
                    $('#title').text(data.blog.title);
                    $('#description').html(data.blog.description);
                    $('#status').text((data.blog.status) ? "Published" : "Unpublished");
                    $('#image'). attr("src", APP_URL+"/public/uploads/files/blog/"+data.blog.image);
                    $('#viewModal').modal('show');
                }
            });
  
        });
</script>
{{-- Ajax view modal ends --}}
@endpush