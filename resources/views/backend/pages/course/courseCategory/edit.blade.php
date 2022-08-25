@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/choices/public/assets/styles/choices.min.css') !!}
@endpush

@section('content')
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Exam</a></li>
                                <li class="breadcrumb-item"><a
                                    href="{{ route('admin.course.index') }}">Exam Category List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Exam Category Edit</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    <form class="cmxform" id="courseCategoryForm" method="post" action="{{ route('admin.examCategory.update', $examCategory->id) }}" enctype="multipart/form-data" accept-charset="utf-8" name="edit">
                    @csrf
                    @method('PUT')   
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="form-group">

                                {!! Form::label('name','Exam Category Name') !!} <span class="requiredStar" style="color: red"> * </span>

                                <input type="text" name="name" id="name" class="form-control" 
                                value="{{ $examCategory->name }}" required>
                            </div>

                            <div class="form-group">
                                {!! Form::label('name','Select Group') !!} 
                                
                                <div class="form-group">
                                    <select id="choices-multiple-remove-button" placeholder="Select Groups" name="group_id[]" multiple style="color: black">
                                        @foreach($groups as $key=> $value)
                                            <option value="{{$key}}"
                                                @if ($examCategory !== null)
                                                    @foreach ($examCategory->groups as $group)
                                                        @if($group->id==$key) selected @endif
                                                    @endforeach
                                                @endif>{{$value}}
                                            </option>
                                        @endforeach
                                    </select> 
                                </div>
                                @error('group_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Description') !!}
                                {!!  Form::textarea('description',old('description'),['class'=>'form-control','placeholder'=>'Description...']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Image') !!}<br>

                                  <img id='img' src="{{ asset('/public/uploads/course/') }}/{{$examCategory->image }}" style="width:200px; height:145px; margin-left:2px; margin-bottom: 10px">
                                <br>
                                <label class="control-label">Upload Image</label>
                                <input type="file" class="form-control dropify" name="image" id="image" data-max-file-size="5M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="">
                                <br>

                               {{--  <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Image Dimension must be 250x250 and size has to be less than 2 MB</p> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit('Update',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.examCategory.index') }}">Cancel</a>
                            </div>
                        </div>
                    </div>

                   </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/js/img-preview.js') !!}
    {!! Html::script('public/assets/plugins/icheck/icheck.min.js') !!}
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/choices/public/assets/scripts/choices.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/validation/courseForm-validation.js') !!}
    {!! Html::script('public/assets/plugins/Bootstrap-4-Multi-Select/dist/js/BsMultiSelect.js') !!}

    <script>
         $(document).ready(function(){
            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:10,
            searchResultLimit:6,
            renderChoiceLimit:6
            });

            });

            $("#courseCategoryForm").submit(function(e) {
                var contents = $('#choices-multiple-remove-button').val();

                if(contents.length === 0){

                }
            });
    </script>
@endpush
