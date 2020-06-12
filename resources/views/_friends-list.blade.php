<h1 class="text-xl font-bold mb-2">Friends</h1>
<ul>
    @foreach(auth()->user()->following as $follwer)
        <li>
            <a href="{{route('profile',$follwer->user_name)}}">
        <div class="flex items-center mb-3 text-sm">
            <img  class="avatar mx-3 rounded-full" src="{{$follwer->avatar}}" alt="" >
        {{$follwer->name}}
        </div>
        </a>
    </li>
    @endforeach
</ul>