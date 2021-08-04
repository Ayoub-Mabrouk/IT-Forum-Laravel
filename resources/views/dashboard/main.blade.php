<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <title>Document</title>
</head>

<body>
    @include('includes.nav')
    <div class="main">
        {{--    {{dd($questions)}}--}}
        @foreach($questions as $question)
        <div class="post">
            <div class="profile">
                <div class="username">
                    {{$question->name}}
                </div>
                <div class="title_user">{{$question->permission?'Admin':'User'}}</div>
            </div>
            <div class="question-box">
                <h2 class="question_title">
                    <a href="{{'question/'.$question->id_question}}" class="reset-link pointer">
                        {{$question->title}}
                    </a>
                </h2>
                <p class="question_content">
                    {{$question->content}}
                </p>
            </div>
            <div class="question-actions">
                <div class="answer pointer">
                    <img src="images/comment.svg" style="width: 20px;height:20px;" alt="">
                    <a class="reset-link" href="{{'question/'.$question->id_question}}">Comment</a>
                </div>
                @if (Auth::user()->permission)
                <div class="answer pointer">
                    <img src="images/delete.svg" style="width: 20px;height:20px;" alt="">
                    <a style="color:black;" class="reset-link" href="/question_delete/{{ $question->id_question }}">
                        Delete
                    </a>
                </div>
                @endif
            </div>
        </div>
        @endforeach

    </div>
    @include('includes.footer')
    <script src="{{asset("js/main.js")}}">
    </script>
</body>

</html>