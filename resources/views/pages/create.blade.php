@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="sidenav-header-inner text-left"><img class="img-fluid rounded-circle avatar mb-3">
            <h2 class="h5 text-black text-uppercase mb-0">Create New Note</h2>

        </div>
        <hr>
        <form action="/notebook" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Note Title</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group purple-border">
                <label for="desc">Note Description</label>
                <textarea name="description" class="form-control" id="editor" rows="8" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary mr-1" value="done">Done</button>
            <a class="btn btn-danger" href="/notebook" class="arrow">Cancel</a>
        </form>
    </div>
@endsection
