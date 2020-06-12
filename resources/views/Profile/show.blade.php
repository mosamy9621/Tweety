<x-app>
    <header class=" relative">
        <div class="mb-3 rounded-b-lg" style="width: 780px; height: 223px;  overflow:hidden;">
            <img  src="../images/green.jpg">
        </div>

        <div class="flex justify-between">
        <div>
            <h2 class="text-xl font-bold">{{$user->name}}</h2>
            <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
        </div>
        <div class="flex">
            @can('edit',$user)

            <a class=" bg-white border border-gray-400 rounded-full  text-black p-2 px-3 m-1" href="/profile/{{$user->user_name}}/edit">Edit Profile</a>
            @endcan
                @if(auth()->user()->id!=$user->id)

            <form action="/profile/{{$user->user_name}}/follow" method="POST"> @csrf
                <button class="bg-blue-500 rounded-full shadow text-white p-2 px-3 m-1 " name="Follow" value=>
                  {{auth()->user()->isFollowing($user)? 'Unfollow me' : 'Follow me'}}
                </button>
            </form>
            @endif
        </div>
    </div>
        <img class="absolute mt-2 mx-1 rounded-full" src="{{$user->avatar}}" alt="" style="height:150px; width:150px; left:calc(50% - 75px); top:47%">
    </header>

    <div class="border border-gray-300 rounded-lg mt-6">
            @include('_tweet',['tweets'=>$user->tweets()->withlikes()->latest()->get()])
        </div>

</x-app>
