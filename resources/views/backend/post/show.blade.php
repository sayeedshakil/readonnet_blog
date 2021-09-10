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

                    {{-- <tr>
                        <th>
                            {{ trans('cruds.post.fields.is_active') }}
                        </th>
                        <td>
                            <a href="{{ route('backend.post.review',[$post->id]) }}">
                                @if (!$post->is_active)
                                    <img src="{{asset('backend/images/default/status_indicator/not_applied.png')}}" border="0" width="18" height="18" title="Active" />
                                @else
                                    <img src="{{asset('backend/images/default/status_indicator/applied.png')}}" border="0" width="18" height="18" title="Active" />
                                @endif
                              </a>
                        </td>
                    </tr> --}}

                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.is_active')  }}
                        </th>
                        <td>
                            @can('post_review')
                            <form action="{{ route('backend.post.review',$post) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                            <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                                <label class="required {{ $errors->has('is_active') ? 'is-invalid' : '' }}" for="is_active">Note: (ON means published && OFF means Not Published)
                                   </label>
                                <select name="is_active" id="is_active" class="form-control" required>

                                        <option value="{{ 0 }}" @if (0 == $post->is_active)) selected @endif>{{ 'OFF' }}</option>
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
                            @endcan
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.cover_image') }}
                        </th>
                        <td>
                            @if($post->image)
                                <img src="{{ asset('storage/backend/images/coverImage/' . $post->image) }}" style="max-height: 85px;border-radius:3px; " class="img-fluid" alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">
                            @else
                                <img src="{{ asset('backend/images/default/blog_cover/joanna-kosinska-LAaSoL0LrYs-unsplash.jpg') }}" style="max-height: 85px;border-radius:3px;" class="img-fluid"
                                alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection
