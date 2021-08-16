@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b pb-4 px-4">
	<h1 class="text-2x1">What next you need to do!</h1>
	<a href="{{route('todo.index')}}" class="mx-4 py-2 text-green-400 cursor-pointer text-white"><span class="fas fa-arrow-left" /></a>
</div>
{{-- <div class="flex justify-center border-b pb-4">
	<h1 class="text-2x1">What next you need to do!</h1>
</div> --}}
<x-alert/>
<form action="{{route('todo.store')}}" method="post" class="py-5">
	@csrf
	<div class="py-1">
		<input type="text" name="title" placeholder="Title" class="py-2 pt-2 border rounded">
	</div>
	<div class="py-1">
		<textarea name="description" placeholder="Description" class="p-2 border rounded"></textarea> 
	</div>
	<div class="py-2 border-t">
		@livewire('step')
	</div>
	<div class="py-1 pb-4">
		<input type="submit" value="Create" class="p-2 border rounded">
	</div>
</form>
@endsection