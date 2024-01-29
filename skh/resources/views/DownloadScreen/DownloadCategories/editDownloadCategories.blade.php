@extends('Layouts.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8"> <!-- Adjust the column width based on your preference -->

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h4 class="m-0">Edit & Update Download Category</h4>
                        <a href="{{ url('download_categories_list') }}" class="btn btn-danger">BACK</a>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update_download_categories_list/' . $downlordCategories->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" name="name" value="{{ $downlordCategories->name }}"
                                    class="form-control" required>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="downlord_categories_icons">Upload
                                    Icons:</label>
                                <input type="file" class="form-control-file" id="downlord_categories_icons"
                                    name="downlord_categories_icons" required
                                    value="{{ $downlordCategories->downlord_categories_icons }}">
                            </div>



                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Update Download Category</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
