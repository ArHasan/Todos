@extends('todos.layout')

@section('content')

<div class="text-center pt-5">
    <div class="flex justify-between border-b pb-5 px-4">
        <h1 class="text-2xl ">All Your Todos</h1>
        <a href="{{ route('todo.create') }}"
            class="mx-5 curser-pointer bg-transparent hover:bg-purple-500 text-purple-700 font-semibold hover:text-white py-1 px-1 border border-purple-500 hover:border-transparent rounded">Create
            New <span class="fas fa-plus-circle" /></a>
    </div>
    <ul class="my-5">
        <x-alert />
        @forelse ($todos as $todo)
        <li class="flex justify-between p-2">

            <div> @include('todos.completeButton')</div>

            @if ($todo->completed)
            <p class="px-3 line-through text-red-600">{{ $todo->title }}</p>
            @else
            <a class="cursor-pointer" href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a>
            @endif
            <div>
                <a href="{{route('todo.edit',$todo->id)}}" class="cursor-pointer text-orange-500 ">
                    <span class="fa fa-edit px-2 curser-pointer "/>
                </a>
                    <span class="fa fa-trash text-red-500 px-3 cursor-pointer" onclick="event.preventDefault();
                    if(confirm('Are you really want to delete ?')){
                    document.getElementById('form-delete-{{ $todo->id }}')
                    .submit()}"/>
                <form id="{{'form-delete-'.$todo->id }}" action="{{route('todo.destroy',$todo->id) }}" method="post"
                    style="display:none">
                    @csrf
                    @method('delete')
                </form>

            </div>
        </li>
        @empty
        <p>NO task available, create one</p>
        @endforelse
    </ul>
</div>

@endsection
