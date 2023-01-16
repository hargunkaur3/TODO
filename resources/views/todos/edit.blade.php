@extends('todos.layout')

@section('content')

<h1 class="text-2xl border-b pb-4">Update Task</h1>
@if($errors->any())
    <div class="alert alert-danger py-2 mb-0" role="alert">
        {{$errors->first()}}
    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success py-2 mb-0" role="alert">
        {{session()->get('message')}}
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger py-2 mb-0" role="alert">
        {{session()->get('error')}}
    </div>
@endif
<form action="{{route('todo.update',$todo->id)}}" method="post" class="py-2">
@csrf
@method('patch')
    <input type="text" name="title" value="{{$todo->title}}" class="px-2 py-2 border rounded">
    <input type="submit" value="UPDATE" class="p-2 border rounded">
</form>
<a class="m-5 py-1 px-1 cursor-pointer rounded border" style="height:35px" href="../" role="button">Back</a>

@endsection