@extends('todos.layout')

@section('content')
<body>

    <div class="text-center pt-10">
      
        <div class="flex justify-between border-b pb-4 px-4">
            <h1 class="text-2xl pb-4">What next you need To-DO</h1>
            <a href="{{route('todo.index')}}" class="mx-5 py-2 text-gray-400 cursor-pointer text-white">
                <span class="fas fa-arrow-left" />
            </a>
        </div>
        <x-alert/>
        <form action="{{ route('todo.store') }}" method="POST" class="py-5">
            @csrf
            <div>
                <input type="text" name="title" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-2 border-purple-500" placeholder="Title">
            </div>
            <div class="py-1">
                <textarea name="description" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-6 border-purple-500" placeholder="Description"></textarea>
            </div>
            <div>
                <input type="submit" value="Create" class="bg-transparent hover:bg-purple-500 text-purple-700 font-semibold hover:text-white py-2 px-4 border border-purple-500 hover:border-transparent rounded">
            </div>

        </form>
        <a href="{{ route('todo.index') }}" class="mx-5 curser-pointer bg-transparent hover:bg-red-500 text-black-700 font-semibold hover:text-white py-1 px-1 border border-red-500 hover:border-transparent rounded">Back</a>
    </div>
@endsection
