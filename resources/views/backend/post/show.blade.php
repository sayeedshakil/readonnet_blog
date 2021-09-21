@extends('backend.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.post.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped table-responsive">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.id') }}
                        </th>
                        <td>
                            {{ $post->unique_post_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.title') }}
                        </th>
                        <td>
                            {{ $post->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.category') }}
                        </th>
                        <td>
                            <span class="label label-info label-many badge badge-info">{{ $post->category->name }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.writer') }}
                        </th>
                        <td>
                            {{ $post->user->name }}

                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.tags') }}
                        </th>
                        <td>
                            @foreach($post->tags()->pluck('name') as $tag)
                                <span class="label label-info label-many badge badge-secondary">{{ $tag }}</span>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.post') }}
                        </th>
                        <td>
                            {!!$post->post!!}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.cover_image') }}
                        </th>
                        <td>
                            @if($post->image)
                                <img src="{{ asset('storage/backend/images/coverImage/' . $post->image) }}" style="max-height: 200px;border-radius:3px; " class="img-fluid" alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">
                            @else
                                <img src="{{ asset('backend/images/default/blog_cover/joanna-kosinska-LAaSoL0LrYs-unsplash.jpg') }}" style="max-height: 200px;border-radius:3px;" class="img-fluid"
                                alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>

            @can('post_review')

            <div class="jumbotron">
                <h4 class="text-center font-weight-bold">Admin Review Section</h4>
                <p  class="text-center ">(Please fill all these fields carefully as they are important to rank your post in search engine results)</p>
                <form action="{{ route('backend.post.review',$post) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        <label for="slug">{{ trans('cruds.post.fields.slug') }}* <span class="help-block text-info">Meta Keywords are very importent for SEO. So please choose at least 2-3 keywords that matches your post</span></label>
                        <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text"
                        name="slug" id="slug" value="{{ old('slug', isset($post) ? $post->slug : '') }}">
                        @if($errors->has('slug'))
                            <em class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.post.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('meta_keywords') ? 'has-error' : '' }}">
                        <label for="meta_keywords">{{ trans('cruds.post.fields.meta_keywords') }}* <span class="help-block text-info">Meta Keywords are very importent for SEO. So please choose at least 2-3 keywords that matches your post</span></label>
                        <input class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : '' }}" type="text"
                        name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', isset($post) ? $post->meta_keywords : '') }}">
                        @if($errors->has('meta_keywords'))
                            <em class="invalid-feedback">
                                {{ $errors->first('meta_keywords') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.post.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                        <label for="meta_description">{{ trans('cruds.post.fields.meta_description') }}* <span class="help-block text-info">Meta Description is importent for SEO. Write at least 1 or 2 line short description with your main keywords within it.</span></label>
                        <input type="text" id="meta_description" name="meta_description" class="form-control" value="{{ old('meta_description', isset($post) ? $post->meta_description : '') }}">
                        @if($errors->has('meta_description'))
                            <em class="invalid-feedback">
                                {{ $errors->first('meta_description') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>


                    <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                        <label class="required {{ $errors->has('is_active') ? 'is-invalid' : '' }}" for="is_active">{{ trans('cruds.post.fields.is_active')}} (ON means published & OFF means Not Published)
                        </label>
                        <select name="is_active" id="is_active" class="form-control" required>

                                <option value="{{ 0 }}" @if (0 == $post->is_active) selected @endif>{{ 'OFF' }}</option>
                                <option value="{{ 1 }}" @if (1 == $post->is_active) selected @endif>{{ 'ON' }}</option>

                        </select>
                            @if($errors->has('is_active'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('is_active') }}
                                </em>
                            @endif
                        <p class="helper-block">
                            {{ trans('cruds.post.fields.category_helper') }}
                        </p>
                    </div>
                    <div>
                        <input class="btn btn-sm btn-success" type="submit" value="{{ trans('global.save') }}">
                    </div>
                </form>
            </div>
            @endcan

            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection
