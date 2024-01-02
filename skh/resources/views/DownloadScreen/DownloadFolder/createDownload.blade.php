@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8"> <!-- Adjusted column size for larger screens -->
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Add Download Here</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add_post_download_list') }}" method="POST">
                            @csrf
                            <div class="row"> <!-- Using rows and columns for better responsiveness -->
                                <div class="col-md-6 mb-3">
                                    <label for="categoryid">Music</label>
                                    <select class="form-control select2" name="categoryid" required
                                        id="categoryid">
                                        <option value="option_select" disabled selected>Choose the Download
                                        </option>
                                        @foreach ($download as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03" class="form-label">Title</label>
                                    <input type="text" class="form-control" required
                                        id="validationCustom03" placeholder="Title" name="short_title">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03" class="form-label">Download PDF
                                        Link</label>
                                    <input type="text" class="form-control" required
                                        id="validationCustom03" placeholder="Paste Link"
                                        name="downloadpdf_url">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03" class="form-label">Thumbnail
                                        Image</label>
                                    <input type="text" class="form-control" required
                                        id="validationCustom03" placeholder="Thumbnail Image"
                                        name="thumbnail_image">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <button style="margin-top: 10px" class="btn btn-primary"
                                        type="submit">Submit Download</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection