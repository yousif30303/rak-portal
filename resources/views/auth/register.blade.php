@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="p-4 bg-white w-4/12  rounded-lg shadow-xl">
            <form action="" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your Name" class="bg-gray-100 p-4 border-2 rounded-lg w-full @error('name') border-red-400 @enderror" value="{{old('name')}}">
                    @error('name')
                        <div class="text-red-400">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="traffic_id" class="sr-only">Traffic ID</label>
                    <input type="text" name="traffic_id" id="traffic_id" placeholder="Traffic ID" class="bg-gray-100 p-4 border-2 rounded-lg w-full @error('traffic_id') border-red-400 @enderror" value="{{old('traffic_id')}}">
                    @error('traffic_id')
                        <div class="text-red-400">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your Email" class="bg-gray-100 p-4 border-2 rounded-lg w-full @error('email') border-red-400 @enderror" value="{{old('email')}}">
                    @error('email')
                        <div class="text-red-400">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose Your Password" class="bg-gray-100 p-4 border-2 rounded-lg w-full @error('password') border-red-400 @enderror">
                    @error('password')
                        <div class="text-red-400">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Again" class="bg-gray-100 p-4 border-2 rounded-lg w-full">
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 p-4 w-full rounded-lg border-2 text-white font-bold">Register</button>
                </div>
        </div>
    </div>
@endsection