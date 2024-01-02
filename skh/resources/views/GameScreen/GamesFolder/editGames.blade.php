@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Edit & Update</h4>
                        <a href="{{ url('games_list') }}" class="btn btn-danger">BACK</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update_games_list/' . $game->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label for="shopping_id">Select Game</label>
                                    <select class="form-control select2" name="gameCategoriesid" required
                                        id="gameCategoriesid">
                                        <option value="option_select">Choose a Game</option>
                                        @foreach ($gamecategories as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $game->gameCategoriesid) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="thumbnail_image">Image URL</label>
                                    <input type="file" class="form-control" required
                                        id="validationCustom02" placeholder="Image URL"
                                        value="{{ $game->thumbnail_image }}" name="thumbnail_image"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom03">Short Description</label>
                                    <input type="text" class="form-control" required
                                        id="validationCustom03" value="{{ $game->short_description }}"
                                        placeholder="Short Description" name="short_description" required>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="textAreaExample1">Details</label>
                                <textarea class="form-control" required id="textAreaExample1" rows="4" name="details">{{ $game->details }}</textarea>
                            </div>
                            <div class="form-group mb-3 d-flex justify-content-between">

                                <button type="submit" class="btn btn-primary">Update Game</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection