@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b pb-4 px-4">
	<h1 class="text-2x1">List of all todos!</h1>
	<a href="{{route('todo.create')}}" class="mx-4 py-2 text-green-400 cursor-pointer text-white"><span class="fas fa-plus-circle" /></a>
</div>
<x-alert/>
<ul class="my-5">
	@forelse($todos as $todo)
	<li class="flex justify-between p-3">
		<div>
			@include('todos.complete-button')
		</div>

		@if($todo->completed)
			<p class="line-through">{{$todo->title}}</p>
		@else
			<a class="cursor-pointer" href="{{ route('todo.show', $todo->id) }}">{{$todo->title}}</a>
		@endif

		<div>
			<a href="{{ route('todo.edit', $todo->id) }}" class="text-blue-400 cursor-pointer text-white"><span class="fas fa-edit px-2" /></a>
			<span onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this?')){ getElementById('delete-task-{{$todo->id}}').submit()}" class="fas fa-trash text-red-500 cursor-pointer px-2" />
			<form action="{{ route('todo.destroy', $todo->id) }}" id="delete-task-{{$todo->id}}" method="POST">
				@csrf
				@method('delete')
			</form>
		</div>
	</li>
	@empty
		<p>No todo available, please add one.</p>
	@endforelse
</ul>

@endsection