@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/jstree/themes/default/style.min.css') !!}
@endpush

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Default Tree Style</h4>
            <div id="jstree_sample_1">
              <ul>
                <li class="jstree-open">Star Pro <ul>
                    <li>gulp-tasks</li>
                    <li>src<ul>
                        <li> assets </li>
                        <li>demo_1</li>
                        <li>demo_2</li>
                        <li>demo_3</li>
                        <li>demo_4</li>
                        <li>demo_5</li>
                        <li>demo_6</li>
                        <li>demo_7</li>
                        <li>demo_8</li>
                        <li>demo_9</li>
                        <li>demo_10</li>
                        <li>docs</li>
                        <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/html.png') }}"}'> dashboard</li>
                      </ul>
                    </li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/git-file.png') }}"}'> .gitignore</li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/corrupted-file.png') }}"}'> CHANGELOG.md</li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/html.png') }}"}'> gulpfile.js </li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/html.png') }}"}'> package.json </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Context Menu View</h4>
            <div id="jstree_sample_3">
              <ul>
                <li class="jstree-open">Star Pro <ul>
                    <li>gulp-tasks</li>
                    <li class="jstree-open">src <ul>
                        <li> assets </li>
                        <li>demo_1</li>
                        <li>demo_2</li>
                        <li>demo_3</li>
                        <li>demo_4</li>
                        <li>demo_5</li>
                        <li>demo_6</li>
                        <li>demo_7</li>
                        <li>demo_8</li>
                        <li>demo_9</li>
                        <li>demo_10</li>
                        <li>docs</li>
                        <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/html.png') }}"}'> dashboard</li>
                      </ul>
                    </li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/git-file.png') }}"}'> .gitignore</li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/corrupted-file.png') }}"}'> CHANGELOG.md</li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/html.png') }}"}'> gulpfile.js </li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/html.png') }}"}'> package.json </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Checkbox Tree Style</h4>
            <div id="jstree_sample_2">
              <ul>
                <li class="jstree-open">Star Pro <ul>
                    <li>gulp-tasks</li>
                    <li class="jstree-open">src <ul>
                        <li> assets </li>
                        <li>demo_1</li>
                        <li>demo_2</li>
                        <li>demo_3</li>
                        <li>demo_4</li>
                        <li>demo_5</li>
                        <li>demo_6</li>
                        <li>demo_7</li>
                        <li>demo_8</li>
                        <li>demo_9</li>
                        <li>demo_10</li>
                        <li>docs</li>
                        <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/html.png') }}"}'> dashboard</li>
                      </ul>
                    </li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/git-file.png') }}"}'> .gitignore</li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/corrupted-file.png') }}"}'> CHANGELOG.md</li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/html.png') }}"}'> gulpfile.js </li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/html.png') }}"}'> package.json </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Drag n Drop Enabled</h4>
            <div id="jstree_sample_4">
              <ul>
                <li class="jstree-open">Star Pro <ul>
                    <li>gulp-tasks</li>
                    <li class="jstree-open">src <ul>
                        <li> assets </li>
                        <li>demo_1</li>
                        <li>demo_2</li>
                        <li>demo_3</li>
                        <li>demo_4</li>
                        <li>demo_5</li>
                        <li>demo_6</li>
                        <li>demo_7</li>
                        <li>demo_8</li>
                        <li>demo_9</li>
                        <li>demo_10</li>
                        <li>docs</li>
                        <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/html.png') }}"}'> dashboard</li>
                      </ul>
                    </li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/git-file.png') }}"}'> .gitignore</li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/corrupted-file.png') }}"}'> CHANGELOG.md</li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/html.png') }}"}'> gulpfile.js </li>
                    <li data-jstree='{"icon":"{{ url('assets/images/file-icons/extension/html.png') }}"}'> package.json </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/jstree/jstree.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/js-tree.js') !!}
@endpush