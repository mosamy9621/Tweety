<p class="text-xl font-bold mb-3">Welcome {{auth()->user()->name}} !</p>
<ul>
    <li class="font-bold text-lg mb-4 block"><a href="/tweets">
            Home
        </a></li>
    <li class="font-bold text-lg mb-4 block"><a href="/explore">
            Explore
        </a></li>
    <li class="font-bold text-lg mb-4 block"><a href="{{route('profile',auth()->user()->user_name)}}">
            Profile
        </a></li>
    <form action="/logout" method="POST">
        @csrf
        <button class="font-bold text-lg mb-4 block" type="submit" value="Logout">Logout</button>
    </form>



</ul>