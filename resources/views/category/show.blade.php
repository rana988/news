@extends("layouts.admin")

@section("title","Create New Category")


@section("content")


    <form  role="form">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Category</label>
                <input readonly value="{{$category->title}}" type="text" autofocus class="form-control"  id="title" name="title" placeholder="Enter Category Name">
            </div>
            <div class="form-check">
                <input  disabled {{$category->show?"checked":"" }} type="checkbox" name='show' class="form-check-input" id="show">
                <label class="form-check-label" for='show'>Show</label>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a class='btn btn-default' href='{{ asset("/category") }}'>DONE</a>
        </div>
    </form>
@endsection
