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
                    <h4>Add Video Category Here</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('add_post_video_categories_list') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Video Category</label>
                            <input type="text" name="name" placeholder="Please write category name " class="form-control" required>

                        </div>

                        <div class="form-group mb-3">
                            <label for="">Category Shortcut Name</label>
                            <input type="text" name="sku" class="form-control" placeholder="Please write sandeep_kumar_vismaad in that format " required>
                        </div>


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
