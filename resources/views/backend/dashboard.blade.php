@extends('backend.layouts.admin')

@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Welcome {{auth()->user()->name}}
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>

                    </div>

                    @can('database_notification_access')
                        @forelse($notifications as $notification)
                            <div class="alert alert-success" role="alert">
                                [{{ $notification->created_at }}] Writer {{ $notification->data['name'] }} ({{ $notification->data['email'] }}) has just registered.
                                <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                                    Mark as read
                                </a>
                            </div>

                            @if($loop->last)
                                <a href="#" id="mark-all">
                                    Mark all as read
                                </a>
                            @endif
                        @empty
                        You have no new notifications.
                        @endforelse
                    @endcan
                            <hr>
                    <div class="row pr-2">

                        <div class="col-6 col-lg-3 pr-0">
                          <div class="card">
                            <a href="{{route('backend.posts.index')}}">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-primary p-3 mr-2">
                                      <i class="c-icon c-icon-xl fas fa-desktop"></i>
                                    </div>
                                    <div>
                                      <div class="text-value text-primary">{{count($posts->where('is_active'))}}/{{count($posts)}}</div>
                                      <div class="text-muted text-uppercase font-weight-bold small">Your Published Posts</div>
                                    </div>
                                </div>
                            </a>
                            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('backend.posts.create')}}"><span class="small font-weight-bold">Add Post</span>
                                <i class="c-icon fas fa-angle-right"></i></a></div>
                          </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-6 col-lg-3 pr-0">
                          <div class="card">
                            <a href="{{route('backend.categories.index')}}">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-info p-3 mr-2">
                                      <i class="c-icon c-icon-xl fas fa-bezier-curve"></i>
                                    </div>
                                    <div>
                                      <div class="text-value text-info">{{$categories}}</div>
                                      <div class="text-muted text-uppercase font-weight-bold small">Total Categories</div>
                                    </div>
                                </div>
                            </a>
                            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('backend.categories.index')}}"><span class="small font-weight-bold">View All</span>
                                <i class="c-icon fas fa-angle-right"></i></a></div>
                          </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-6 col-lg-3 pr-0">
                          <div class="card">
                            <a href="{{route('backend.profiles.show',auth()->user()->id)}}">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-warning p-3 mr-2">
                                      <i class="c-icon c-icon-xl far fa-address-card"></i>
                                    </div>
                                    <div>
                                      <div class="text-valu text-warning"></div>
                                      <div class="text-muted text-uppercase font-weight-bold small">your profile</div>
                                    </div>
                                </div>
                            </a>
                            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('backend.profiles.edit',auth()->user()->id)}}"><span class="small font-weight-bold">Edit Your Profile</span>
                                <i class="c-icon fas fa-angle-right"></i></a></div>
                          </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-6 col-lg-3 pr-0">
                          <div class="card">
                            <a href="{{route('backend.auth.change_password')}}">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-danger p-3 mr-2">
                                      <i class="c-icon c-icon-xl fas fa-unlock-alt"></i>
                                    </div>
                                    <div>
                                      <div class="text-value text-danger"></div>
                                      <div class="text-muted text-uppercase font-weight-bold small">Password</div>
                                    </div>
                                </div>
                            </a>
                            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('backend.auth.change_password')}}"><span class="small font-weight-bold">Change Password</span>
                                <i class="c-icon fas fa-angle-right"></i></a></div>
                          </div>
                        </div>
                        <!-- /.col-->
                      </div>
                      <!-- /.row-->
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@parent
@can('database_notification_access')

    <script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('backend.markNotification') }}", {
            method: 'POST',
            data: {
                _token,
                id
            }
        });
    }

    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));

            request.done(() => {
                $(this).parents('div.alert').remove();
            });
        });

        $('#mark-all').click(function() {
            let request = sendMarkRequest();

            request.done(() => {
                $('div.alert').remove();
            })
        });
    });
    </script>

@endcan
@endsection

