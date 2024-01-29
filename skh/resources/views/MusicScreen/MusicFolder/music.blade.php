@extends('Layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h4>All Music List </h4>
                        <a href="{{ url('add_music_list') }}" class="btn btn-light">Add Music</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Music</th>
                                        <th>Title</th>
<<<<<<< HEAD
                                        <th>Thumbnail Image Url</th>
                                        <th>Featured Banner </th>
=======
                                        <th>Thumbnail</th>
                                        <th>Featured Banner</th>
>>>>>>> 29054f47a173941cf7123736e7d3766f0047b27d
                                        <th>Short Description</th>
                                        <th>Featured Music</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($music as $item)
                                        <tr>
                                            <td>
                                                @if (!empty($item->musicCategoryDetails))
                                                    {{ $item->musicCategoryDetails->name }}
                                                @endif
                                            </td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                @if (!empty($item->thumbnail_image))
                                                    <img src="{{ url('skh/public/' . $item->thumbnail_image) }}"
                                                        alt="Thumbnail Image" class="img-thumbnail">
                                                @else
                                                    <p class="text-muted">No Thumbnail available</p>
                                                @endif
                                            </td>
<<<<<<< HEAD

=======
>>>>>>> 29054f47a173941cf7123736e7d3766f0047b27d
                                            <td>
                                                @if (!empty($item->featured_music_Image_Url))
                                                    <img src="{{ url('skh/public/' . $item->featured_music_Image_Url) }}"
                                                        alt="Featured Image" class="img-thumbnail" width="200px"
                                                        height="200px">
                                                @else
                                                    <p class="text-muted">No featured image available</p>
                                                @endif
                                            </td>
                                            <td>{{ $item->short_description }}</td>
                                            <td>
                                                <button
                                                    class="btn btn-sm {{ $item->featured_music ? 'btn-success' : 'btn-primary' }} featured-games-btn"
                                                    data-toggle="modal" data-target="#featuredModal_{{ $item->id }}">
                                                    <i class="fas fa-heart"></i>
                                                    {{ $item->featured_music ? 'Added' : 'Not Added' }}
                                                </button>
                                            </td>
                                            <td>
                                                <a href="{{ url('edit_music_list/' . $item->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                            </td>
                                            <td>
                                                @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                                    'modalId' => 'deleteConfirmationModal_' . $item->id,
                                                    'deleteUrl' => url('delete_music_list', $item->id),
                                                ])
                                                @endcomponent
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteConfirmationModal_{{ $item->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @include('Layouts.FeaturedModelLayout.featuredModelLayout', [
                                            'id' => $item->id,
                                            'action' => url('featured_music_list/' . $item->id),
                                            'inputName' => 'featured_music_Image_Url',
                                            'submitButtonLabel' => 'Add Featured Music ',
                                        ])
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
