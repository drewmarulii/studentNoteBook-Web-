<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body>
<div class="container">
        <!-- User Info-->
        @include('components.headerprofile')

    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-sm">
                    <div class="card-box bg-success">
                        <div class="inner">
                            <h1 class="mt-0" style="text-align:left;">
                        <span class="ml-2 h4" style="text-align: right">
                            Total Notes
                        </span>
                                <span class="mr-5" style="float:right;">
                            {{$counts}}
                        </span>
                            </h1>
                        </div>
                        <a href="/notebook" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="card-box bg-primary">
                        <div class="inner">
                            <h1 class="mt-0" style="text-align:left;">
                        <span class="ml-2 h4" style="text-align: right">
                            Total Tasks
                        </span>
                                <span class="mr-5" style="float:right;">
                            {{$countask}}
                        </span>
                            </h1>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
                <h2 class="h5 text-black mb-2 mt-4">Recent Notes</h2>
                @if(count($notebooks))
                    @foreach($notebooks->take(6)->sortByDesc('updated_at') as $notebook)
                        <a href="/notebook/{{$notebook->id}}/show" class="text-white">
                        <div class="card mt-3 bg-dark text-white" style="width:auto; height: 60px;">
                            <div class="card-body">
                                <p>
                                    <a href="/notebook/{{$notebook->id}}/show" class="text-white">
                                        <strong class="h5">{{ Str::limit($notebook->name, 50) }}</strong>
                                        <button class="bg-primary" style="float: right; color: white; border-radius: 5px">Open</button>
                                    </a>
                                </p>
                            </div>
                        </div>
                        </a>
                    @endforeach
                @else
                    <p>You Don't Have Note!</p>
                @endif
            <p class=" text-black mb-2 mt-3"><a href="/notebook/create-notebook" >Create New</a></p>
            </div>

        <div class="col-4">
            <div class="card mt-3" style="width: auto;">
                <div class="card-header bg-warning">
                    <p>
                        <strong class="h5">Today's Tasks</strong>
                        <a href="/todolist/create-task" class="text-dark">
                            <button class="bg-transparent" style="float: right; color: white; border-radius: 5px; border: none">
                                <i class="fa fa-plus ihover" style="color: black;"></i>
                            </button>
                        </a>
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Due Today</strong></li>
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

                <div class="card-footer">
                    <a href="/todolist">View More</a>
                </div>
                </ul>
            </div>


        </div>
    </div>
</div>
    </div>
</body>
</html>
