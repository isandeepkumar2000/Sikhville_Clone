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
                        <h4>Edit & Update Music
                            <a href="{{ url('music_list') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update_music_list/' . $music->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="musicCategoriesid">Music </label>
                                    <select class="form-control select2" name="musicCategoriesid" required
                                        id="musicCategoriesid">
                                        <option value="option_select">Choose a Music</option>
                                        @foreach ($musiccategories as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $music->musicCategoriesid) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3"> <label for="short_description">Title</label>
                                    <input type="text" class="form-control" required id="title"
                                        value="{{ $music->title }}" placeholder="Title" name="title" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="thumbnail_image">Image Url</label>
                                    <input type="text" class="form-control" required id="thumbnail_image"
                                        value="{{ $music->thumbnail_image }}" placeholder="Image Url" name="thumbnail_image"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="short_description">Short Description</label>
                                    <input type="text" class="form-control" required id="short_description"
                                        value="{{ $music->short_description }}" placeholder="Short Description"
                                        name="short_description" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Music</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
