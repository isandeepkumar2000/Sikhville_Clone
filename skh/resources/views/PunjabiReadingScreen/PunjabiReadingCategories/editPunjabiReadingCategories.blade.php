@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="d-flex justify-content-between align-items-center">
                            Edit & Update Punjabi Reading Category
                            <a href="{{ url('punjabi_reading_categories_list') }}"
                                class="btn btn-danger">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form
                            action="{{ url('update_punjabi_reading_categories_list/' . $punjabireadingCategories->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" id="category_name" name="name"
                                    value="{{ $punjabireadingCategories->name }}" class="form-control"
                                    required placeholder="Enter Category Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="thumbnail_image" class="form-label">Thumbnail Image</label>
                                <input type="text" id="thumbnail_image" name="thumbnail_ishort_image"
                                    value="{{ $punjabireadingCategories->thumbnail_ishort_image }}"
                                    class="form-control" required placeholder="Enter Thumbnail Image URL"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="reading_title" class="form-label">Reading Title</label>
                                <input type="text" id="reading_title" name="reading_title"
                                    value="{{ $punjabireadingCategories->reading_title }}"
                                    class="form-control" required placeholder="Enter Reading Title"
                                    required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Punjabi Reading
                                    Category</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection