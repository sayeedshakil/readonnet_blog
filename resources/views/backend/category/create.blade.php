@extends('backend.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    @if (session('successMessage'))
    <span class="text-success mb-3 br-section-label">{!!session('successMessage')!!}</span>
    @else
    {{ trans('global.create') }} {{ trans('cruds.category.title_singular') }}
    @endif
    </div>


    <div class="card-body">
        <form action="{{ route('backend.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
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
@endsection
