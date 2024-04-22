@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="p-4 bg-white w-4/12  rounded-lg shadow-xl">
            @if (session('status'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                    {{session('status')}}
                </div>
            @endif
            <form action="" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your Email" class="bg-gray-100 p-4 border-2 rounded-lg w-full" value="{{old('email')}}">
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="text" name="password" id="password" placeholder="Choose Your Password" class="bg-gray-100 p-4 border-2 rounded-lg w-full">
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 p-4 w-full rounded-lg border-2 text-white font-bold">Login</button>
                </div>
        </div>
    </div>
@endsection