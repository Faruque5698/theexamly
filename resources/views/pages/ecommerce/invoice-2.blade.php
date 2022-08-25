@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="invoice-header d-flex flex-wrap mb-3">
          <h4 class="card-title">Invoice</h4>
          <div class="wrapper ml-auto">
            <button type="button" class="btn btn-inverse-primary mb-2"> Download <i class="mdi mdi-file-pdf"></i>
            </button>
            <button type="button" class="btn btn-inverse-success mb-2"> Print Invoice <i class="mdi mdi-printer"></i>
            </button>
            <button type="button" class="btn btn-inverse-info mb-2"> Send Invoice <i class="mdi mdi-email-outline"></i>
            </button>
          </div>
        </div>
        <div class="invoice-banner">
          <div class="row pb-4">
            <div class="col-md-9">
              <h2 class="font-weight-semibold">INVOICE</h2>
            </div>
            <div class="col-md-3">
              <h4 class="font-weight-bold">Purple</h4>
              <p class="text-white">0120 Jenkins Roads Suite 879 East Brandy, Iceland</p>
            </div>
          </div>
          <hr>
          <div class="row mt-4 pt-2">
            <div class="col-md-9">
              <div class="d-flex">
                <div class="wrapper pr-4">
                  <h5 class="font-weight-regular">INVOICE NO.</h5>
                  <p class="text-white">STR 000434</p>
                </div>
                <div class="wrapper">
                  <h5 class="font-weight-regular">INVOICE DATE.</h5>
                  <p class="text-white">Dec 22, 2019</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <h4 class="font-weight-regular">INVOICE TO</h4>
              <p class="text-white">Gaala & Sons, C-201, Beykoz-34800, Canada.</p>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table mt-5 mb-5">
            <thead>
              <tr>
                <th colspan="1">Description</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="1">Brochure Design</td>
                <td>02</td>
                <td>$20</td>
                <td>$40</td>
              </tr>
              <tr>
                <td colspan="1">Web Design Packages(Template) - Basic</td>
                <td>05</td>
                <td>$25</td>
                <td>$125</td>
              </tr>
              <tr>
                <td colspan="1">Print Ad - Basic - Color</td>
                <td>08</td>
                <td>$500</td>
                <td>$4000</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row bg-secondary rounded p-5">
          <div class="col-md-6">
            <p class="font-weight-semibold mb-2">BANK INFO</p>
            <p class="mb-0"> Account number : 1234 5678 90<br> Bank Details : HSBC<br> Bank code : HSBC23455 </p>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-7 ml-auto">
                <div class="d-flex ml-auto">
                  <p class="font-weight-medium text-muted">Sub - Total amount :</p>
                  <p class="font-weight-bold ml-auto">$12,348</p>
                </div>
                <div class="d-flex ml-auto">
                  <p class="font-weight-medium text-muted">Vat (10%) :</p>
                  <p class="font-weight-bold ml-auto">$138</p>
                </div>
                <div class="d-flex ml-auto">
                  <p class="font-weight-medium text-muted">Total Amount :</p>
                  <h4 class="font-weight-bold ml-auto text-primary">$13,986</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection