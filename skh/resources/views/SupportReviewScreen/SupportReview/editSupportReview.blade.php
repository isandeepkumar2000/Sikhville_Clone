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
                        <a href="{{ url('support_review_list') }}" class="btn btn-danger">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update_support_review_list/' . $supportreview->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                       <div class="form-group mb-3">
                                <label for="name">Person Name</label>
                                <input type="text" name="person_name" class="form-control" value="{{ $supportreview->person_name }}"   id="person_name">
                            </div>
                          
                            <div class="form-group mb-3">
                                <label for="games_title">Country Name</label>
                                <input type="text" name="country_name" class="form-control" value="{{ $supportreview->country_name }}"   id="country_name">
                            </div>
                              <div class="form-group mb-3">
                                <label for="description">Review Description</label>
                                <input type="text" name="review_description" class="form-control" value="{{ $supportreview->review_description }}"  id="review_description">
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
