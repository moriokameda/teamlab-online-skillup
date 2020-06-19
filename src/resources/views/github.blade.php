<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>github</title>
</head>
<body>
  <form action="/user">
    {{csrf_field()}}
    <div>お名前 : <input type="text" name="name" value="{{$user->name}}"></div>
    <div>コメント : <input type="text" name="comment" value="{{$user->comment}}"></div>

    <input type="submit" value="Confirm">
  </form>

  <div>ようこそ{{$nickname}}さん</div>
  <div>あなたのトークンは{{$token}}です</div>
  <div>リポジトリ一覧</div>
  <ul>
    @foreach ($repos as $repo)
      <li>{{ $repo }}</li>
    @endforeach
  </ul>

  <form action="/github/issue" method="POST">
    {{ csrf_field() }}

    <div>repo : <input type="text" name="repo" id=""></div>
    <div>title : <input type="text" name="title" id=""></div>
    <div>body : <input type="text" name="body" id=""></div>
    <input type="submit" value="Confirm">
  </form>
</body>
</html>
