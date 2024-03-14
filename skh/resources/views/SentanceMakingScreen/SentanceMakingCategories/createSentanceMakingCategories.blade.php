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
                        <h4>Add Santance Making Here</h4>
                    </div>
                    <div class="card-body">
 
                        <form action="{{ url('add_post_sentance_making_categories_list') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="">Name
                                    </label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                             <div class="form-group mb-3">
                                <label for="">Game Link
                                    </label>
                                <input type="text" name="game_play_link" class="form-control" required>
                            </div>
                             <div class="form-group md-3">
                                <label for="featuredGameImage">Upload Image:</label>
                                <input type="file" class="form-control-file" id="thumbnail_image" name="thumbnail_image"
                                    required>
                            </div>
                             <div class="form-group mb-3">
                                <label for="">Long Description 
                                    </label>
                                <input type="text" name="long_description" class="form-control" required>
                            </div>
                             <div class="form-group mb-3">
                                <label for="">Short Description 
                                    </label>
                                <input type="text" name="short_description" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Save
                                    Sentance</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection