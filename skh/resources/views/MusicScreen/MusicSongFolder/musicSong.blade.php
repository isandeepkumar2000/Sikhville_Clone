@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Edit and Update Music Song

                        </h4>
                        <a href="{{ url('add_music_song_list') }}" class="btn btn-primary float-end">Add
                            Music Song</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Song Name</th>
                                        <th>Song Size</th>
                                        <th>Song Path</th>
                                        <th>Song Duration</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($musicSong as $item)
                                        <tr>
                                            <td>{{ $item->song_name }}</td>
                                            <td>{{ $item->song_size }}</td>
                                            <td>{{ $item->song_path }}</td>
                                            <td>{{ $item->song_duration }}</td>
                                            <td>
                                                <a href="{{ url('edit_music_song_list/' . $item->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </td>
                                            <td>
                                                @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                                    'modalId' => 'deleteConfirmationModal_' . $item->id,
                                                    'deleteUrl' => url('delete_music_song_list', $item->id),
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
        </div>
    </div>
@endsection