@extends('backend.layout.master')

@push('plugin-styles')

    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.coupon.search') }}">Search Coupon</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Coupon List</span></li>
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
                                        <th>SL</th>
                                        <th>Coupon Name</th>
                                        <th> Prefix</th>
                                        <th>Ammount</th>
                                        <th>Validity</th>
                                        <th>Status</th>
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

                                              <td style="width: 5%">
                                                  {{ $coupon->use_status }}
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

    @include('backend.pages.batch.runningBatch.modal.runningBatch-view')
    @include('backend.pages.batch.runningBatch.modal.runningBatch-delete')
@endsection

@push('plugin-scripts')

    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}

@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/data-table.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}
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
{{-- Ajax delete by modal js code end --}}
@endpush
