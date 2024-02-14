@extends('Layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-8">
            <!-- Adjusted column size for larger screens -->
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-info text-white">
                    <h4 class="m-0">Add Download Here</h4>
                    <a href="{{ url('download_list') }}" class="btn btn-danger">BACK</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('add_post_download_list') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="categoryid">Music</label>
                                <select class="form-control select2" name="categoryid" required id="categoryid">
                                    <option value="option_select" disabled selected>Choose the Download
                                    </option>
                                    @foreach ($download as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="featuredGameImage">Upload Image:</label>
                                <input type="file" class="form-control-file" id="thumbnail_image" name="thumbnail_image"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03" class="form-label">Title</label>
                                <input type="text" class="form-control" required id="validationCustom03"
                                    placeholder="Title" name="short_title">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03" class="form-label">Download PDF
                                    Link</label>
                                <input type="text" class="form-control" required id="validationCustom03"
                                    placeholder="Paste Link" name="downloadpdf_url">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <button style="margin-top: 10px" class="btn btn-primary" type="submit">
                                    <i class="fas fa-download me-2"></i> Submit Download
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
