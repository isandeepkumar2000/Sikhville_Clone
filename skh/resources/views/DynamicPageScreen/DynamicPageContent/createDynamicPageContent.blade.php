@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class = "card">
                <div class = "card-header d-flex justify-content-between align-items-center bg-info text-white">
                        <h4>Add Dynamic Page Content</h4>
                        <a href="{{ url('dynamic_page_list') }}" class="btn btn-danger">BACK</a>
                    </div>
                    <div class="card-body">
                 <form action="{{ url('add_post_dynamic_page_list') }}" method="POST">

                            @csrf

                            <div class="form-group mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control"  id="slug">
                            </div>
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control"  id="title">
                            </div>
                             <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control"  id="description">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="body">Body</label>
                                <input type="text" name="body" class="form-control"  id="body">
                            </div>
                            <div class="form-group mb-3 text-end">
                                <button type="submit" class="btn btn-primary btn-custom">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
