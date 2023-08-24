@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="sidenav-header-inner text-left"><img class="img-fluid rounded-circle avatar mb-3">
            <h2 class="h5 text-black text-uppercase mb-0">Create New Task</h2>

        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <form action="/todolist" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Task Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="desc">Due Date</label>
                        <input type="date" name="due_date" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mr-1" value="done">Done</button>
                    <a class="btn btn-danger" href="/todolist" class="arrow">Cancel</a>
                </form>
            </div>
        </div>


    </div>
@endsection
