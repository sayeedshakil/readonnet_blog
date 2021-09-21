@extends('backend.layouts.admin')
@section('content')
@can('post_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('backend.posts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.post.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.post.title_singular') }} {{ trans('global.list') }} of all writers from Read On Net.
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        {{-- <th>
                            {{ trans('cruds.post.fields.sl') }}
                        </th> --}}
                        <th>
                            {{ trans('cruds.post.fields.post_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.post.fields.is_active') }}
                        </th>
                        <th>
                            {{ trans('cruds.post.fields.title') }}
                        </th>
                        {{-- <th>
                            {{ trans('cruds.post.fields.post') }}
                        </th> --}}
                        {{-- <th>
                            {{ trans('cruds.post.fields.cover_image') }}
                        </th>--}}
                        <th>
                            {{ trans('cruds.post.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.post.fields.author') }}
                        </th>
                        {{-- <th>
                            {{ trans('cruds.post.fields.tags') }}
                        </th> --}}
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    TODO
                    {{-- @if (auth()->user()->has('roles')) --}}
                    {{-- @if (auth()->user()->has('roles','==', 1)); --}}
                @if (Auth::user()->roles()->where('name'=== 1))
admin {{Auth::user()->roles->where('role_id','===',1)}}
                      {{-- @php
                    $i=1
                    @endphp --}}
                    @foreach($posts as $key => $post)

                    <tr data-entry-id="{{ $post }}">
                        <td>

                        </td>
                        {{-- <td>
                            {{ $i ?? '' }}
                        </td> --}}
                        <td>
                            {{ $post->unique_post_id ?? '' }}
                        </td>
                        <td>
                            @if ($post->is_active===0)
                                <span class="badge badge-warning">{{'Under Review'}}</span>
                            @elseif ($post->is_active===1)
                                <span class="badge badge-success">{{'Published'}}</span>
                            @endif
                        </td>
                        <td>
                            {{ $post->title ?? '' }}
                        </td>
                        {{-- <td>
                            {!! $post->post ?? '' !!}
                        </td> --}}
                        {{-- <td>
                            @if($post->image)
                                <img src="{{ asset('storage/backend/images/coverImage/' . $post->image) }}" style="max-height: 85px;border-radius:3px; " class="img-fluid" alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">
                            @else
                                <img src="{{ asset('no_image.jpg') }}" style="max-height: 85px;border-radius:3px;" class="img-fluid"
                                alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">
                            @endif
                        </td> --}}
                        <td>
                            <span class="badge badge-info">{{$post->category->name ?? ''}}</span>
                        </td>
                        <td>
                            {{$post->user->name ?? ''}}
                        </td>
                        {{-- <td>
                            @foreach($post->tags as $key)
                                <span class="badge badge-secondary">{{ $key->name }}</span>
                            @endforeach
                        </td> --}}


                        @can('post_access')
                        <td>
                            @can('post_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('backend.posts.show', $post) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @if ($post->user->id === Auth::user()->id && $post->is_active===0)
                            @can('post_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('backend.posts.edit', $post) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @endif

                            {{-- @if ($post->user->id === Auth::user()->id) --}}
                            @can('post_delete')
                            <form action="{{ route('backend.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan
                            {{-- @endif --}}

                            @can('post_review')
                            <a class="btn btn-xs btn-secondary" href="{{ route('backend.posts.show', $post) }}">
                                {{ trans('global.review') }}
                            </a>
                            @endcan

                        </td>
                        @endcan

                    </tr>
                    {{-- @php
                    $i++
                  @endphp --}}
                  @endforeach
                @else
                        {{-- @php
                    $i=1
                    @endphp --}}
                    @foreach($posts->where('user_id','==',auth()->user()->id) as $key => $post)

                    <tr data-entry-id="{{ $post }}">
                        <td>

                        </td>
                        {{-- <td>
                            {{ $i ?? '' }}
                        </td> --}}
                        <td>
                            {{ $post->unique_post_id ?? '' }}
                        </td>
                        <td>
                            @if ($post->is_active===0)
                                <span class="badge badge-warning">{{'Under Review'}}</span>
                            @elseif ($post->is_active===1)
                                <span class="badge badge-success">{{'Published'}}</span>
                            @endif
                        </td>
                        <td>
                            {{ $post->title ?? '' }}
                        </td>
                        {{-- <td>
                            {!! $post->post ?? '' !!}
                        </td> --}}
                        {{-- <td>
                            @if($post->image)
                                <img src="{{ asset('storage/backend/images/coverImage/' . $post->image) }}" style="max-height: 85px;border-radius:3px; " class="img-fluid" alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">
                            @else
                                <img src="{{ asset('no_image.jpg') }}" style="max-height: 85px;border-radius:3px;" class="img-fluid"
                                alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">
                            @endif
                        </td> --}}
                        <td>
                            <span class="badge badge-info">{{$post->category->name ?? ''}}</span>
                        </td>
                        <td>
                            {{$post->user->name ?? ''}}
                        </td>
                        {{-- <td>
                            @foreach($post->tags as $key)
                                <span class="badge badge-secondary">{{ $key->name }}</span>
                            @endforeach
                        </td> --}}


                        @can('post_access')
                        <td>
                            @can('post_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('backend.posts.show', $post) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @if ($post->user->id === Auth::user()->id && $post->is_active===0)
                            @can('post_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('backend.posts.edit', $post) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @endif

                            {{-- @if ($post->user->id === Auth::user()->id) --}}
                            @can('post_delete')
                            <form action="{{ route('backend.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan
                            {{-- @endif --}}

                            @can('post_review')
                            <a class="btn btn-xs btn-secondary" href="{{ route('backend.posts.show', $post) }}">
                                {{ trans('global.review') }}
                            </a>
                            @endcan

                        </td>
                        @endcan

                    </tr>
                    {{-- @php
                    $i++
                  @endphp --}}
                @endforeach
                    @endif

                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
// @can('post_delete')
//   let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
//   let deleteButton = {
//     text: deleteButtonTrans,
//     url: "{{ route('backend.post.mass_destroy') }}",
//     className: 'btn-danger',
//     action: function (e, dt, node, config) {
//       var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
//           return $(entry).data('entry-id')
//       });

//       if (ids.length === 0) {
//         alert('{{ trans('global.datatables.zero_selected') }}')

//         return
//       }

//       if (confirm('{{ trans('global.areYouSure') }}')) {
//         $.ajax({
//           headers: {'x-csrf-token': _token},
//           method: 'POST',
//           url: config.url,
//           data: { ids: ids, _method: 'DELETE' }})
//           .done(function () { location.reload() })
//       }
//     }
//   }
//   dtButtons.push(deleteButton)
// @endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
