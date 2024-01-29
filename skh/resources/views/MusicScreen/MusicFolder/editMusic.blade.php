@extends('Layouts.master')

@section('content')
<<<<<<< HEAD
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
                    <form action="{{ url('update_music_list/' . $music->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="musicCategoriesid">Music </label>
                                <select class="form-control select2" name="musicCategoriesid" required id="musicCategoriesid">
                                    <option value="option_select">Choose a Music</option>
                                    @foreach ($musiccategories as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $music->musicCategoriesid) selected @endif>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3"> <label for="short_description">Title</label>
                                <input type="text" class="form-control" id="title" value="{{ $music->title }}" placeholder="Title" name="title" >
                            </div>
                            <div class="col-md-6">
                                <label for="thumbnail_image">Image URL</label>
                                <input type="file" class="form-control"  id="validationCustom02" placeholder="Image URL" value="{{ $music->thumbnail_image }}" name="thumbnail_image" >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="short_description">Short Description</label>
                                <input type="text" class="form-control" id="short_description" value="{{ $music->short_description }}" placeholder="Short Description" name="short_description">
=======
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
                        <form action="{{ url('update_music_list/' . $music->id) }}" method="POST"
                            enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" id="title" value="{{ $music->title }}"
                                        placeholder="Title" name="title">
                                </div>
                                <div class="col-md-6">
                                    <label for="thumbnail_image">Image URL</label>
                                    <input type="file" class="form-control" id="validationCustom02"
                                        placeholder="Image URL" value="{{ $music->thumbnail_image }}"
                                        name="thumbnail_image">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="short_description">Short Description</label>
                                    <input type="text" class="form-control" id="short_description"
                                        value="{{ $music->short_description }}" placeholder="Short Description"
                                        name="short_description">
                                </div>
>>>>>>> f5535b288f6a77c58b640c8d6e21888fa4bab59b
                            </div>
                            <button type="submit" class="btn btn-primary">Update Music</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
