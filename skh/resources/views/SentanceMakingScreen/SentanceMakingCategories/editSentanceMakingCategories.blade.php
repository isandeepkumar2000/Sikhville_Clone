@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Sentance Making Category
                            <a href="{{ url('sentance_making_categories_list') }}"
                                class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form
                            action="{{ url('update_sentance_making_categories_list/' . $sentancemakingCategories->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">Categories Name</label>
                                <input type="text" name="name"
                                    value="{{ $sentancemakingCategories->name }}" class="form-control"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection