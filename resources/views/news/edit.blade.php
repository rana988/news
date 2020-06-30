@extends("layouts.admin")

@section("title","News")


@section("content")
    <form method="post" enctype="multipart/form-data" action="{{ route("news.update",$news->id) }}" role="form">
        @method('PUT')
        @csrf

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">News Title</label>
                    <input value='{{$news->title}}' type="text" autofocus class="form-control" id="title" name="title" placeholder="Enter News Title">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="cat_id">Category</label>
                    <select name="cat_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option {{$news->cat_id==$category->id?"selected":""}} value='{{$category->id}}'>{{$category->id}} - {{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label for="imageUp">Image</label>
                <div class="custom-file">
                    <input type="file" name="imageUp" class="custom-file-input" id="imageUp">
                    <label class="custom-file-label" for=imageUp">Choose file</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-3">
        @if($news->image)
                <img src='{{ asset("storage/".$news->image) }}' width='240' class='img-thumbnail mt-3' />
            @endif
        </div>

            <div class="row">
                <div class="col-sm-12">            <label for="summary">Summary</label>
            <input value='{{$news->summary}}' type="text" class="form-control" id="summary" name="summary" placeholder="Enter Summary">
        </div>
        </div>
        </div>

        <div class="row">
            <div class="col-sm-12">            <label for="details">Details</label>
            <textarea class="form-control" id="details" name="details">{{ $news->details }}</textarea>
        </div>
            <div class="row">
                <div class="col-sm-12">
        <div class="form-check">
            <input {{$news->bublish?"checked":"" }} value='1' type="checkbox" name='bublish' class="form-check-input" id="bublish">
            <label class="form-check-label" for='bublish'>Bublish</label>
        </div>




        <div class="card-footer">
            @section("js")
                <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        bsCustomFileInput.init();
                    });
                </script>
            @endsection
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class='btn btn-default' href='{{ route("news.index") }}'>Cancel</a>
        </div>
    </form>
@endsection
