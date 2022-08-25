@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/codemirror/lib/codemirror.css') !!}
  {!! Html::style('/assets/plugins/codemirror/theme/ambiance.css') !!}
@endpush

@section('content')

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ace Editor</h4>
        <div class="row">
          <div class="col-md-6 grid-margin">
            <h5 class="card-subtitle">HTML Mode</h5>
            <textarea id="ace_html" class="ace-editor w-100">
<!-- Default panel -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h5 class="panel-title">
      Panel Title
      <span class="text-semibold">Default</span>
      <small>Full featured toolbar</small>
    </h5>

    <ul class="panel-heading-icons">
      <li>
        <a href="#" data-panel="collapse">
          <i class="icon-arrow-down2"></i>
        </a>
      </li>
      <li>
        <a href="#" data-panel="reload">
          <i class="icon-reload"></i>
        </a>
      </li>
      <li>
        <a href="#" data-panel="move">
          <i class="icon-move"></i>
        </a>
      </li>
      <li>
        <a href="#" data-panel="close">
          <i class="icon-close"></i>
        </a>
      </li>
    </ul>
  </div>

  <div class="panel-body">
    Panel body
  </div>
</div>
<!-- /default panel -->
</textarea>
          </div>
          <div class="col-md-6 grid-margin">
            <h5 class="card-subtitle">Javascript Mode</h5>
            <textarea id="ace_javaScript" class="ace-editor w-100">
/** * In fact, you're looking at ACE right now. Go ahead and play with it! * * We are currently showing off the JavaScript
mode. ACE has support for 45 * language modes and 24 color themes! */ 

function add(x, y) { 
  var resultString = "Hello, ACE! The result of your math is: ";
  var result = x + y; return resultString + result; 
}

var addResult = add(3, 2); console.log(addResult);
</textarea>
          </div>
          <div class="col-md-6 grid-margin">
            <h5 class="card-subtitle">CSS Mode</h5>
            <textarea id="ace_css" class="ace-editor w-100">
.nav ul { 
  margin: 0; padding: 0; list-style: none; 
} 
.nav li { 
  display: inline-block; 
} 
.nav a { 
  display: block; padding:
  6px 12px; text-decoration: none; 
}
</textarea>
          </div>
          <div class="col-md-6 grid-margin">
            <h5 class="card-subtitle">SCSS Mode</h5>
            <textarea id="ace_scss" class="ace-editor w-100">
.nav { 
  ul { 
    margin: 0; padding: 0; list-style: none; 
  } 
  li { 
    display: inline-block; 
  } a { 
    display: block; padding: 6px 12px;
    text-decoration: none; 
  } 
}
</textarea>
          </div>
          <div class="col-md-6 grid-margin">
            <h5 class="card-subtitle">Json Mode</h5>
            <textarea id="ace_json" class="ace-editor w-100">
{ "firstName": "John", "lastName": "Smith", "isAlive": true, "age": 27, "address": { "streetAddress": "21 2nd Street", "city":
"New York", "state": "NY", "postalCode": "10021-3100" }, "phoneNumbers": [ { "type": "home", "number":
"212 555-1234" }, { "type": "office", "number": "646 555-4567" }, { "type": "mobile", "number": "123
456-7890" } ], "children": [], "spouse": null }
</textarea>
          </div>
          <div class="col-md-6 grid-margin">
            <h5 class="card-subtitle">Coffee Mode</h5>
            <textarea id="ace_coffee" class="ace-editor w-100">
#!/usr/bin/env coffee try throw URIError decodeURI(0xC0ffee * 123456.7e-8 / .9) catch e console.log 'qstring' + "qqstring"
+ ''' qdoc ''' + """ qqdoc """ do -> ### herecommend ### re = /regex/imgy.test /// heregex # comment
///imgy this isnt: `just JavaScript` undefined sentence = "#{ 22 / 7 } is a decent approximation
of π"
</textarea>
          </div>
          <div class="col-md-6">
            <h5 class="card-subtitle">Ruby Mode</h5>
            <textarea id="ace_ruby" class="ace-editor w-100">
#!/usr/bin/ruby # Program to find the factorial of a number def fact(n) if n == 0 1 else n * fact(n - 1) end end puts fact(ARGV[0].to_i)
class Range def to_json( * a) { 'json_class' => self.class.name, # = 'Range' 'data' => [first, last,
exclude_end ? ] }.to_json( * a) end end {: id => 34, : key => "value" } herDocs = [
</textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Code mirror</h4>
        <div class="row">
          <div class="col-md-6 grid-margin">
            <h5 class="card-subtitle">Code Editable</h5>
            <textarea rows="4" cols="50" name="code-editable" id="code-editable">
<!-- Create a simple CodeMirror instance -->
<link rel="stylesheet" href="lib/codemirror.css">
<script src="lib/codemirror.js"></script>
<script>
  var editor = CodeMirror.fromTextArea(myTextarea, {
    lineNumbers: true
  });
</script>
</textarea>
          </div>
          <div class="col-md-6 grid-margin">
            <h5 class="card-subtitle">Shell Mode</h5>
            <textarea class="shell-mode" rows="4" cols="50">

  #!/bin/bash

  # clone the repository
  git clone http://github.com/garden/tree

  # generate HTTPS credentials
  cd tree
</textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/ace-builds/ace.js') !!}
  {!! Html::script('/assets/plugins/ace-builds/mode-javascript.js') !!}
  {!! Html::script('/assets/plugins/ace-builds/theme-chaos.js') !!}
  {!! Html::script('/assets/plugins/codemirror/lib/codemirror.js') !!}
  {!! Html::script('/assets/plugins/codemirror/mode/javascript/javascript.js') !!}
  {!! Html::script('/assets/plugins/codemirror/mode/shell/shell.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/codeEditor.js') !!}
@endpush