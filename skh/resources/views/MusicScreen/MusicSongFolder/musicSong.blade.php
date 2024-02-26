@extends('Layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <form action="{{ route('musicSong') }}" method="GET">
                            <div class="input-group">
                                <select name="category_id" class="form-select">
                                    <option value="all" {{ Request::input('category_id') == 'all' ? 'selected' : '' }}>
                                        <i class="fas fa-globe"></i> All Categories
                                    </option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ Request::input('category_id') == $category->id ? 'selected' : '' }}>
                                        <i class="fas fa-folder"></i> {{ $category->title }}
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
                    <h4>All Music Songs List</h4>
                    <a href="{{ url('add_music_song_list') }}" class="btn btn-light">Add </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Albums</th>
                                    <th>Song Name</th>
                                    <th>Song Size</th>
                                    <th>Song Path</th>
                                    <th>Song Duration</th>
                                    <th>Music Composers</th>
                                    <th>Music Lyrics</th>
                                    <th>Music Artist Name</th>
                                    <th>Music Song Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($musicSong as $item)
                                <tr>
                                    <td>
                                        @if (!empty($item->musicfolderDetails))
                                        {{ $item->musicfolderDetails->title }}
                                        @endif
                                    </td>
                                    <td>{{ $item->song_name }}</td>
                                    <td>{{ $item->song_size }}</td>
                                    <td>
                                        @if (!empty($item->song_path))
                                        <div class="audio-player">
                                            <audio controls>
                                                <source src="{{ url($item->song_path) }}" type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        </div>
                                        @else
                                        <p>No song available.</p>
                                        @endif
                                    </td>
                                    <td>{{ $item->song_duration }}</td>
                                    <td>{{ $item->music_composers_by }}</td>
                                    <td>{{ $item->music_lyrics_by }}</td>
                                    <td>{{ $item->music_artists_name }}</td>
                                    <td>
                                        @if($item->music_song_details_image)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ url('skh/public/' . $item->music_song_details_image) }}" class="card-img-top" alt="delete image" style="width: 200px; height: 80px;">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImageModal_{{ $item->id.'musicSong' }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('Layouts.DeleteImageModel.DeleteImageModel', ['itemId' => $item->id.'musicSong', 'deleteRoute' => route('delete_music_song_image', $item->id.'musicSong')])
                                        @else
                                        <p>No image available</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('edit_music_song_list/' . $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </td>
                                    <td>
                                        @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                        'modalId' => 'deleteConfirmationModal_' . $item->id,
                                        'deleteUrl' => url('delete_music_song_list', $item->id),
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
                    {{ $musicSong->appends(['category_id' => Request::input('category_id')])->links('Pagination.default') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
