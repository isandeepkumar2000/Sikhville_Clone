@extends('Layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4>All Home Page Image Slider Section</h4>
                    <a href="{{ url('add_homepage_imageslider_list') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Add
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Youtube Video Url</th>
                                    <th>Slider Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($homepageImage as $item)
                                <tr>
                                    <td>{{ $item->youtube_banner_link }}</td>
                                    <td>
                                        @if($item->banner_thumbnail_image)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ url('skh/public/' . $item->banner_thumbnail_image) }}" class="card-img-top" alt="delete image" style="width: 200px; height: 80px;">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImageModal_{{ $item->id }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('Layouts.DeleteImageModel.DeleteImageModel', ['itemId' => $item->id, 'deleteRoute' => route('delete_homepage_image', $item->id)])
                                        @else
                                        <p>No image available</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('edit_homepage_imageslider_list/' . $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </td>
                                    <td>
                                        @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                        'modalId' => 'deleteConfirmationModal_' . $item->id,
                                        'deleteUrl' => url('delete_homepage_imageslider_list', $item->id),
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
