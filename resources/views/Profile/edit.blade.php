<x-app>



    <form  method="POST" action="/profile/{{$user->user_name}}" class="mt-20" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            @error('name')
            <p class="invalid-feedback text-red-400" role="alert">*{{$message}}</p>
            @enderror
           <label for="name" class=" mb-2
            uppercase
            text-sm
            font-bold
            text-black-50">
                name :
           </label>
           <input  required class="text-red-600  w-full
            border
             border-blue-500
             rounded-lg
             text-lg font-bold
              p-1" name="name" value="{{$user->name}}" type="text">
        </div>
        <div class="mb-6">
            @error('user_name')
            <p class="invalid-feedback text-red-400" role="alert">*{{$message}}</p>
            @enderror

            <label  for="user_name" class="mb-2
             uppercase
             text-sm
             font-bold
             text-black-50">
                User name :
            </label>
            <input  required class="text-red-600  w-full
             border border-blue-500
              rounded-lg text-lg
              font-bold p-1" name="user_name" value="{{$user->user_name}}" type="text">
        </div>

        <div class="mb-6" >
            @error('email')
            <p class="invalid-feedback text-red-400" role="alert">*{{$message}}</p>
            @enderror

            <label for="email" class="mt-2 uppercase
             text-sm font-bold
              text-black-50">
                Email :
            </label>
            <input required class="text-red-600 w-full border
             border-blue-500 rounded-lg
              text-lg font-bold p-1" name="email" value="{{$user->email}}" type="text">
        </div>
        <div class="mb-6" >
            @error('avatar')
            <p class="invalid-feedback text-red-400" role="alert">*{{$message}}</p>
            @enderror

            <label for="avatar" class="mt-2 uppercase
             text-sm font-bold
              text-black-50">
                Avatar :
            </label>
            <input required class="text-red-600

              text-lg font-bold p-1" name="avatar"  type="file">
            <div>
                <img src="{{$user->avatar}}" style="max-width: 200px; max-height: 200px;">
            </div>
        </div>
        <div class="mb-6">
            @error('password')
            <p class="invalid-feedback text-red-400" role="alert">*{{$message}}</p>
            @enderror

            <label for="password" class="mb-2  uppercase text-sm
             font-bold text-black-50">
                password :
            </label>
            <input class="  w-full border border-blue-500
             rounded-lg text-lg font-bold p-1" name="password" type="password">
        </div>

        <div  class="mb-6">
            @error('password_confirmation')
            <p class="invalid-feedback text-red-400" role="alert">*{{$message}}</p>
            @enderror

            <label for="password_confirmation" class="mb-2  uppercase text-sm
             font-bold text-black-50">
                password confirmation :
            </label>
            <input class="  w-full border border-blue-500
             rounded-lg text-lg font-bold p-1" name="password_confirmation"  type="password">
        </div>
        <input type="submit" value="Update" class="font-bold bg-blue-400 text-white text-xl-center p-2 btn-group border border-blue-600 rounded-lg">
    </form>


</x-app>