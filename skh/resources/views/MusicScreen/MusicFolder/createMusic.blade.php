@extends('Layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Add Music Here</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('add_post_music_list') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="musicCategoriesid">Music </label>
                                <select class="form-control select2" name="musicCategoriesid" required id="musicCategoriesid">
                                    <option value="option_select" disabled selected>Choose the Music
                                    </option>
                                    @foreach ($music as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="short_description">Title</label>
                                <input type="text" class="form-control" required id="title" placeholder="Title" name="title" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="featuredGameImage">Upload Image:</label>
                                <input type="file" class="form-control-file" id="thumbnail_image" name="thumbnail_image" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="short_description">Short Description</label>
                                <input type="text" class="form-control" required id="short_description" placeholder="Short Description" name="short_description" required>
                            </div>
                        </div>
                        <button style="margin-top: 10px" class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
