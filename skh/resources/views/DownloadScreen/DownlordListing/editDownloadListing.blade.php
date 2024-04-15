@extends('Layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4> <i style="margin-right: 10px;" class="fas fa-music"></i>Edit & Update Music Song</h4>
                    <a href="{{ url('download_listing') }}" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ url('update_download_listing/' . $downloadListing->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="downlord_section_reference" class="form-label">Downlord Reference</label>
                            <select class="form-control select2" name="downlord_section_reference" id="downlord_section_reference">
                                <option value="option_select">Choose a Music Song</option>
                                @foreach ($download as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $downloadListing->downlord_section_reference) selected @endif>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            
                                <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div>
                                    <div class="form-group mb-3">
                                        <label for="title">Download Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $downloadListing->title }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="downlord_pdf_link">Download Pdf</label>
                                        <input type="text" name="downlord_pdf_link" class="form-control" value="{{ $downloadListing->downlord_pdf_link }}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image_url" class="font-weight-bold">Upload Downlord Listing Image</label>
                                        <input type="file" class="form-control-file" id="image_url" name="image_url" >
                                    </div>
                                </div>
                            </div>
                        </div>


                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection