
@foreach($users as $user)
  <h1>Your name is {{ $user->name }}. Your email address is {{ $user->email }}</h1>
@endforeach
