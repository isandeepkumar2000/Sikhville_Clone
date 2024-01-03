@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h4 class="m-0">Edit & Update Download</h4>
                        <a href="{{ url('download_list') }}" class="btn btn-danger">BACK</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update_download_list/' . $download->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Image URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-image"></i></span>
                                        <input type="text" class="form-control" required id="validationCustom02"
                                            value="{{ $download->thumbnail_image }}" placeholder="Image URL"
                                            name="thumbnail_image" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="shopping_id">Category</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-list"></i></span>
                                        <select class="js-states form-control" name="categoryid" required id="shopping_id">
                                            <option value="option_select" selected>Shoppings</option>
                                            @foreach ($downloadcategories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Download PDF Link</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-file-earmark-pdf"></i></span>
                                        <input type="text" class="form-control" required id="validationCustom03"
                                            value="{{ $download->downloadpdf_url }}" placeholder="Paste Link"
                                            name="downloadpdf_url" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">Title</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-file-text"></i></span>
                                        <input type="text" class="form-control" required id="validationCustom04"
                                            value="{{ $download->short_title }}" placeholder="Title" name="short_title"
                                            required>
                                    </div>
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
