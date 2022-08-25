@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic Sortable Table</h4>
        <p class="page-description">Add class <code>.sortable-table</code> </p>
        <div class="row">
          <div class="table-sorter-wrapper col-lg-12 table-responsive">
            <table id="sortable-table-1" class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th class="sortStyle">First Name <i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle">Last Name <i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle">Product <i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle">Amount <i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle">Deadline <i class="mdi mdi-chevron-down"></i>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Herman Beck</td>
                  <td>John</td>
                  <td>Photoshop</td>
                  <td>$456.00</td>
                  <td>12 May 2017</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Herman Beck</td>
                  <td>Conway</td>
                  <td>Flash</td>
                  <td>$965.00</td>
                  <td>13 May 2017</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>John Richards</td>
                  <td>Alex</td>
                  <td>Premeire</td>
                  <td>$255.00</td>
                  <td>14 May 2017</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>John Richards</td>
                  <td>Jason</td>
                  <td>After effects</td>
                  <td>$975.00</td>
                  <td>15 May 2017</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Messsy max</td>
                  <td>Back</td>
                  <td>Ilustrator</td>
                  <td>$298.00</td>
                  <td>16 May 2017</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Striped Sortable Table</h4>
        <p class="page-description">Add class <code>.table-striped</code> for table</p>
        <div class="row">
          <div class="table-sorter-wrapper col-lg-12 table-responsive">
            <table id="sortable-table-2" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th class="sortStyle">First Name <i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle">Last Name <i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle">Product <i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle">Amount <i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle">Deadline <i class="mdi mdi-chevron-down"></i>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Herman Beck</td>
                  <td>John</td>
                  <td>Photoshop</td>
                  <td>$456.00</td>
                  <td>12 May 2017</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Herman Beck</td>
                  <td>Conway</td>
                  <td>Flash</td>
                  <td>$965.00</td>
                  <td>13 May 2017</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>John Richards</td>
                  <td>Alex</td>
                  <td>Premeire</td>
                  <td>$255.00</td>
                  <td>14 May 2017</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>John Richards</td>
                  <td>Jason</td>
                  <td>After effects</td>
                  <td>$975.00</td>
                  <td>15 May 2017</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Messsy max</td>
                  <td>Back</td>
                  <td>Ilustrator</td>
                  <td>$298.00</td>
                  <td>16 May 2017</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
{!! Html::script('/assets/js/jq.tablesort.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/tablesorter.js') !!}
@endpush