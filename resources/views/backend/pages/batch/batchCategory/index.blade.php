@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
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
                                <li class="breadcrumb-item"><a >Batch</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Batch Category</span></li>

                            </ol>
                            @permission('add_batch_category_btn') 
                                <a href="{{ route('admin.batchCategory.create') }}"
                                class="btn btn-sm btn-info button-custom">Add New Batch Category
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
                                        <th>SL #</th>
                                        <th>Batch Category Name</th>
                                        <th>Description</th>
                                        <th>@permission('edit_batch_category', 'delete_batch_category')
                                            Actions @endpermission
                                        </th>
                                            
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($batchCategory as $key=>$batches)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $batches->name }}</td>
                                            <td>{{ $batches->description }}</td>
                                            <td>
                                                @permission('edit_batch_category')  
                                                    <a href="{{ route("admin.batchCategory.edit", $batches)}}" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i>
                                                    </a>
                                                @endpermission

                                                @permission('delete_batch_category') 
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    <a href="javascript:void(0)" class="btn btn-danger delete" title="delete" data-id={{$batches->id}}>
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
    @include('backend.pages.batch.batchCategory.modal.batchCategory-delete')
@endsection

@push('plugin-scripts')
    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/data-table.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}
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
      url:"batchCategorys/delete/"+id,
      dataType: "JSON",
      data: {
      "id": id, _token: '{{csrf_token()}}'},
      beforeSend:function(){
      $('#ok_button').text('Deleting...');
      },
      success:function(response)
      {
        console.log(response.success);
      $('#confirmModal').modal('hide');
      $('#'+id).remove();
      $('#ok_button').text("OK");
      showSuccessToast(response.success);
      window.location.replace('batchCategory');
      }
      })
      });
      </script>
    {{-- Ajax delete by modal js code end --}}  
@endpush
