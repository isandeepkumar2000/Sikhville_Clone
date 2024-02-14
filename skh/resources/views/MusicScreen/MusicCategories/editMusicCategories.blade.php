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
                    <h4>Edit & Update Music Category
                        <a href="{{ url('music_categories_list') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update_music_categories_list/' . $musicCategories->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">Music Category Name</label>
                            <input type="text" name="name" value="{{ $musicCategories->name }}" class="form-control"
                                >
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
