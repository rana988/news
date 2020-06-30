@extends("layouts.admin")

@section("title","Categories")


@section("content")

    <form class="row mb-3">
        <div class="col-8">
            <input value='{{ request()->get("q") }}' type="text" class="form-control" id="q" name="q" placeholder="search">
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-info" ><li class="fa fa-search"></i>search</button>
        </div>
        <div class="col-2">
    <a href="{{route('category.create')}}" class="btn btn-success">Create New Category</a>
        </div>
        @if($items->count()>0)

        <table align="center" class="table table-striped table-bordered">
        <thead>

            <tr>
            <th>ID</th>
            <th>Title</th>
            <th width="20%"></th>
        </tr>
        </thead>
         <tbody>
         @foreach($items as $item)

             <tr>
                <td>{{ $item->id }}</td>
                <td><a href="{{route('category.show',$item->id)}}" >{{ $item->title }}</a></td>
                <td>
                    <a class='btn btn-info btn-sm'
                       href="{{ route("category.edit", $item->id) }}">Edit</a>
                    <a class='btn btn-danger btn-sm'
                       onclick='return confirm("Are you sure?")'
                       href="{{route('delete-category',$item->id)}}">Delete</a>

                <!--
            <a class='btn btn-danger btn-sm'
            onclick='return confirm("Are you sure?")'
            href='{{ asset("/category/delete/".$item->id) }}'>Delete</a>


            <a class='btn btn-danger btn-sm'
            onclick='return confirm("Are you sure?")'
            href='/category/delete/{{$item->id}}'>Delete</a>
            -->
                </td>
            </tr>
             @endforeach
        </tbody>
    </table>

        {{$items->links()}}

        @else
            <div class='alert alert-warning'>
                her is now result
            </div>

    @endif

@endsection
