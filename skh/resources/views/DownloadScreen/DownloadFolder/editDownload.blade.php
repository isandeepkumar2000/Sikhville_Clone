@extends('Layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-info text-white">
                    <h4 class="m-0">Edit & Update</h4>
                    <a href="{{ url('download_list') }}" class="btn btn-danger">BACK</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('update_download_list/' . $download->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div    class = "row mb-3">
                        <div    class = "col-md-12 mb-3">
                        <label  for   = "categoryid">Select Download</label>
                        <select class = "form-control select2" name = "categoryid" required id = "categoryid">
                        <option value = "option_select">Choose a Game</option>
                                    @foreach ($downloadcategories as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $download->categoryid)
                                        selected
                                        @endif>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="thumbnail_image">Image URL</label>
                                <input type="file" class="form-control"  id="validationCustom02"
                                    placeholder="Image URL" value="{{ $download->thumbnail_image }}"
                                    name="thumbnail_image" >
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03">Download Url</label>
                                <input type="text" class="form-control"  id="validationCustom03"
                                    value="{{ $download->downloadpdf_url }}" placeholder="Short Description"
                                    name="downloadpdf_url" >
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="textAreaExample1">Title</label>
                            <input type="text" class="form-control"  id="validationCustom04"
                                value="{{ $download->short_title }}" placeholder="Title" name="short_title" >
                        </div>
                        <div class="form-group mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Game</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>









@endsection
