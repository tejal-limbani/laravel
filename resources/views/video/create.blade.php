@extends('layouts.default')
@section('content')
<section class="main-content dm-create-form-section">
  <div class="row justify-content-center">
    <div class="col-6">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
      <form action="{{ route('video.store') }}" method="post" role="form">
      {{ csrf_field() }}
      <table class="table table-bordered">
        <tr>
          <th colspan="2" class="text-center">Insert video information</th>
        </tr>
        <tr>
          <th>Video title</th>
          <td><input type="text" name="video_title" /></td>
        </tr>
        <tr>
          <th>Video url</th>
          <td><input type="url" name="video_url" /></td>
        </tr>
        <tr>
          <th>description</th>
          <td><textarea rows="5" cols="20" name="description"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="insert" value="insert" class="btn btn-primary"/>
            <a href="{{ route('video.index') }}" class="btn btn-info" >Back</a>
          </td>
        </tr>
      </table>
      </form>
    </div>
  </div>
</section>
@endsection