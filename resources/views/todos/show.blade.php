@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b pb-4 px-4">
	<h1 class="text-2x1">{{$todo->title}}</h1>
	<a href="{{route('todo.index')}}" class="mx-4 py-2 text-green-400 cursor-pointer text-white"><span class="fas fa-arrow-left" /></a>
</div>
<div class="py-4">
	<h3 class="text-lg">Description</h3>
	<p> {{$todo->description}}</p>
</div>
@if($todo->steps->count() > 0)
<div class="py-4">
	<h3 class="text-lg">Step for this task</h3>
	@foreach($todo->steps as $step)
	<p>{{$step->name}}</p>
	@endforeach
</div>
@endif
@endsection