@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                <div class="card">
                      <div class="card-header d-flex justify-content-between align-items-center bg-info text-white">
                    <h4 class="m-0">Edit & Update Sentance</h4>
                    <a href="{{ url('sentance_making_categories_list') }}" class="btn btn-danger">BACK</a>
                </div>
                     <div class="card-body">
                      <form action="{{ url('update_sentance_making_categories_list/' . $sentancemakingCategories->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="">Name
                                    </label>
                                <input type="text" name="name" class="form-control"  value = "{{ $sentancemakingCategories->name }}">
                            </div>
                            
 <div class="form-group mb-3">
                                <label for=""> Title
                                    </label>
                                <input type="text" name="title" class="form-control"  value = "{{ $sentancemakingCategories->title }}">
                            </div>


                             <div class="form-group mb-3">
                                <label for="">Game Link
                                    </label>
                                <input type="text" name="game_play_link" class="form-control"  value = "{{ $sentancemakingCategories->game_play_link }}">
                            </div>
                             <div class="form-group md-3">
                                <label for="featuredGameImage">Upload Image:</label>
                                <input type="file" class="form-control-file" id="thumbnail_image" name="thumbnail_image"
                                    value = "{{ $sentancemakingCategories->thumbnail_image }}">
                            </div>
                             <div class="form-group mb-3">
                                <label for="">Long Description
                                    </label>
                                <input type="text" name="long_description" class="form-control" value = "{{ $sentancemakingCategories->long_description }}">
                            </div>
                             <div class="form-group mb-3">
                                <label for="">Short Description
                                    </label>
                                <input type="text" name="short_description" class="form-control" value = "{{ $sentancemakingCategories->short_description }}">
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
