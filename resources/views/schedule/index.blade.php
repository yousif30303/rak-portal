@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="p-4 bg-white w-4/12  rounded-lg shadow-xl">
            <form id="attForm" action="{{route('schedule')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="regnnumb" class="sr-only">Student ID</label>
                    <input type="text" name="regnnumb" id="regnnumb" placeholder="Student ID" class="bg-gray-100 p-4 border-2 rounded-lg w-full mb-2" value="">
                    <label for="status"></label>
                    <select class="bg-gray-100 p-4 border-2 rounded-lg w-full mb-4" id="status" name="status" required>
                        <option value="">Select status</option>
                        <option value="present">Present</option>
                        <option value="absent">Absent</option>
                    </select>
                    <div id="searchResults">

                    </div>
                    <button class="bg-green-400 p-2 border-2 rounded-lg text-white font-bold text-sm">Submit</button>
                    @if(isset($response))
                        <div class="bg-blue-400 p-2 border-2 rounded-lg text-white font-bold text-sm">{{ $response }}</div>
                    @endif

                </div>
                <div id="searchResults">

                </div>
        </div>
    </div>
@endsection