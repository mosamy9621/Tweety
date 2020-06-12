    @foreach($tweets as $tweet)
        <div class="flex relative">
            <div class="flex-shrink-0">
               <a href="{{route('profile',$tweet->owner->user_name)}}">

                       <img class=" mt-4 mx-1 rounded-full avatar" src="{{$tweet->owner->avatar}}" alt="">

               </a>
            </div>
            <div class="my-2 mx-2 ">
                <a href="{{route('profile',$tweet->owner->user_name)}}">  <h1 class="font-bold mt-2 ">{{$tweet->owner->name}}</h1>
                </a>
                <p class="text-xs"> Tweeted {{$tweet->created_at->diffForHumans()}}</p>
                <p class="text-lg font-weight-bold">{{$tweet->body}}</p>

            </div>

        </div>
        @include('_like_dislike',['tweet'=>$tweet])
        <hr>
    @endforeach
