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
                        <h4>Add Support Review Content</h4>
                        <a href="{{ url('support_review_list') }}" class="btn btn-danger">BACK</a>
                    </div>
                    <div class="card-body">
                 <form action="{{ url('add_post_support_review_list') }}" method="POST">

                            @csrf

                            <div class="form-group mb-3">
                                <label for="slug">Person Name</label>
                                <input type="text" name="person_name" class="form-control"  id="person_name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="title">Country Name</label>
                                <input type="text" name="country_name" class="form-control"  id="country_name">
                            </div>
                             <div class="form-group mb-3">
                                <label for="description">Review Description</label>
                                <input type="text" name="review_description" class="form-control"  id="review_description">
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
