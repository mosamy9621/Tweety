<div class="flex items-center ">
    <form action="/tweets/{{$tweet->id}}" method="POST">
        @csrf

        <button type="submit" class="mx-2 text-lg">
            <i class=" {{$tweet->isLikedBy(auth()->user())? 'fa fa-thumbs-up text-blue-600': 'fa fa-thumbs-o-up text-gray-600'}}  " aria-hidden="true"></i>
            <span class=""> {{$tweet->likes_no ?: 0}}</span>
        </button>
    </form >
    <form action="/tweets/{{$tweet->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-lg">
            <i class="{{$tweet->isDislikedBy(auth()->user())? 'fa fa-thumbs-down text-blue-600': 'fa fa-thumbs-o-down text-gray-600'}}" aria-hidden="true"></i>

            <span>{{ $tweet->dislikes_no ?: 0}} </span>
        </button>
    </form>
</div>