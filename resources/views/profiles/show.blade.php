@extends('components.layout.app')

@section('content')
    <!-- profile card -->
    <div class="bg-white py-4 mx-4 md:mx-12 flex flex-col md:flex-row">
        <!-- left side  -->
        <div class="w-full md:w-1/2">
            <h1 class="text-gray-800 font-bold py-2 text-2xl">{{ $user->name }}</h1>
            <p class="text-gray-800 py-2 text-5xl font-bold">Some cool to say <br>about this user</p>
            <button class="bg-gray-200 my-2 font-semibold p-2 hover:bg-gray-800 hover:text-white rounded mr-2"><i class="fa fa-plus"></i> Follow</button>
            <button class="bg-gray-200 my-2 font-semibold p-2 hover:bg-gray-800 hover:text-white rounded mr-2"><i class="fa fa-github"></i> Github</button>
        </div>
        <!-- end of left side  -->

        <!-- right side  -->
        <div class="w-full md:w-1/2 h-full hidden md:block ml-8">
            <img src="{{url('images/undraw_tabs_jf82.svg')}}" class="w-3/4" alt="Profile card">
        </div>
        <!-- end of right side  -->
    </div>
    <!-- end of profile card  -->

    <!-- sub nav  -->
    <div class="mx-4 md:mx-12">
        <ul class="flex py-4">
            <li class="text-gray-900 hover:text-orange-500 pr-8 font-semibold">Components<span class="text-gray-700 px-2">3</span></li>
            <li class="text-gray-900 hover:text-orange-500 pr-8 font-semibold">Followers<span class="text-gray-700 px-2">3</span></li>
            <li class="text-gray-900 hover:text-orange-500 pr-8 font-semibold">Following<span class="text-gray-700 px-2">3</span></li>
            <li class="text-gray-900 hover:text-orange-500 pr-8 font-semibold">Likes<span class="text-gray-700 px-2">3</span></li>
        </ul>
    </div>
    <hr class="h-px bg-gray-700 border-none">

    <!-- end of sub nav -->

    <main class="bg-gray-800 py-4">
        <div class="mx-4 md:mx-12">
            <show-components :data="{{ json_encode($components) }}"></show-components>
        </div>
    </main>


@endsection
