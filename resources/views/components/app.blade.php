<x-master>
    <section class="px-8"><main class="container mx-auto py-4">
            <div class="lg:flex lg:flex-no-wrap  lg:justify-between ">
                @if(auth()->check())
                    <div class="lg:w-1/32">@include('_sidebar-links')</div>
                @endif

                <div class="lg:flex-1 lg:mx-4 max-w-3xl">
                                {{$slot}}
                </div>
                @if(auth()->check())
                    <div  class="w-1/6  bg-blue-100   rounded-b-lg p-4 " style="min-width:250px; align-self: flex-start" >@include('_friends-list')</div>
                @endif

            </div>
        </main></section>
</x-master>