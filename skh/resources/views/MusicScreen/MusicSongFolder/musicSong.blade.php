@extends('Layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h4>All Music Songs</h4>
                        <a href="{{ url('add_music_song_list') }}" class="btn btn-light">Add Music Songs</a>
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


                                            <td>
                                                @if (!empty($item->music_song_details_image))
                                                    <img src="{{ url('skh/public/' . $item->music_song_details_image) }}"
                                                        alt="Thumbnail Image" class="img-thumbnail" width="100px"
                                                        height="100px">
                                                @else
                                                    <p class="text-muted">No Music Song Image available</p>
                                                @endif
                                            </td>


                                            <td>
                                                <a href="{{ url('edit_music_song_list/' . $item->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                                    'modalId' => 'deleteConfirmationModal_' . $item->id,
                                                    'deleteUrl' => url('delete_music_song_list', $item->id),
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
