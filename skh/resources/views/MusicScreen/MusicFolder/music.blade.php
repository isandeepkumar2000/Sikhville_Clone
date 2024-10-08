@extends('Layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <form action="{{ route('musicfolder') }}" method="GET">
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
                    <h4>All Music List </h4>
                    <a href="{{ url('add_music_list') }}" class="btn btn-light">Add </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Music</th>
                                    <th>Title</th>
                                    <th>Thumbnail</th>
                                    <th>Featured Banner</th>
                                    <th>Music Song Banner</th>
                                    <th>Recommended Music Song</th>
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
                                        @if($item->thumbnail_image)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ url('skh/public/' . $item->thumbnail_image) }}" class="card-img-top" alt="delete image" style="width: 200px; height: 80px;">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImageModal_{{ $item->id.'musicthumb' }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('Layouts.DeleteImageModel.DeleteImageModel', ['itemId' => $item->id.'musicthumb', 'deleteRoute' => route('delete_music_image', $item->id.'musicthumb')])
                                        @else
                                        <p>No image available</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->featured_music_Image_Url)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ url('skh/public/' . $item->featured_music_Image_Url) }}" class="card-img-top" alt="delete image" style="width: 200px; height: 80px;">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImageModal_{{ $item->id.'featuredimage' }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('Layouts.DeleteImageModel.DeleteImageModel', ['itemId' => $item->id.'featuredimage', 'deleteRoute' => route('delete_music_image', $item->id.'featuredimage')])

                                        @else
                                        <p>No image available</p>
                                        @endif
                                    </td>
                                    <td>

                                        @if($item->music_song_details_banner)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ url('skh/public/' . $item->music_song_details_banner) }}" class="card-img-top" alt="delete image" style="width: 200px; height: 80px;">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImageModal_{{ $item->id.'musicdetails' }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('Layouts.DeleteImageModel.DeleteImageModel', ['itemId' => $item->id.'musicdetails', 'deleteRoute' => route('delete_music_image', $item->id.'musicdetails')])
                                        @else
                                        <p>No image available</p>
                                        @endif
                                    </td>
                                    <td>

                                        @if($item->recommended_album_image)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ url('skh/public/' . $item->recommended_album_image) }}" class="card-img-top" alt="delete image" style="width: 200px; height: 80px;">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImageModal_{{ $item->id.'recomd' }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('Layouts.DeleteImageModel.DeleteImageModel', ['itemId' => $item->id.'recomd', 'deleteRoute' => route('delete_music_image', $item->id.'recomd')])

                                        @else
                                        <p>No image available</p>
                                        @endif
                                    </td>
                                    <td>{{ $item->short_description }}</td>
                                    <td>
                                        <button class="btn btn-sm {{ $item->featured_music ? 'btn-success' : 'btn-primary' }} featured-games-btn" data-toggle="modal" data-target="#featuredModal_{{ $item->id }}">
                                            <i class="fas fa-heart"></i>
                                            {{ $item->featured_music ? 'Added' : 'Not Added' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ url('edit_music_list/' . $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                        'modalId' => 'deleteConfirmationModal_' . $item->id,
                                        'deleteUrl' => url('delete_music_list', $item->id),
                                        ])
                                        @endcomponent
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmationModal_{{ $item->id }}">
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
                    {{ $music->appends(['category_id' => Request::input('category_id')])->links('Pagination.default') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
