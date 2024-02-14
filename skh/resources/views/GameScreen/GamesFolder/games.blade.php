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
                                        @if (!empty($item->thumbnail_image))
                                        <img src="{{ url('skh/public/' . $item->thumbnail_image) }}" alt="Thumbnail Image" width="80px" height="80px">
                                        @else
                                        <p>No Thumbnail available</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($item->featured_game_Image_Url))
                                        <img src="{{ url('skh/public/' . $item->featured_game_Image_Url) }}" alt="Featured Image" width="80px" height="80px">
                                        @else
                                        <p>No featured image available</p>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
