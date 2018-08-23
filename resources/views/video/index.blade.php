@extends('layouts.default')
@section('content')
  <section class="main-content dm-form-section">
    <div class="row justify-content-center text-center">
      <div class="col">
        <div class="title-wrapper">
          <h2>List Videos</h2>
          <div class="button-wrapper text-right">
            <a href="{{ route('video.create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
        </div>
        @if(Session::has('success'))
          <div class="alert alert-info">
            {{Session::get('success')}}
          </div>
        @endif
        <div class="form-wrapper">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th><input type="checkbox" id="checkall"></th>
                <th>Video title</th>
                <th>Video url</th>
                <th>Video description</th>
                <th>Status</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @if($videos->count())
              @foreach($videos as $video)
              <tr>
                <td><input type="checkbox" class="checkthis"></td>
                <td>{{ $video->video_title }}</td>
                <td>{{ $video->video_url }}</td>
                <td>{{ $video->description }}</td>
                <td>{{ ($video->status) ? 'Enable' : 'Disable' }}</td>
                <td><a href="{{ action('VideoController@show', $video->id) }}"><i class="far fa-eye"></i></a></td>
                <td><a href="{{ action('VideoController@edit', $video->id) }}"><i class="far fa-edit"></i></a></td>
                <td>
                  <form action="{{ action('VideoController@destroy', $video->id) }}" method="post">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button type="submit"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
              @else
                <tr>
                  <th colspan="7" class="text-center">No record found</th>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>  
@endsection