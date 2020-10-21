@extends('todos.layout')

@section('content')

    <div class="text-center pt-10">
        <h2 class="text-2xl border-b pb-4">Update this todo list</h2>
 
        <x-alert/>
        <form action="{{ route('todo.update',$todo->id) }}" method="post" class="py-5">
            @csrf
            @method('patch')
            <input value="{{ $todo->title }}" type="text" name="title" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 border-purple-500">
            <div class="py-1">
                <textarea name="description" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-8 border-purple-500" placeholder="Description">{{$todo->description}}</textarea>
            </div>
            <input type="submit" value="Update" class="bg-transparent hover:bg-purple-500 text-purple-700 font-semibold hover:text-white py-2 px-4 border border-purple-500 hover:border-transparent rounded">
        </form>
      
    </div>
@endsection