@extends('Layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <form action="{{ route('downloadListing') }}" method="GET">
                            <div class="input-group">
                                <select name="category_id" class="form-select">
                                    <option value="all" {{ Request::input('category_id') == 'all' ? 'selected' : '' }}>
                                        <i class="fas fa-globe"></i> All Categories
                                    </option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ Request::input('category_id') == $category->id ? 'selected' : '' }}>
                                        <i class="fas fa-folder"></i> {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <h4>All Downlord Listing</h4>
                    <a href="{{ url('add_download_listing') }}" class="btn btn-light">Add </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Download Album</th>
                                    <th>Download Image</th>
                                    <th>Download Title</th>
                                    <th>Download Pdf</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($downloadListing as $item)
                                <tr>
                                     <td>
                                        @if (!empty($item->DownloadDetailsSection))
                                        {{ $item->DownloadDetailsSection->name }}
                                        @endif
                                    </td>                                  
 <td>
    @if($item->image_url)
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="{{ url('skh/public/' . $item->image_url) }}" class="card-img-top" alt="Image" style="width: 200px; height: 80px;">
                <div class="card-body">
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImageModal_{{ $item->id }}">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>
        @include('Layouts.DeleteImageModel.DeleteImageModel', ['itemId' => $item->id, 'deleteRoute' => route('delete_listing', $item->id)])
    @else
        <p>No image available</p>
    @endif
</td>




                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->downlord_pdf_link }}</td>

                                    <td>
                                        <a href="{{ url('edit_download_listing/' . $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </td>
                                    <td>
                                        @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                        'modalId' => 'deleteConfirmationModal_' . $item->id,
                                        'deleteUrl' => url('delete_download_listing', $item->id),
                                        ])
                                        @endcomponent
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmationModal_{{ $item->id }}">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $downloadListing->appends(['category_id' => Request::input('category_id')])->links('Pagination.default') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection