@extends('template')

@section('content')

    <br>
    <center>
      <h2>Welcome to My Blog</h2>
    </center>
    <br>
    @foreach ($data as $articles)
    <form action="{{ route('blog.destroy', $loop->index) }}" method="POST">
      @method('DELETE')
      @csrf
      <div class="container">
        <div class="card">
          <div class="card-header">
            <div class="float-right">
              <a href="{{ route('blog.edit', $loop->index) }}" class="btn btn-warning">Edit</a>
              <input type="submit" class="btn btn-danger" value="Hapus">
            </div>
            <h4> {{ $articles->title }} </h4>
            <small> {{ $articles->datetime }} oleh {{ $articles->author }} </small>
          </div><div class="card-body" style="text-align: justify; text-indent: 1em;">
            <p> {{ substr($articles->content, 0, 50) }} </p>
          </div><div class="card-footer text-right">
            <a href="{{ route('blog.show', $loop->index) }}">Baca Selengkapnya</a>
          </div>
        </div>
    </div>
    </form>
    <br>
    @endforeach

@endsection
