@extends('backend.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @can('database_notification_access')
                        @forelse($notifications as $notification)
                            <div class="alert alert-success" role="alert">
                                [{{ $notification->created_at }}] User {{ $notification->data['name'] }} ({{ $notification->data['email'] }}) has just registered.
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
                        You are logged in!
                        @endforelse
                    @endcan
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

