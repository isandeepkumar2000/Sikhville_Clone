@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Edit and Update Download Data</h4>
                <a href="{{ url('add_download_list') }}" class="btn btn-primary float-end">Add Download
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Thumbnail Image Url</th>
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
                                    <td>{{ $item->thumbnail_image }}</td>
                                    <td>{{ $item->short_title }}</td>
                                    <td>{{ $item->downloadpdf_url }}</td>
                                    <td>
                                        <a href="featured_download_list/{{ $item->id }}"
                                            class="btn btn-sm btn-{{ $item->featured_download ? 'success' : 'danger' }}">
                                            {{ $item->featured_download ? 'Added' : 'Not Added' }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ url('edit_download_list/' . $item->id) }}"
                                                class="btn btn-primary btn-sm me-2">Edit</a>

                                        </div>
                                    </td>
                                    <td>
                                        @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                            'modalId' => 'deleteConfirmationModal_' . $item->id,
                                            'deleteUrl' => url('delete_download_list', $item->id),
                                        ])
                                        @endcomponent
                                        <button type="button" class="btn btn-outline-danger"
                                            data-toggle="modal"
                                            data-target="#deleteConfirmationModal_{{ $item->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection