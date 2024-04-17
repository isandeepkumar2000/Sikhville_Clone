@extends('Layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <form action="{{ route('punjabireadingFolder') }}" method="GET">
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>All Punjabi Reading</h4>
                    <a style="margin-left: 35%" href="{{ url('add_punjabi_reading_list') }}" class="btn btn-primary float-end"><i class="fas fa-music mr-2"></i>Add
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Album Title</th>
                                      <th> Title</th>
                                    <th>Thumbnail Big Image</th>
                                    <th>Featured Big Image</th>
                                    <th>Reading Summary Pdf</th>
                                    <th>Reading Video Url</th>
                                    <th>Featured Punjabi Reading </th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($punjabireading as $item)
                                <tr>
                                    <td>
                                        @if (!empty($item->punjabireadingCategoryDetails))
                                        {{ $item->punjabireadingCategoryDetails->name }}
                                        @endif
                                    </td>
                                                 <td>{{ $item->title }}</td>
                                    <td>
                                        @if($item->thumbnail_big_image)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ url('skh/public/' . $item->thumbnail_big_image) }}" class="card-img-top" alt="delete image" style="width: 200px; height: 80px;">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImageModal_{{ $item->id }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('Layouts.DeleteImageModel.DeleteImageModel', ['itemId' => $item->id, 'deleteRoute' => route('delete_image', $item->id)])
                                        @else
                                        <p>No featured image available</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->featured_punjabi_reading_Image_Url)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ url('skh/public/' . $item->featured_punjabi_reading_Image_Url) }}" class="card-img-top" alt="delete image" style="width: 200px; height: 80px;">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImageModal_{{ $item->id }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('Layouts.DeleteImageModel.DeleteImageModel', ['itemId' => $item->id, 'deleteRoute' => route('delete_image', $item->id)])
                                        @else
                                        <p>No featured image available</p>
                                        @endif
                                    </td>
                                    <td>{{ $item->reading_summary_pdf }}</td>
                                    <td>{{ $item->reading_video_url }}</td>
                                    <td>
                                        <button class="btn btn-sm {{ $item->featured_punjabi_reading ? 'btn-success' : 'btn-primary' }} featured-games-btn" data-toggle="modal" data-target="#featuredModal_{{ $item->id }}">
                                            <i class="fas fa-heart"></i>
                                            {{ $item->featured_punjabi_reading ? 'Added' : 'Not Added' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ url('edit_punjabi_reading_list/' . $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                        'modalId' => 'deleteConfirmationModal_' . $item->id,
                                        'deleteUrl' => url('delete_punjabi_reading_list', $item->id),
                                        ])
                                        @endcomponent
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteConfirmationModal_{{ $item->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @include('Layouts.FeaturedModelLayout.featuredModelLayout', [
                                'id' => $item->id,
                                'action' => url('featured_punjabi_reading/' . $item->id),
                                'inputName' => 'featured_punjabi_reading_Image_Url',
                                'submitButtonLabel' => 'Add Featured Punjabi Reading'
                                ])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $punjabireading->appends(['category_id' => Request::input('category_id')])->links('Pagination.default') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
