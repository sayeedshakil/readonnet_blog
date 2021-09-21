@extends('backend.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    @if (session('successMessage'))
    <span class="text-success mb-3 br-section-label">{!!session('successMessage')!!}</span>
    @else
    {{ trans('global.create') }} {{ trans('cruds.post.title_singular') }}
    @endif
    </div>


    <div class="card-body">
        <form action="{{ route('backend.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.post.fields.title') }}*</label>
                <input type="text" name="title" id="title"  class="form-control" value="{{ old('title', isset($user) ? $user->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="slug">{{ trans('cruds.post.fields.slug') }}*</label>
                <input type="text"  name="slug" id="slug" class="form-control" value="{{ old('slug', isset($user) ? $user->slug : '') }}" >
                @if($errors->has('slug'))
                    <em class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                <label class="required {{ $errors->has('category') ? 'is-invalid' : '' }}" for="category">{{ trans('cruds.post.fields.category_select') }}*
                   </label>
                <select name="category" id="category" class="form-control" required>
                    <option value="0">--- SELECT CATEGORY ---</option>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" @if ($category == old('category')) selected @endif>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.post.fields.category_helper') }}
                </p>
            </div>

            @can('post_for_other_create')
            <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                <label class="required {{ $errors->has('user') ? 'is-invalid' : '' }}" for="user">{{ trans('cruds.post.fields.select_writer') }}*
                   </label>
                <select name="user" id="user" class="form-control" required>

                    @foreach($users as $id => $writer)
                        <option value="{{ $id}}" @if ($writer == old('user')) selected @endif>{{ $writer }}</option>
                    @endforeach

                </select>
                @if($errors->has('user'))
                    <em class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.post.fields.category_helper') }}
                </p>
            </div>
            @endcan

            <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                <label for="tags">{{ trans('cruds.post.fields.tags') }}* <span class="help-block text-info">Tags must be Separated by comma(tag,tag)</span></label>
                <input type="text" id="tags" name="tags" class="form-control" value="{{ old('tags', isset($user) ? $user->tags : '') }}">
                @if($errors->has('tags'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>

            <label for="image">{{ trans('cruds.post.fields.cover_image') }}</label>
            <div class="form-group text-center" {{ $errors->has('image') ? 'has-error' : '' }} style="background-color: #f1f1f1;
                color: rgba(255, 255, 255, 0.65);
                border-color: rgba(255, 255, 255, 0.08);border-radius:6px; padding: 1.5rem;">

                <div>
                    <img src="{{asset('backend/images/default/img12.jpg')}}" onclick="triggerClick()" style="max-height: 140px;border-radius: 3px;" id="previewImage" alt="click here to add an image" title="click here to add your image">
                    <input type="file" name="image" id="profileImage" style="display: none;"
                        onchange="preview(this)" class="@error('image') is-invalid @enderror" >
                    @error('image')<div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-2">
                    <label class="font-weight-bold text-dark" for="">Click to Choose Cover Image</label>
                    <div class="text-muted" style="font-size: .80rem;">
                        Supported file type jpg,jpeg,png <br>Maximum file size is 3MB
                    </div>
                </div>
            </div>

            <div class="form-group {{ $errors->has('post') ? 'has-error' : '' }}">
                <label for="post">{{ trans('cruds.post.fields.post') }}*</label>
                <textarea id="post_editor" class="form-control {{ $errors->has('post') ? 'is-invalid' : '' }}" name="post"
                     required>{{ old('post') }}</textarea>
                @if($errors->has('post'))
                    <em class="invalid-feedback">
                        {{ $errors->first('post') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>

{{-- Preview image before upload --}}
<script>
    function triggerClick(){
        document.querySelector('#profileImage').click();
    }
    function preview(e){
        if(e.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                document.querySelector('#previewImage').setAttribute('src',e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>
@endsection
@section('scripts')
{{-- cke editor4 --}}
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'post_editor',{
        filebrowserUploadUrl:"{{route('backend.posts.editor_upload', ['_token'=>csrf_token()])}}",
        filebrowserUploadMethod:"form"
    } );
</script>
<script>
    $('#title').change(function(e){
        $.get('{{route('backend.post.checkSlug')}}',
        {'title':$(this).val()},
            function(data){
                $('#slug').val(data.slug);
            }
        );
    });
</script>
@endsection
