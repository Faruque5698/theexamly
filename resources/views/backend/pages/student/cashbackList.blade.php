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
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb" class="nav-container">
                            <ol class="breadcrumb breadcrumb-custom ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>List of Refer Code Owner</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>List</span></li>
                            </ol>
                            <!--@permission('add_subject_btn')-->
                            <!--    <a href="{{ route('admin.subject.create') }}"-->
                            <!--    class="btn btn-sm btn-info button-custom">Add New Subject-->
                            <!--    </a>-->
                            <!--@endpermission-->

                        </nav>
                    </div>
                    <div class="col-md-12 text-right" style="margin-top: 8px; margin-bottom: 8px">
                        <button id='btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
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
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Refer Code</th>
                                        <th>Owner</th>
                                        <th>Mobile</th>
                                        <th>Cashback Way</th>
                                        <!--@permission('activate_subject')-->
                                        <!--    <th>Status</th>-->
                                        <!--@endpermission-->
                                            
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                      $sl=0;
                                    @endphp    
                                    @foreach($a as $key=>$lists)
                                    <?php $owner=DB::table('users')->where('own_refer_code', $lists->refer_code)->get()->first(); ?>
                                    @if(!empty($owner))
                                    
                                        <tr>
                                            <td>{{ ++$sl }}</td>

                                            <td class="word_breck">{{ $lists->first_name }} {{ $lists->last_name ?? '' }}</td>
                                            {{-- <td> {{ $lists->email }} </td> --}}
                                            <td>{{ $lists->phone }}</td>
                                            <td>{{ $lists->refer_code }}</td>
                                            
                                            <td>{{ $owner->first_name ?? '' }} {{ $owner->last_name ?? '' }}</td>
                                            <td> {{ $owner->phone ?? ''}} </td>
                                            <td class="word_breck"> {{ $owner->cashback_way ?? ''}} </td>
                                            <!--@permission('activate_subject')-->
                                            <!--    <td>-->
                                            <!--        <input data-id="{{$lists->id}}" class="toggle-class" type="checkbox" data-width="60px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $lists->status ? 'checked' : '' }}>-->
                                            <!--    </td>-->
                                            <!--@endpermission-->
                                        </tr>
                                        @endif
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

<div class="printDiv" style="visibility: hidden; display:inline;">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">                              
                <div class="table-responsive table table-bordered print-container p-3" id="div-id-name"><br>
                    <div class="row justify-content-center align-items-center">
                        <div class="float-left mr-4">
                            <div class="float-left mr-4">
                                <img id='img' src="{{($generalSettings) ? url('public/uploads/files/logo/').'/'.$generalSettings->image : '' }}" class="" style="background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                            </div>
                        </div>
                        
                        <!--<div class="float-right mb-5">-->
                        <!--    <span class="font-weight-bold" style="font-size: 25px; margin-top:150px">{{($generalSettings) ? $generalSettings->name : ''}}</span>-->
                        <!--</div>-->
                    </div>
                    <br>  
                    <h3  style="text-align:center">All List</h3>
                    <br>
                    <table id="order-listing" class="table text-center student-dm">
                        <thead>
                            <tr>
                                <th style="text-align:center; font-size: 20px;">SL #</th>
                                <th style="text-align:center; font-size: 20px;">Name</th>
                                <th style="text-align:center; font-size: 20px;">Mobile</th>
                                <th style="text-align:center; font-size: 20px;">Refer Code</th>
                                <th style="text-align:center; font-size: 20px;">Owner</th>
                                <th style="text-align:center; font-size: 20px;">Mobile</th>
                                <th style="text-align:center; font-size: 20px;">Cashback Way</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sl=0;@endphp  
                                    @foreach($a as $key=>$lists)
                                    <?php $owner=DB::table('users')->where('own_refer_code', $lists->refer_code)->get()->first(); ?>
                                    @if(!empty($owner))
                                <tr class="item">
                                    <td style="text-align:center;font-size:18px;">{{ ++$sl }}</td>
                                    <td style="text-align:center;font-size:18px;">{{ $lists->first_name }} {{ $lists->last_name }}</td>
                                    <td style="text-align:center;font-size:18px;">{{ $lists->phone }}</td>
                                    <td style="text-align:center;font-size:18px;">{{ $lists->refer_code }}</td>
                                    <td style="text-align:center;font-size:18px;">{{ $owner->first_name }} {{ $owner->last_name }}</td>
                                    <td style="text-align:center;font-size:18px;">{{ $owner->phone }}</td>
                                    <td style="text-align:center;font-size:18px;">{{ $owner->cashback_way }}</td>

                                </tr>
                             @endif   
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

     @include('backend.pages.subject.modal.subject-delete')
@endsection

@push('plugin-scripts')

    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/js/printThis.js') !!}
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
              url: 'subjectChangeStatus',
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
          url:"subject/delete/"+user_id,
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
          window.location.replace('subject');
        }
        })
        });
      </script>
    {{-- Ajax delete by modal js code end --}}
    
    {{-- Print js code --}}
    <script>
        $('#btn').click( function(){
          $('.print-container').printThis();
        })
    </script>
@endpush
