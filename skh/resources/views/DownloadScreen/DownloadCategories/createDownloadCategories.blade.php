@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h4 class="m-0">Add Category Here</h4>
                        <a href="{{ url('download_categories_list') }}" class="btn btn-danger">BACK</a>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('add_post_download_categories_list') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="downlord_categories_icons" class="form-label">Upload Icons</label>
                                <input type="file" class="form-control-file" id="downlord_categories_icons"
                                    name="downlord_categories_icons" required>
                            </div>

                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Save Download Categories</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
