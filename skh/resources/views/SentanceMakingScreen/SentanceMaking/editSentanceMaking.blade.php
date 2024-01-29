@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Sentance Making
                            <a href="{{ url('sentance_making_list') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update_sentance_making_list/' . $sentancemaking->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="musicCategoriesid">Music </label>
                                    <select class="form-control select2" name="sentancemakingCategoriesid" required
                                        id="sentancemakingCategoriesid">
                                        <option value="option_select">Choose a Sentance Making</option>
                                        @foreach ($sentancemakingcategories as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $sentancemaking->sentancemakingCategoriesid) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3"> <label for="short_description">Video Game
                                        Play</label>
                                    <input type="text" class="form-control" required id="video_game_play"
                                        value="{{ $sentancemaking->video_game_play }}" placeholder="Title"
                                        name="video_game_play" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="thumbnail_image">Thumbnail Image Url</label>
                                    <input type="text" class="form-control" required id="thumbnail_image"
                                        value="{{ $sentancemaking->thumbnail_image }}" placeholder="Image Url"
                                        name="thumbnail_image" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="short_description">Sentance Making Title</label>
                                    <input type="text" class="form-control" required id="sentance_making_vismaad_title"
                                        value="{{ $sentancemaking->sentance_making_vismaad_title }}"
                                        placeholder="Short Description" name="sentance_making_vismaad_title" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="short_description">Short Description</label>
                                    <input type="text" class="form-control" required id="short_description"
                                        value="{{ $sentancemaking->short_description }}" placeholder="Short Description"
                                        name="short_description" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Sentance Making</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
