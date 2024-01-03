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
                        <h4>Add Category Here</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('add_post_download_categories_list') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="downlord_categories_icons">Upload
                                    Icons:</label>
                                <input type="file" class="form-control-file" id="downlord_categories_icons"
                                    name="downlord_categories_icons" required>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Save Download Categories</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
