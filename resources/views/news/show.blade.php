@extends("layouts.admin")

@section("title","News")


@section("content")
    <form enctype="multipart/form-data" role="form">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">News Title</label>
                    <input  readonly value='{{$news->title}}' type="text" autofocus class="form-control" id="title" name="title" placeholder="Enter News Title">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="cat_id">Category</label>
                    <select name="cat_id" class="form-control">
                        <option disabled value="">Select Category</option>
                        @foreach($categories as $category)
                            <option {{old('cat_id')==$category->id?"selected":""}} value='{{$category->id}}'>{{$category->id}} - {{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class='col-sm-6'>
                <label for="imageUp">Image</label>
                <div class="custom-file">
                    <input type="file" name="imageFile" class="custom-file-input" id="imageUp">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="summary">Summary</label>
            <input  readonly value='{{$news->summary}}' type="text" class="form-control" id="summary" name="summary" placeholder="Enter Summary">
        </div>
        </div>
        </div>

        <div class="form-group">
            <label for="details">Details</label>
            <textarea readonly class="form-control" id="details" name="details">{{ $news->details }}</textarea>
        </div>

        <div class="form-check">
            <input disabled {{ old('bublish')?"checked":"" }} value='1' type="checkbox" name='bublish' class="form-check-input" id="bublish">
            <label class="form-check-label" for='bublish'>Bublish</label>
        </div>


        <div class="card-footer">
            <a class='btn btn-default' href='{{ route("news.index") }}'>Done</a>
        </div>
    </form>
@endsection
@section("js")
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
