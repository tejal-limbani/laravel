@extends('layouts.default')
@section('content')
<section class="main-content">
  <div class="row justify-content-center text-center">
    <div class="col-6">
      <table class="table table-bordered">
        <tr>
          <th>Video title</th>
          <td>{{ $video->video_title }}</td>
        </tr>
        <tr>
          <th>Video url</th>
          <td><a href="{{ $video->video_url }}"/>{{ $video->video_url }}</a></td>
        </tr>
        <tr>
          <th>Description</th>
          <td>{{ $video->description }}</td>
        </tr>
      </table>
      <a href="{{ route('video.index') }}" class="btn btn-info">Back</a>
    </div>
  </div>
</section>
@endsection