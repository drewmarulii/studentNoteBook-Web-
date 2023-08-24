@extends('layouts.app')
@section('content')

    <div class="container">
        <a href="/notebook">
        <button class="mt-4 btn btn-success" type="button">
            <i class="fa fa-arrow-left"></i>Go Back
        </button>
        </a>
        <div class="sidenav-header-inner text-left"><img class="img-fluid rounded-circle avatar mb-3">
            <h2 class=" text-black text-uppercase mb-0"><strong>{{$notebook->name}}</strong></h2>
        </div>
        <hr>
        <div class="text-black">
            <textarea disabled="disabled" name="description" class="form-control  bg-transparent border-0" role="textbox" id="exampleFormControlTextarea4" rows="10">{{$notebook->description}}</textarea>
        </div>
        <hr>
        <a href="/notebook/{{$notebook->id}}/edit" class="btn btn-primary float-left mr-2">Edit</a>
        <form action="/notebook/{{$notebook->id}}" class="card-link" method="POST" style="display:inline">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input class="btn btn-danger float-left" type="submit" value="Delete">
        </form>
    </div>
    <br>

@endsection

