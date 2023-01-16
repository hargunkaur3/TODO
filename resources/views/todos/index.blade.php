@extends('todos.layout')

@section('content')

<div class="flex justify-center border-b pb-4">
<h1 class="text-2xl ">Tasks on your plate</h1>
<a class="ml-5 py-1 px-3 bg-blue-400 cursor-pointer rounded-circle text-white" style="height:35px" href="../public/todos/create" role="button"><i class="fa fa-plus"></i></a>
</div>
@if($errors->any())
    <div class="alert alert-danger py-2 mb-0" role="alert">
        {{$errors->first()}}
    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-info py-2 mb-0" role="alert">
        {{session()->get('message')}}
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger py-2 mb-0" role="alert">
        {{session()->get('error')}}
    </div>
@endif
<ul>
    @forelse($todos as $todo)
        <li class="flex justify-between py-2 px-3">
        <span>
            @if($todo->completed)
                <i style="color:green" onclick="formUnsub('form-incomplete-{{$todo->id}}')" class="fa fa-check cursor-pointer px-2">
                <form style="display:none;" id="{{'form-incomplete-'.$todo->id}}" action="{{route('todo.incomplete',$todo->id)}}" method="post">
                @csrf
                @method('delete')
                </form></i>
            @else
                <i onclick="formSub('form-complete-{{$todo->id}}')" class="fa fa-check text-gray-300 cursor-pointer px-2">
                <form style="display:none;" id="{{'form-complete-'.$todo->id}}" action="{{route('todo.complete',$todo->id)}}" method="post">
                @csrf
                @method('put')
                </form>
                </i>
            @endif
            @if($todo->completed)
                <span class="line-through">{{$todo->title}}</span>
            @else
                <span>{{$todo->title}}</span>
            @endif
        </span>
        <span>
            <a href="{{'../public/todos/'.$todo->id.'/edit'}}" ><i style="color:orange" class="fa fa-edit cursor-pointer"></i></a>
            <i style="color:red;" onclick="formDel('form-del-{{$todo->id}}')" class="fa fa-trash cursor-pointer ml-2">
                <form style="display:none;" id="{{'form-del-'.$todo->id}}" action="{{route('todo.del',$todo->id)}}" method="post">
                @csrf
                @method('delete')
                </form>
                </i>
        </span>
        </li>
        @empty
        <p> <b> No tasks available. Wohoo!! </b></p>
    @endforelse
</ul>

<script>
    function formSub(formId)
        {
            var formElem = document.getElementById(formId);
            formElem.submit();
            // console.log(formElem);
        }
        function formUnsub(formId)
        {
            var formElem = document.getElementById(formId);
            formElem.submit();
            // console.log(formElem);
        }
        function formDel(formId)
        {
            var formElem = document.getElementById(formId);
            if(confirm("Do you really want to delete this task?")){
            formElem.submit();
            }
            // console.log(formElem);
        }
</script>

@endsection