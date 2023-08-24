@extends('layouts.app')
@section('content')

    <div class="container">
        <a href="/notebook" class="arrow">Go Back</a>
        <div class="sidenav-header-inner text-left"><img class="img-fluid rounded-circle avatar mb-3">
            <h2 class="h5 text-black text-uppercase mb-0">Edit Notebook</h2>

        </div>
        <hr>
         <form action="/notebook/{{$notebook->id}}" method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="name">Notebook Name</label>
                <input type="text" name="name" class="form-control" value="{{$notebook->name}}" required>
            </div>

            <div class="form-group purple-border">
                <label for="desc">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea4" rows="8" required>{{$notebook->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary" value="update">Update</button>
             <a href="/notebook" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        </form>
    </div>

@endsection
