<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <title>Document</title>
</head>

<body>
@include('includes.nav')
<div style="margin-bottom: 325px;" class="account-main">

    <form method="post" action="{{ route('addQuestion') }}" class="form-box" enctype="multipart/form-data">
        @csrf
        @error('image_question')
        <div class="error-message" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <div class="group-form">
            <label for="title" class="label-form">
                title :
            </label>
            <input type="text" class="input-form" id="title" placeholder="define your question..." name="title"
                   required>
        </div>
        @error('title')
        <div class="error-message" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <div class="group-form">
            <label for="content" class="label-form">
                content :
            </label>
            <textarea class="input-form" id="content" placeholder="describe your question..." name="content" required></textarea>
        </div>
        @error('content')
        <div class="error-message" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <div class="buttons">
            <button type="submit">add</button>
            <button class="bg--danger"><a class="reset-link white_color" href="{{route('dashboard')
        }}">Cancel</a></button>
        </div>
    </form>

</div>
@include('includes.footer')
<script src="{{asset("js/main.js")}}">
</script>
<script src="{{asset('js/loading_img.js')}}"></script>

</body>

</html>
