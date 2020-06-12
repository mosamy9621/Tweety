<x-app >
    @foreach($users as $user)
        @if($user->id==auth()->user()->id)
            @continue
        @endif
       <a href="/profile/{{$user->user_name}}">
        <div class="flex items-center ">
            <img class="rounded-full mb-3" style="width:100px; height:100px;" src="{{$user->avatar}} ">
            <p class="text-xl mx-2 font-bold">{{'@'}}{{$user->user_name }}</p>
        </div>
       </a>
     @endforeach

        {{$users->links()}}

</x-app>