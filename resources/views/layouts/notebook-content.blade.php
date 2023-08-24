<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body style="
    background-image: url('{{asset('image/thai-pat-bg.png')}}');
    ">
<div class="container mb-lg-4" >
<!-- Dashboard Header-->
    <div class="sidenav-header-inner text-left"><img class="img-fluid rounded-circle avatar mb-3">
        <h2 class="h5 text-black text-uppercase mt-3">{{ Auth::user()->name }}'S NOTES
            <a href="/notebook/create-notebook" style="float: right">
                <button type="button" class="btn btn-success btn-group-lg">
                    <strong>Add Note</strong>
                    <i class="fa fa-plus"></i>
                </button>
            </a>
        </h2>

    </div>

    <!-- Notebooks Card-->
        <div class="pt-4">
            @if(count($notebooks))
            @foreach($notebooks->sortByDesc('updated_at') as $notebook)
                <div class="card-deck pt-4 mr-sm-1">
                    <div class="card" style="width: 16rem;">
                        <div class="card-body" style="background-color: whitesmoke;">
                            <p>
                                <a  href="/notebook/{{$notebook->id}}/show" class="h5 text-black text-uppercase mb-0">
                                {{$notebook->name}}
                                </a>
                            </p>
                            <p class="card-text">{{ $notebook->updated_at }}</p>
                            <p class="card-text">{{ Str::limit($notebook->description, 250) }}</p>
                            <a href="/notebook/{{$notebook->id}}/edit" class="btn btn-primary float-left mr-2">Edit</a>
                            <form action="/notebook/{{$notebook->id}}" class="card-link" method="POST" style="display:inline">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input class="btn btn-danger float-left" type="submit" value="Delete">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <p>You Don't Have Note! Create new!</p>
            @endif
        </div>
</div>
</body>
</html>
