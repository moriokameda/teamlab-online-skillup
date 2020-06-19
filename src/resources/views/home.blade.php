<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
  <ul>
    @foreach ($errors as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
@endif

<!-- フォーム -->
<form action="{{url('upload')}}" method="POST" enctype="multipart/form-data">
  <!-- アップロードした画像がなければ表示しない -->
  @isset($filename)
    <div>
      <img src="{{ asset('storage/' . $filename) }}" alt="">
    </div>
  @endisset

  <label for="photo">画像ファイル:</label>
  <input type="file" class="form-control" name="file">
  <br>
  <label for="name">ファイル名</label>
  <input type="text" name="name" id="">
  <hr>
  {{ csrf_field() }}
  <button class="btn btn-success"> Upload </button>
</form>
