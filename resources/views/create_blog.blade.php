@extends('template')

@section('content')
  <br>
  <center>
    <h2>Welcome to My Blog/Create Blog</h2>
  </center>
  <br>
  <div class="container" id="content">
    <form method="POST" action="{{ route('blog.store') }}">
      @csrf
      <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" class="form-control" name="title" id="title" required="required">
      </div>
      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" id="author" required="required">
      </div>
      <div class="form-group">
        <label for="content">Konten</label>
        <textarea class="form-control" name="content" id="content" rows="3"></textarea>
      </div>
      <input type="submit" class="btn btn-primary" value="Simpan">
      <a href="/" class="btn btn-secondary">Kembali</a>
    </form>
  </div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
var quill = new Quill('#issue', {
    theme: 'snow'
});
$(document).ready(function () {
    $("form").submit(function () {
        $("input[name=issue]").val($("#issue>div").html());
    });
});
</script>

@endsection
