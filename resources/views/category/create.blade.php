@extends("layouts.admin")

@section("title","Create New Category")


@section("content")


    <form method="post" action="{{route('category.store')}}" role="form">
       @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Category</label>
                <input value='{{old("title")}}' type="text" autofocus class="{{ $errors->has('title')?"is-invalid":""}} form-control" id="title" name="title" placeholder="Enter Category Name">
            </div>
            <div class="form-check">
                <input {{ old('show')?"checked":"" }} value='1' type="checkbox" name='show' class="form-check-input" id="show">
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
