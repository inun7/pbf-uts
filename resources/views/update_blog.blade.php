@extends('template')

@section('content')

    <div class="container">
      <br>
      <center>
        <h2>Welcome to My Blog/Update</h2>
      </center>
      <br>
      <form action="{{ route('blog.update', $id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="title"> Title </label>
          <input type="text" class="form-control" name="title" id="title" value="{{ $articles->title }}">
        </div>
        <div class="form-group">
          <label for="author"> Author </label>
          <input type="text" class="form-control" name="author" id="author" value="{{ $articles->author }}">
        </div>
        <div class="form-group">
          <label for="content"> Content </label>
          <textarea class="form-control" name="content" id="content" rows="3">{{ $articles->content }}</textarea>
        </div>
        <div class="float-left">
          <input type="submit" class="btn btn-primary" value="Update">
          <a href="/" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>

@endsection
