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
                        <h4>Edit & Update Downlord Category
                            <a href="{{ url('download_categories_list') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update_download_categories_list/' . $downlordCategories->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">Categories Name</label>
                                <input type="text" name="name" value="{{ $downlordCategories->name }}"
                                    class="form-control" required>
                            </div>


                            <div class="form-group col-md-3">
                                <label for="downlord_categories_icons">Icons </label>
                                <input type="file" class="form-control" required id="validationCustom02"
                                    placeholder="Image URL" value="{{ $downlordCategories->downlord_categories_icons }}"
                                    name="downlord_categories_icons" required>
                            </div>


                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update Downlord
                                    Category</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
