@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Download
                            <a href="{{ url('download_list') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update_download_list/' . $download->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Image Url</label>
                                    <input type="text" class="form-control" required id="validationCustom02"
                                        value="{{ $download->thumbnail_image }}" placeholder="Image URL"
                                        name="thumbnail_image" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="shopping_id">Category</label>
                                    <select class="js-states form-control" name="categoryid" required id="shopping_id">
                                        <option value="option_select" selected>Shoppings</option>
                                        @foreach ($downloadcategories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Download PDF Link</label>
                                    <input type="text" class="form-control" required id="validationCustom03"
                                        value="{{ $download->downloadpdf_url }}" placeholder="Paste Link"
                                        name="downloadpdf_url" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">Title</label>
                                    <input type="text" class="form-control" required id="validationCustom04"
                                        value="{{ $download->short_title }}" placeholder="Title" name="short_title"
                                        required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Download</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
