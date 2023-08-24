<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body style="
    background-image: url('{{asset('image/thai-pat-bg.png')}}');
    ">

<div class="container">
    <!-- Dashboard Header-->
    <div class="sidenav-header-inner text-left"><img class="img-fluid rounded-circle avatar mb-3">
        <h2 class="h5 text-black text-uppercase mt-3">{{ Auth::user()->name }}'S Tasks
            <a href="/todolist/create-task" style="float: right">
                <button type="button" class="btn btn-success btn-group-lg">
                    <strong>Add Task</strong>
                    <i class="fa fa-plus"></i>
                </button>
            </a>
        </h2>
    </div>

    <!-- Todolist Card-->
    <div class="pt-4">
        <div class="row">
            <div class="col-6 col-md-4">

                <div class="card mt-3" style="width: auto;">
                    <div class="card-header bg-warning">
                        <strong>Due Today</strong>
                    </div>
                    <ul class="list-group list-group-flush">

                            @if(count($todolist))

                                @foreach($today as $todolist)
                                    <ul class="list-group-item">
                                        <form action="/todolist/{{$todolist->id}}" method="POST">
                                            {{ $todolist->title }}
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-link btn-sm float-right">
                                                <i class="fa fa-check-square ihover" style="color: gray;"></i>
                                            </button>
                                        </form>
                                    </ul>
                                @endforeach

                            @elseif(count($todolist))

                                @foreach($today as $todolist)
                                    <ul class="list-group-item">
                                        <form action="/todolist/{{$todolist->id}}" method="POST">
                                            {{ $todolist->title }}
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-link btn-sm float-right">
                                                <i class="fa fa-check-square ihover" style="color: gray;"></i>
                                            </button>
                                        </form>
                                    </ul>
                                @endforeach

                                @else
                                    <ul class="list-group-item">
                                        <p>You Are Free Today :)</p>
                                    </ul>
                                @endif

                    </ul>


                    <ul class="list-group list-group-flush">
                        @if(count($overdue))
                        <ul class="list-group-item bg-danger">
                            <strong class="text-uppercase text-light">!!! Overdue !!!</strong>
                        </ul>
                            @foreach($overdue as $todolist)
                                <ul class="list-group-item">
                                    <form action="/todolist/{{$todolist->id}}" method="POST">
                                        <strong class="text-danger">{{ $todolist->title }}</strong>
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-link btn-sm float-right">
                                            <i class="fa fa-check-square ihover" style="color: gray;"></i>
                                        </button>
                                    </form>
                                </ul>
                            @endforeach
                        @endif
                    </ul>

                </div>

            </div>

            <div class="col-6 col-md-4">
                <div class="card mt-3" style="width: auto;">
                    <div class="card-header bg-success">
                        <strong class="text-light">Due Tommorow</strong>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($tomorrow as $todolist)
                            <ul class="list-group-item">
                                <form action="/todolist/{{$todolist->id}}" method="POST">
                                    {{ $todolist->title }}
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-link btn-sm float-right">
                                        <i class="fa fa-check-square ihover" style="color: gray;"></i>
                                    </button>
                                </form>
                            </ul>
                        @endforeach

                    </ul>
                </div>
            </div>

            <div class="col-6 col-md-4">
                <div class="card mt-3" style="width: auto;">
                    <div class="card-header bg-primary">
                        <strong class="text-light">More</strong>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($more->sortBy('due_date') as $todolist)
                            <ul class="list-group-item">
                                <form action="/todolist/{{$todolist->id}}" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <p class="mb-0 mt-0">{{ $todolist->title }}</p>
                                            <p class="mt-0">{{ $todolist->due_date }}</p>
                                        </div>
                                        <div class="col col-lg-2">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-link btn-sm float-right">
                                                <i class="fa fa-check-square ihover" style="color: gray;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </ul>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
