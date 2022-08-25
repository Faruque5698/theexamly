@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/summernote/summernote-bs4.css') !!}
  {!! Html::style('/assets/plugins/quill/quill.snow.css') !!}
  {!! Html::style('/assets/plugins/simplemde/simplemde.min.css') !!}
@endpush

@section('content')
<div>
  <div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">summernote Editor</h4>
          <div id="summernoteExample">
            <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
            <img src="https://via.placeholder.com/261x162" class="ml-2 mb-2 w-25" alt="img">
            <p class="text-justify">
              "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </p>
            <p class="text-justify">
              "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
              veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
              magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tinymce Editor</h4>
          <textarea id='tinyMceExample'>
            Edit your content here...
          </textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Quill Editor</h4>
          <div id="quillExample1" class="quill-container">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Simplemde Editor</h4>
          <textarea id="simpleMde">
          </textarea>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/summernote/summernote-bs4.min.js') !!}
  {!! Html::script('/assets/plugins/tinymce/tinymce.min.js') !!}
  {!! Html::script('/assets/plugins/quill/quill.min.js') !!}
  {!! Html::script('/assets/plugins/simplemde/simplemde.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/editorDemo.js') !!}
@endpush