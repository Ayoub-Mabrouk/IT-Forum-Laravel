<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--    <link rel="stylesheet" href="{{asset('css/profile.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <title>Document</title>
</head>
<body>
    @include('includes.nav')
<div class="users-content">
    <h1 class="center">Users :</h1>
    <div class="users">
        <table class="styled-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>username</th>
                <th>email</th>
                <th>permission</th>
                <th>created_at</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                @if($user->id != Auth::id())
                    <tr>
                        <th>{{$user->id}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        <th>{{$user->permission ? 'admin':'user'}}</th>
                        <th>{{$user->created_at}}</th>
                        <th class="links-table">
                            <a href="/delete/{{$user->id}}" class="danger-text reset-link pointer">delete</a>
                        </th>
                    </tr>
                @endif
            @endforeach
            <!-- and so on... -->
            </tbody>
        </table>
    </div>
</div>
@include('includes.footer')
<script src="{{asset("js/main.js")}}">
</script>
<script src="{{asset('js/loading_img.js')}}"></script>
</body>

</html>
