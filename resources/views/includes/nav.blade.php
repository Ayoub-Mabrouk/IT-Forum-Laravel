<header class='header'>
    <nav class='navbar'>
        
        <a href="{{route('dashboard')}}">
            <img class="logo" src="{{asset('images/logo.png')}}" alt="logo">
        </a>
        <form class="input_search" method="GET" action="">
            <input type="text" class="input_search__input" placeholder="Search Questions">
            
        </form>        
        <ul class="navlinks">
            <li><a href="{{route('add')}}">Add Question</a></li>
            <li><a href="{{'/questions/'.Auth::id()}}">My Questions</a></li>
            @if(Auth::user()->permission)
            <li class="menu">
                <a href="/admin">All users</a>
            </li>
            @endif
            <li><a href="{{route('logout')}}">Log out</a></li>
        </ul>
    </nav>
</header>