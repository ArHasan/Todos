@if($todo->completed)
<span class="fa fa-check px-2 text-green-500 cursor-pointer  " onclick="event.preventDefault();document.
getElementById('form-incomplete-{{ $todo->id }}').submit()"  />
    <form id="{{ 'form-incomplete-'.$todo->id }}" action="{{ route('incomplete',$todo->id) }}" method="POST"
        style="display:none">
        @csrf
        @method('delete')
    </form>

@else

<span onclick="event.preventDefault();document.
getElementById('form-complete-{{ $todo->id }}').submit()"
    class="fa fa-check px-2 text-gray-400 cursor-pointer" />
<form id="{{ 'form-complete-'.$todo->id }}" action="{{ route('complete',$todo->id) }}" method="POST"
    style="display:none">
    @csrf
    @method('put')
</form>
@endif