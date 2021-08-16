@if($todo->completed)
	<span onclick="event.preventDefault(); getElementById('complete-task-{{$todo->id}}').submit()" class="fas fa-check text-green-400 cursor-pointer px-2" />
	<form style="display: none;" id="{{'complete-task-'.$todo->id}}" method="POST" action="{{ route('todo.complete', $todo->id) }}">
		@csrf
		@method('put')
	</form>
@else
	<span onclick="event.preventDefault(); getElementById('complete-task-{{$todo->id}}').submit()" class="fas fa-check text-gray-300 cursor-pointer px-2" />
	<form style="display: none;" id="{{'complete-task-'.$todo->id}}" method="POST" action="{{ route('todo.complete', $todo->id) }}">
		@csrf
		@method('put')
	</form>
@endif