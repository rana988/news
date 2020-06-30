@extends("layouts.admin")

@section("title","Create New Category")


@section("content")

    <form method="post" action="{{ route("category.update",$category->id) }}" role="form">
        @method('PUT')
        @csrf

        <div class="card-body">
            <div class="form-group">
                <label for="title">Category</label>
                <input value="{{$category->title}}" type="text" autofocus class="form-control"  id="title" name="title" placeholder="Enter Category Name">
            </div>
            <div class="form-check">
                <input  {{$category->show?"checked":""}} value= '1' type="checkbox" name='show' class="form-check-input" id="show">
                <label class="form-check-label" for='show'>Show</label>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            <a class='btn btn-default' href='{{ asset("/category") }}'>Cancel</a>
        </div>
    </form>
@endsection
