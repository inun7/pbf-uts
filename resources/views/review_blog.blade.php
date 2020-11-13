@extends('template')

@section('content')

    <div class="container">
      <br>
      <center>
        <h2>Welcome to My Blog/Review</h2>
      </center>
      <br>
      <div class="card">
        <div class="card-header">
          <div class="float-right">
            <a href="{{ route('blog.index') }}" class="btn btn-secondary">Kembali</a>
          </div>
          <h5> {{ $articles->title }} </h5>
          <small> {{ $articles->datetime }} oleh {{ $articles->author }}</small>
        </div><div class="card-body" style="text-align: justify; text-indent: 1em;">
          <p>{{ $articles->content }}</p>
      </div>
    </div>


@endsection
