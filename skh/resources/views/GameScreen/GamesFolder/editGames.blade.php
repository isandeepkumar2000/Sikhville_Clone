@extends('Layouts.master')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center bg-info text-white">
                    <h4 class="m-0"><i class="fas fa-edit"></i> Edit & Update Games</h4>
                    <a href="{{ url('games_list') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> BACK</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('update_games_list/' . $game->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="gameCategoriesid">Select Game</label>
                            <select class="form-control select2" name="gameCategoriesid" required id="gameCategoriesid">
                                <option value="option_select">Choose a Game</option>
                                @foreach ($gamecategories as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $game->gameCategoriesid) selected
                                    @endif>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail_image">Image URL</label>
                            <input type="file" class="form-control" id="validationCustom02" placeholder="Image URL" value="{{ $game->thumbnail_image }}" name="thumbnail_image">
                        </div>
                        <div class="form-group">
                            <label for="validationCustom03">Short Description</label>
                            <input type="text" class="form-control" id="validationCustom03" value="{{ $game->short_description }}" placeholder="Short Description" name="short_description">
                        </div>
                        <div class="form-group">
                            <label for="validationCustom03">Game Link</label>
                            <input type="text" class="form-control" id="validationCustom03" value="{{ $game->games_link }}" placeholder="Games Link" name="games_link">
                        </div>
                        <div class="form-group">
                            <label for="textAreaExample1">Details</label>
                            <textarea class="form-control" id="textAreaExample1" rows="4" name="details">{{ $game->details }}</textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i> Update</button>
                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
