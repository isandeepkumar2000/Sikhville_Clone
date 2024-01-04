@extends('Layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h4>Edit and Update Download Data</h4>
            <a href="{{ url('add_download_list') }}" class="btn btn-success">Add Download
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Thumbnail Image</th>
                            <th>Featured Image</th>
                            <th>Short Description</th>
                            <th>Download Pdf Url</th>
                            <th>Featured</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($download as $item)
                        <tr>
                            <td>
                                @if (!empty($item->downloadcategoryDetails))
                                {{ $item->downloadcategoryDetails->name }}
                                @endif
                            </td>
                            <td>
                                @if (!empty($item->thumbnail_image))
                                <img src="{{ url('skh/public/' . $item->thumbnail_image) }}" alt="Thumbnail Image"
                                    width="80px" height="80px">
                                @else
                                <p>No Thumbnail available</p>
                                @endif
                            </td>

                            <td>
                                @if (!empty($item->featured_download_Image_Url))
                                <img src="{{ url('skh/public/' . $item->featured_download_Image_Url) }}"
                                    alt="Featured Image" width="80px" height="80px">
                                @else
                                <p>No featured image available</p>
                                @endif
                            </td>
                            <td>{{ $item->short_title }}</td>
                            <td>{{ $item->downloadpdf_url }}</td>
                            <td>
                                <button
                                    class="btn btn-sm {{ $item->featured_download ? 'btn-success' : 'btn-primary' }} featured-games-btn"
                                    data-toggle="modal" data-target="#featuredDownloadModal_{{ $item->id }}">
                                    <i class="fas fa-heart"></i>
                                    {{ $item->featured_download ? 'Added' : 'Not Added' }}
                                </button>
                            </td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <a href="{{ url('edit_download_list/' . $item->id) }}"
                                        class="btn btn-warning btn-sm me-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </td>
                            <td>
                                @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                'modalId' => 'deleteConfirmationModal_' . $item->id,
                                'deleteUrl' => url('delete_download_list', $item->id),
                                ])
                                @endcomponent
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteConfirmationModal_{{ $item->id }}">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="featuredDownloadModal_{{ $item->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="featuredGamesModalLabel_{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form id="featuredGamesForm" action="{{ url('featured_download/' . $item->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="featuredGamesModalLabel">
                                                <i class="fas fa-plus-circle mr-2" style="color: #007bff;"></i>
                                                Add Featured Download
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="featuredGameImage">
                                                    <i class="fas fa-image mr-2" style="color: #007bff;"></i>
                                                    Upload Image:
                                                </label>
                                                <input type="file" class="form-control-file" id="featuredGameImage"
                                                    name="featured_download_Image_Url" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-plus mr-2"></i>
                                                Add Featured Download
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection