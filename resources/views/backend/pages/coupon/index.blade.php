@extends('backend.layout.master')

@push('plugin-styles')

    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}

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
                                <li class="breadcrumb-item"><a>Coupon</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Coupon List</span></li>
                            </ol>
                            @permission('add_coupon_btn')
                                <a href="{{ route('admin.coupon.create') }}"
                                class="btn btn-sm btn-info button-custom">
                                    Add New Coupon
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
                                        <th>SL</th>
                                        <th>Coupon Code</th>
                                        <th> Prefix</th>
                                        <th>Amount</th>
                                        <th>Validity</th>
                                        @permission('view_coupon')
                                            <th>Actions</th>
                                        @endpermission
                                    </tr>
                                    </thead>
                                    <tbody>

                                      @foreach($coupons as $key=>$coupon)
                                          <tr class="item">
                                              <td>{{ ++$key }}</td>
                                              <td>{{ $coupon->name }}</td>
                                              <td>
                                                 {{ $coupon->prefix }}
                                              </td>
                                              <td>
                                                  {{ $coupon->discount_amount }}
                                              </td>

                                              <td>
                                                  {{ date ('d-m-Y',strtotime($coupon->expires_at)) }}

                                              </td>
                                              @permission('view_coupon')
                                                <td style="width: 5%">
                                                   <a href="javascript:void(0)" class="btn btn-warning view-modal" data-id={{$coupon->id }}
                                                        title="View" >
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                              @endpermission
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

    @include('backend.pages.coupon.modal.coupon-view')
    @include('backend.pages.batch.runningBatch.modal.runningBatch-delete')
@endsection

@push('plugin-scripts')

    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/plugins/moment/moment.js') !!}
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

{{-- Ajax View by modal js code start --}}
<script type="text/javascript">
    $(document).on('click', '.view-modal', function() {
        var id = $(this).data('id');
        var APP_URL = {!! json_encode(url('/')) !!};
        $.ajax({
        cache: false,
        type: 'get',
        url: "coupon/"+id,
        data: { 'id': id },
        success: function(data) {
            // console.log(data.coupon);
            $('#id').text(data.coupon.id);
            $('#name').text(data.coupon.name);
            $('#prefix').text(data.coupon.prefix);
            $('#amount').text(data.coupon.discount_amount);
            $('#start_date').text( moment.utc(data.coupon.starts_at).local().format('DD-MM-YYYY'));
            $('#end_date').text(moment.utc(data.coupon.expires_at).local().format('DD-MM-YYYY'));
            $('#viewModal').modal('show');
        }
        });

      });
</script>
{{-- Ajax View by modal js code end --}}
@endpush
