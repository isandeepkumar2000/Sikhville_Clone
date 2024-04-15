@extends('Layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4><i class="fas fa-music mr-2"></i>Add Downlord Section Reference</h4>
                    <a href="{{ url('download_listing') }}" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ url('add_post_download_listing') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="downlord_section_reference">Downlord Section Reference</label>
                                <select class="form-control select2" name="downlord_section_reference"  id="downlord_section_reference">
                                    <option value="option_select" disabled selected>Choose Downlord Section Reference</option>
                                    @foreach ($downloadListing as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div>
                                    <div class="form-group mb-3">
                                        <label for="title">Download Title</label>
                                        <input type="text" name="title" class="form-control" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="downlord_pdf_link">Download Pdf</label>
                                        <input type="text" name="downlord_pdf_link" class="form-control" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image_url" class="font-weight-bold">Upload Downlord Listing Image</label>
                                        <input type="file" class="form-control-file" id="image_url" name="image_url" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-check-circle mr-2"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection