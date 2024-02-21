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
                    <h4>Edit & Update Video Category
                        <a href="{{ url('video_categories_list') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update_video_categories_list/' . $videoCategories->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">Video Category</label>
                            <input type="text" name="name" placeholder="Please write category name " value="{{ $videoCategories->name }}" class="form-control">

                        </div>

                        <div class="form-group mb-3">
                            <label for="">Category Shortcut Name</label>
                            <input type="text" name="sku" class="form-control" value="{{ $videoCategories->sku }}" placeholder="Please write sandeep_kumar_vismaad in that format " required>
                        </div>


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
