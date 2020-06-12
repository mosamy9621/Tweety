<div class="border border-blue-400 rounded-lg p-1">
    <form action="/tweet" method="post">
        @csrf
            <textarea placeholder="What's up doc?" rows="3" class="outline-none  resize-none  w-full" name="body"
            ></textarea>
        <hr>
        <footer class="flex justify-between">
            <img class="my-1 rounded-full avatar"  src="{{auth()->user()->avatar}}" alt="">
            <button type="submit" class="bg-blue-500 hover:bg-blue-800  rounded-lg shadow text-white p-2 mt-1 "> Tweet-a-roo!</button>
        </footer>
    </form>
    @error('body')
    <p class="text-red-500" >*{{$message}}</p>
    @enderror
</div>
