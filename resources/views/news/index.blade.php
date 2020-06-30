@extends("layouts.admin")

@section("title","News")


@section("content")
    <form class="row mb-3">
            <div class="col-8">
                <input value='{{ request()->get("q") }}' type="text" class="form-control" id="q" name="q" placeholder="search">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-info" ><li class="fa fa-search"></i>search</button>
            </div>
            <div class="col-2">

    <a href="{{ route("news.create") }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New news</a>
            </div>
    </form>
@if($items->count()>0)
    <table align="center" class="table table-striped mb-3 mt-3 table-bordered">
        <thead>
        <tr>
            <th>title</th>
            <th>Category</th>
            <th>Summary</th>
            <th>Details</th>
            <th width="20%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $row)
            <tr>
                <td><a href="{{ route("news.show", $row->id) }}">{{ $row->title }}</a></td>
                <td>{{ $row->category->title }}</td>
                <td>{{ $row->summary }}</td>
                <td>{{ $row->details }}</td>
                <td width="20%">    <form method="post" action="{{ route('news.destroy', $row->id) }}">
                        <a href="{{ route("news.show", $row->id) }}" class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>

                        <a href="{{ route("news.edit", $row->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

                       <!-- <a href="{{ route("delete-news", $row->id) }}" onclick='return confirm("Are you sure dude?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a> -->

                        <button onclick='return confirm("Are you sure dude?")' type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                        @csrf
                        @method("DELETE")
                    </form>
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
