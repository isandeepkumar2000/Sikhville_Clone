@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4>Welcome to Home Page Image Slider Section</h4>
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
                                                @if (!empty($item->banner_thumbnail_image))
                                                    <img src="{{ url('skh/public/' . $item->banner_thumbnail_image) }}"
                                                        alt="Thumbnail Image" width="70px" height="70px">
                                                @else
                                                    <p>No Thumbnail available</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('edit_homepage_imageslider_list/' . $item->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                                    'modalId' => 'deleteConfirmationModal_' . $item->id,
                                                    'deleteUrl' => url('delete_homepage_imageslider_list', $item->id),
                                                ])
                                                @endcomponent
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteConfirmationModal_{{ $item->id }}">
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
