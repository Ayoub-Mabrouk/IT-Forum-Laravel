<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <title>Document</title>
</head>

<body style="grid-template-rows: auto auto 1fr auto">
@include('includes.nav')
<h1 style="text-align: center">My questions :</h1>
<div class="main">
    @foreach($questions as $question)
        <a class="reset-link post pointer" href="{{'/question/'.$question->id}}">
            <div class="question-box">
                <h2 class="question_title">
                    {{$question->title}}
                </h2>
                <p class="question_content">
                    {{$question->content}}
                </p>
               
            </div>

        </a>
    @endforeach

</div>
@include('includes.footer')
<script src="{{asset("js/main.js")}}">
</script>
</body>

</html>
