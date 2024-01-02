@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Add Sentance Making Here</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add_post_sentance_making_list') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="sentancemakingCategoriesid">Sentance Making</label>
                                    <select class="form-control select2" name="sentancemakingCategoriesid"
                                        required id="sentancemakingCategoriesid">
                                        <option value="option_select" disabled selected>Choose the Sentance
                                            Making
                                        </option>
                                        @foreach ($sentancemaking as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="short_description">Video Game Play</label>
                                    <input type="text" class="form-control" required id="video_game_play"
                                        placeholder="Video Game Play" name="video_game_play" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="thumbnail_image">thumbnail Image URL</label>
                                    <input type="text" class="form-control" required id="thumbnail_image"
                                        placeholder="Image URL" name="thumbnail_image" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="sentance_making_vismaad_title">Sentance Making Title
                                    </label>
                                    <input type="text" class="form-control" required
                                        id="sentance_making_vismaad_title" placeholder="Short Description"
                                        name="sentance_making_vismaad_title" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="short_description">Short Description
                                    </label>
                                    <input type="text" class="form-control" required
                                        id="short_description" placeholder="Short Description"
                                        name="short_description" required>
                                </div>
                            </div>
                            <button style="margin-top: 10px" class="btn btn-primary" type="submit">Submit
                                Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection