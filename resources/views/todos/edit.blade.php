@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b pb-4 px-4">
	<h1 class="text-2x1">Update your todo!</h1>
	<a href="{{route('todo.index')}}" class="mx-4 py-2 text-green-400 cursor-pointer text-white"><span class="fas fa-arrow-left" /></a>
</div>
<x-alert/>
<form action="{{ route('todo.update', $todo->id) }}" method="post" class="py-5">
	@csrf
	@method('patch')
	<div class="py-1">
		<input type="text" name="title" placeholder="Title" value="{{ $todo->title }}" class="py-2 pt-2 border rounded">
	</div>
	<div class="py-1">
		<textarea name="description" placeholder="Description" class="p-2 border rounded">{{ $todo->description }}</textarea> 
	</div>
	<div class="py-2 border-t">
		@livewire('edit-step', ['steps' => $todo->steps])
	</div>
	<div class="py-2">
		<input type="submit" value="Update" class="p-2 border rounded">
	</div>
</form>
@endsection