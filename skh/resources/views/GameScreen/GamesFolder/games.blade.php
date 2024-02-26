@extends('Layouts.master')
@section('content')
<!-- Modal -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
            <div class="card">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <form action="{{ route('gamesfolder') }}" method="GET">
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
                    <h4>All Games List</h4>
                    <a href="{{ url('add_games_list') }}" class="btn btn-primary float-end">
                        <i class="fas fa-plus-circle me-1"></i>Add
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Thumbnail Image</th>
                                    <th>Featured Image</th>
                                    <th>Short Description</th>
                                    <th>Details</th>
                                    <th>Top Games</th>
                                    <th>Featured Games</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($game as $item)
                                <tr>
                                    <td>
                                        @if (!empty($item->gamesCategoryDetails))
                                        {{ $item->gamesCategoryDetails->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->thumbnail_image)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ url('skh/public/' . $item->thumbnail_image) }}" class="card-img-top" alt="delete image" style="width: 100px; height: 40px;">

                                                <div class="card-body">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImageModal_{{ $item->id.'game' }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('Layouts.DeleteImageModel.DeleteImageModel', ['itemId' => $item->id.'game', 'deleteRoute' => route('delete_game_image', $item->id.'game')])
                                        @else
                                        <p>No image available</p>
                                        @endif
                                    </td>
                                    <td>

                                        @if($item->featured_game_Image_Url)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ url('skh/public/' . $item->featured_game_Image_Url) }}" class="card-img-top" alt="delete image" style="width: 100px; height: 40px;">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImageModal_{{ $item->id.'gamefeature' }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('Layouts.DeleteImageModel.DeleteImageModel', ['itemId' => $item->id.'gamefeature', 'deleteRoute' => route('delete_game_image', $item->id.'gamefeature')])
                                        @else
                                        <p>No image available</p>
                                        @endif
                                    </td>
                                    <td>{{ $item->short_description }}</td>
                                    <td>{{ $item->details }}</td>
                                    <td>
                                        <a href="top_games/{{ $item->id }}" class="btn btn-sm {{ $item->top_game ? 'btn-success' : 'btn-primary' }}">
                                            <i class="fas fa-star"></i>
                                            {{ $item->top_game ? 'Added' : 'Not Added' }}
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm {{ $item->featured_game ? 'btn-success' : 'btn-primary' }} featured-games-btn" data-toggle="modal" data-target="#featuredModal_{{ $item->id }}">
                                            <i class="fas fa-heart"></i>
                                            {{ $item->featured_game ? 'Added' : 'Not Added' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ url('edit_games_list/' . $item->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                        'modalId' => 'deleteConfirmationModal_' . $item->id,
                                        'deleteUrl' => url('delete_game_list', $item->id),
                                        ])
                                        @endcomponent
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteConfirmationModal_{{ $item->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @include('Layouts.FeaturedModelLayout.featuredModelLayout', [
                                'id' => $item->id,
                                'action' => url('featured_games/' . $item->id),
                                'inputName' => 'featured_game_Image_Url',
                                'submitButtonLabel' => 'Add Featured Games '
                                ])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $game->appends(['category_id' => Request::input('category_id')])->links('Pagination.default') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
