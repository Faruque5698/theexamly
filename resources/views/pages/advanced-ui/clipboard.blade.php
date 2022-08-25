@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="row">
        <div class="col-md-6">
          <div class="card-body">
            <h4 class="card-title">clipboard on text input</h4>
            <p class="card-description">Cut/copy from text input</p>
            <input type="text" id="clipboardExample1" class="form-control" value="hello">
            <div class="mt-3">
              <button type="button" class="btn btn-info btn-clipboard" data-clipboard-action="copy" data-clipboard-target="#clipboardExample1">Copy</button>
              <button type="button" class="btn btn-success btn-clipboard" data-clipboard-action="cut" data-clipboard-target="#clipboardExample1">Cut</button>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <h4 class="card-title">Clipboard on textarea</h4>
            <p class="card-description">Cut/copy from textarea</p>
            <textarea id="clipboardExample2" class="form-control" rows="3">Hello</textarea>
            <div class="mt-3">
              <button type="button" class="btn btn-info btn-clipboard" data-clipboard-action="copy" data-clipboard-target="#clipboardExample2">Copy</button>
              <button type="button" class="btn btn-success btn-clipboard" data-clipboard-action="cut" data-clipboard-target="#clipboardExample2">Cut</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="row">
        <div class="col-md-6">
          <div class="card-body">
            <h4 class="card-title">Clipboard on paragraph</h4>
            <p class="card-description">Copy from paragraph</p>
            <div class="card card-inverse-secondary">
              <div class="card-body">
                <p id="clipboardExample3">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
              </div>
            </div>
            <div class="mt-3">
              <button type="button" class="btn btn-info btn-clipboard" data-clipboard-action="copy" data-clipboard-target="#clipboardExample3">Copy</button>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <h4 class="card-title">Copy portion from paragraph</h4>
            <p class="card-description">Copy the highlighted text from this paragraph</p>
            <div class="card card-inverse-secondary">
              <div class="card-body">
                <p>
                  Lorem ipsum <span class="bg-info text-white" id="clipboardExample4">dolor sit amet</span>, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
              </div>
            </div>
            <div class="mt-3">
              <button type="button" class="btn btn-info btn-clipboard" data-clipboard-action="copy" data-clipboard-target="#clipboardExample4">Copy highlighted text</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/clipboard/clipboard.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/clipboard.js') !!}
@endpush