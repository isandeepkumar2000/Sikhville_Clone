@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Add Punjabi Reading Category Here</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add_post_punjabi_reading_categories_list') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Punjabi Reading
                                    Category</label>
                                <input type="text" name="name" class="form-control" required
                                    id="name" placeholder="Name">
                            </div>

                            <div class="mb-3">
                                <label for="thumbnail_image" class="form-label">Thumbnail Image</label>
                                <input type="text" name="thumbnail_ishort_image" class="form-control"
                                    required id="thumbnail_image" placeholder="Thumbnail Image">
                            </div>

                            <div class="mb-3">
                                <label for="reading_title" class="form-label">Reading Title</label>
                                <input type="text" name="reading_title" class="form-control" required
                                    id="reading_title" placeholder="Reading Title">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection