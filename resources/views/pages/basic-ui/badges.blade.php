@extends('layout.master')
@section('content')

<div class="row">
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Normal Badges</h4>
        <p class="card-description">Add class <code>.badge-{color}</code> with <code>.badge</code></p>
        <div class="template-demo">
          <table class="table mb-0">
            <thead>
              <tr>
                <th class="pl-0">Item</th>
                <th class="text-right">Label</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="pl-0">Primary label</td>
                <td class="pr-0 text-right"><div class="badge badge-primary">Primary</div></td>
              </tr>
              <tr>
                <td class="pl-0">Info label</td>
                <td class="pr-0 text-right"><div class="badge badge-info">Info</div></td>
              </tr>
              <tr>
                <td class="pl-0">Danger label</td>
                <td class="pr-0 text-right"><div class="badge badge-danger">Danger</div></td>
              </tr>
              <tr>
                <td class="pl-0">Success label</td>
                <td class="pr-0 text-right"><div class="badge badge-success">Success</div></td>
              </tr>
              <tr>
                <td class="pl-0">Warning label</td>
                <td class="pr-0 text-right"><div class="badge badge-warning">Warning</div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Badge Pills</h4>
        <p class="card-description">Add class <code>.badge-pill</code></p>
        <div class="template-demo">
          <table class="table mb-0">
            <thead>
              <tr>
                <th class="pl-0">Item</th>
                <th class="text-right">Label</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="pl-0">Primary label</td>
                <td class="pr-0 text-right"><div class="badge badge-primary badge-pill">Primary</div></td>
              </tr>
              <tr>
                <td class="pl-0">Info label</td>
                <td class="pr-0 text-right"><div class="badge badge-info badge-pill">Info</div></td>
              </tr>
              <tr>
                <td class="pl-0">Danger label</td>
                <td class="pr-0 text-right"><div class="badge badge-danger badge-pill">Danger</div></td>
              </tr>
              <tr>
                <td class="pl-0">Success label</td>
                <td class="pr-0 text-right"><div class="badge badge-success badge-pill">Success</div></td>
              </tr>
              <tr>
                <td class="pl-0">Warning label</td>
                <td class="pr-0 text-right"><div class="badge badge-warning badge-pill">Warning</div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Badge Outlined Variations</h4>
        <p class="card-description">Add class <code>.badge-outline-*</code></p>
        <div class="template-demo">
          <table class="table mb-0">
            <thead>
              <tr>
                <th class="pl-0">Normal</th>
                <th class="text-right">Rounded</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="pl-0"><div class="badge badge-outline-primary badge-pill">Primary</div></td>
                <td class="pr-0 text-right"><div class="badge badge-outline-primary">Primary</div></td>
              </tr>
              <tr>
                <td class="pl-0"><div class="badge badge-outline-info badge-pill">Info</div></td>
                <td class="pr-0 text-right"><div class="badge badge-outline-info">Info</div></td>
              </tr>
              <tr>
                <td class="pl-0"><div class="badge badge-outline-danger badge-pill">Danger</div></td>
                <td class="pr-0 text-right"><div class="badge badge-outline-danger">Danger</div></td>
              </tr>
              <tr>
                <td class="pl-0"><div class="badge badge-outline-success badge-pill">Success</div></td>
                <td class="pr-0 text-right"><div class="badge badge-outline-success">Success</div></td>
              </tr>
              <tr>
                <td class="pl-0"><div class="badge badge-outline-warning badge-pill">Warning</div></td>
                <td class="pr-0 text-right"><div class="badge badge-outline-warning">Warning</div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Badge Outlined Variations</h4>
        <div class="template-demo">
          <table class="table mb-0">
            <thead>
              <tr>
                <th class="pl-0">Item</th>
                <th class="text-right">Label</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="pl-0">Rounded Primary</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-outline-primary">2</div></td>
              </tr>
              <tr>
                <td class="pl-0">Rounded Info</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-outline-info">5</div></td>
              </tr>
              <tr>
                <td class="pl-0">Rounded Danger</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-outline-danger">1</div></td>
              </tr>
              <tr>
                <td class="pl-0">Rounded Success</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-outline-success">9</div></td>
              </tr>
              <tr>
                <td class="pl-0">Rounded Warning</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-outline-warning">4</div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Badge Variations</h4>
        <div class="template-demo">
          <table class="table mb-0">
            <thead>
              <tr>
                <th class="pl-0">Item</th>
                <th class="text-right">Label</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="pl-0">Rounded Primary</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-primary">2</div></td>
              </tr>
              <tr>
                <td class="pl-0">Rounded Info</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-info">5</div></td>
              </tr>
              <tr>
                <td class="pl-0">Rounded Danger</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-danger">1</div></td>
              </tr>
              <tr>
                <td class="pl-0">Rounded Success</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-success">9</div></td>
              </tr>
              <tr>
                <td class="pl-0">Rounded Warning</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-warning">4</div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Badge With Icons</h4>
        <div class="template-demo">
          <table class="table mb-0">
            <thead>
              <tr>
                <th class="pl-0">Item</th>
                <th class="text-right">Label</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="pl-0">Icon Badge</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-primary"><i class="ti-user"></i></div></td>
              </tr>
              <tr>
                <td class="pl-0">Outlined Icons</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-outline-info"><i class="ti-cloud"></i></div></td>
              </tr>
              <tr>
                <td class="pl-0">Icon With Text</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-danger"><i class="ti-email mr-2"></i>12</div></td>
              </tr>
              <tr>
                <td class="pl-0">Icon With Text</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-success">12<i class="ti-email ml-2"></i></div></td>
              </tr>
              <tr>
                <td class="pl-0">Icon Badge</td>
                <td class="pr-0 text-right"><div class="badge badge-pill badge-warning"><i class="ti-comment"></i></div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection