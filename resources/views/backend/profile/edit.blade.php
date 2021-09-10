@extends('backend.layouts.admin')
@section('content')
@can('profile_edit')

    <div class="container">
        <div class="main-body">
        <form action="{{ route("backend.profiles.update", [$profile->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">

                        <label for="image">{{ trans('cruds.user.fields.profile_image') }}</label>
                        <div class="form-group text-center" {{ $errors->has('image') ? 'has-error' : '' }} style="background-color: #f1f1f1;
                        color: rgba(255, 255, 255, 0.65);
                        border-color: rgba(255, 255, 255, 0.08);border-radius:6px; padding: 1.5rem;">

                        <div>
                            @if($profile->image)
                                <img src="{{asset('storage/backend/images/profileImage/' . $profile->image)}}" onclick="triggerClick()" style="max-height:180px;border-radius: 3px;" id="previewImage" alt="click here to add an image" title="click here to add your image">
                                <input type="file" name="image" id="profileImage" style="display: none;"
                                    onchange="preview(this)" class="@error('image') is-invalid @enderror" >
                                @error('image')<div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mt-2">
                                    <label class="font-weight-bold text-dark" for="">Click to change Profile Picture</label>
                                    <div class="text-muted" style="font-size: .80rem;">
                                    Supported file type jpg,jpeg,png <br>Maximum file size is 3MB
                                    </div>
                                </div>
                            @else
                                <img src="{{asset('backend/images/default/img11.jpg')}}" onclick="triggerClick()" class="rounded-circle" width="150" height="150" id="previewImage" alt="click here to add an image" title="click here to add your image">
                                <input type="file" name="image" id="profileImage" style="display: none;"
                                    onchange="preview(this)" class="@error('image') is-invalid @enderror" >
                                @error('image')<div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mt-2">
                                    <label class="font-weight-bold text-dark" for="">Click to Choose Profile Picture</label>
                                    <div class="text-muted" style="font-size: .80rem;">
                                    Supported file type jpg,jpeg,png  <br>Maximum file size is 3MB
                                    </div>
                                </div>
                            @endif
                        </div>
                        </div>
                        <div class="mt-3">
                          <h4>{{ $profile->name }}</h4>
                          <p class="text-secondary mb-1">{{$profile->about_title ?? ''}}</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card mt-3">
                    <ul class="list-group list-group-flush">

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                <span class="text-secondary">
                                    <input type="text" id="facebook_link" name="facebook_link" class="form-control" value="{{ old('facebook_link', isset($profile) ? $profile->facebook_link : '') }}" >
                                </span>
                            </li>


                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                <span class="text-secondary">
                                    <input type="text" id="instagram_link" name="instagram_link" class="form-control" value="{{ old('instagram_link', isset($profile) ? $profile->instagram_link : '') }}" ></span>
                            </li>
                        </a>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                <span class="text-secondary">
                                    <input type="text" id="twitter_link" name="twitter_link" class="form-control" value="{{ old('twitter_link', isset($profile) ? $profile->twitter_link : '') }}" ></span>
                            </li>
                        </a>

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                            <span class="text-secondary">
                                <input type="text" id="website_link" name="website_link" class="form-control" value="{{ old('website_link', isset($profile) ? $profile->website_link : '') }}" ></span>
                          </li>


                      {{-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg ></svg><img class="feather feather-github mr-2 icon-inline" src="{{asset('backend/icons/sprites/youtube.svg')}}" alt=""> YouTube</h6>
                        <span class="text-secondary">bootdey</span>
                      </li> --}}


                    </ul>
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">

                      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($profile) ? $profile->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                      </div>

                      <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($profile) ? $profile->email : '') }}" required>
                        @if($errors->has('email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                      </div>


                      <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone">{{ trans('cruds.user.fields.mobile') }}</label>
                        <input type="phone" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($profile) ? $profile->phone : '') }}" >
                        @if($errors->has('phone'))
                            <em class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                      </div>


                      <div class="form-group {{ $errors->has('about_title') ? 'has-error' : '' }}">
                        <label for="about_title">{{ trans('cruds.user.fields.about_title') }}</label>
                        <input type="about_title" id="about_title" name="about_title" class="form-control" placeholder="Example: I am a Writer.." value="{{ old('about_title', isset($profile) ? $profile->about_title : '') }}" >
                        @if($errors->has('about_title'))
                            <em class="invalid-feedback">
                                {{ $errors->first('about_title') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                      </div>

                      <div class="form-group {{ $errors->has('about_description') ? 'has-error' : '' }}">
                        <label for="about_description">{{ trans('cruds.user.fields.about_description') }}</label>
                        <textarea type="about_description" id="about_description" name="about_description" class="form-control" >{{ old('about_description', $profile->about_description) }} </textarea>
                        @if($errors->has('about_description'))
                            <em class="invalid-feedback">
                                {{ $errors->first('about_description') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                      </div>

                     <div class="form-group {{ $errors->has('expertise') ? 'has-error' : '' }}">
                        <label for="expertise">{{ trans('cruds.user.fields.expertise') }}</label>
                        <input type="expertise" id="expertise" name="expertise" class="form-control" placeholder="Example: Writing,Designing " value="{{ old('expertise', isset($profile) ? $profile->expertise : '') }}" >
                        @if($errors->has('expertise'))
                            <em class="invalid-feedback">
                                {{ $errors->first('expertise') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                      </div>

                      <div class="form-group {{ $errors->has('interested_in') ? 'has-error' : '' }}">
                        <label for="interested_in">{{ trans('cruds.user.fields.interested_in') }}</label>
                        <input type="interested_in" id="interested_in" name="interested_in" placeholder="Example: Bloging, Playing" class="form-control" value="{{ old('interested_in', isset($profile) ? $profile->interested_in : '') }}" >
                        @if($errors->has('interested_in'))
                            <em class="invalid-feedback">
                                {{ $errors->first('interested_in') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                      </div>
                    </div>
                  </div>



                </div>
            </div>

        </form>
        </div>
    </div>

@endcan

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

