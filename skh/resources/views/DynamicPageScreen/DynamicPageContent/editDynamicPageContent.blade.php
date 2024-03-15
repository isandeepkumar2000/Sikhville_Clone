@extends('Layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="d-flex justify-content-between align-items-center">
                        Edit & Update Dynamic Page
                        <a href="{{ url('dynamic_page_list') }}" class="btn btn-danger">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update_dynamic_page_list/' . $dynamicpagecontent->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                       <div class="form-group mb-3">
                                <label for="name">Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ $dynamicpagecontent->slug }}" readonly  id="slug">
                            </div>
                          
                            <div class="form-group mb-3">
                                <label for="games_title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $dynamicpagecontent->title }}"   id="title">
                            </div>
                              <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" value="{{ $dynamicpagecontent->description }}"  id="description">
                            </div>
                            <div class="form-group mb-3">
                                <label for="games_body">Body</label>
                                <input type="text" name="body" class="form-control"  value="{{ $dynamicpagecontent->body }}"  id="body">
                            </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
