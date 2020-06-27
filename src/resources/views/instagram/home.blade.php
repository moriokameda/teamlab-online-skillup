@extends('../layouts/header')

@section('content')
<main>
  @if(count($errors) > 0)
    <div class="alert alert-danger">
      @foreach($errors as $error)
        <p>{{$error}}</p>
      @endforeach
    </div>
  @endif
  <h1>loggined</h1>
</main>
@endsection
