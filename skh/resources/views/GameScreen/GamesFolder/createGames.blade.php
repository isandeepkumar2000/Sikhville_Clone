@extends('Layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <h4 class="m-0">Add Game Here</h4>
                    <a href="{{ url('games_list') }}" class="btn btn-danger">BACK</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('add_post_games_list') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <select class="js-states form-control select2" name="gameCategoriesid" required
                                id="shopping_id">
                                <option value="option_select" disabled selected>Choose the Game</option>
                                @foreach ($game as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="featuredGameImage">Upload Image:</label>
                                <input type="file" class="form-control-file" id="thumbnail_image" name="thumbnail_image"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="validationCustom03">Short Description</label>
                                <input type="text" class="form-control" required id="validationCustom03"
                                    placeholder="Short Description" name="short_description" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textAreaExample1">Details</label>
                            <textarea class="form-control" required id="textAreaExample1" rows="4"
                                name="details"></textarea>
                        </div>
                        <button class = "btn btn-primary" type = "submit">Save </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
