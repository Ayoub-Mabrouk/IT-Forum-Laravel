<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/question.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <title>Document</title>
</head>

<body>
    @include('includes.nav')
<div class="post">
    <div class="profile">
        
        <div class="username">
            <a class="username username-link" href="{{'/user/'.$userPublisher->id}}">
                {{$userPublisher->name}}
            </a>
        </div>
        {{--                todo : will add title for every user--}}
        <div class="title_user">{{$userPublisher->permission?'Admin':'User'}}</div>
    </div>
    <div class="question-box">
        <h2 class="question_title">
            {{$question->title}}
        </h2>
        <p class="question_content">
            {{$question->content}}
        </p>
       
        
    </div>
    <div class="question-comments">
        <form action="/add_comments/{{$question->id}}" class="add-comment" method="POST">
            @csrf
            @method('POST')
            <input type="text" placeholder="add your answer" name="answer" required>
            <button type="submit">add</button>
        </form>
        @if(count($comments))
            @foreach($comments as $comment)
                <div class="comment">
                    <a class="username username-link color-gray" href="{{'/user/'.$comment->id}}"
                       class="comment-profile">{{$comment->name}}</a>
                    <div class="comment-content">{{$comment->content}}</div>
                </div>
            @endforeach
        @else
            <div class="color-gray">No Comments!</div>
        @endif
    </div>
</div>
@include('includes.footer')
<script src="{{asset("js/main.js")}}">
</script>
</body>

</html>
