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
                        <h4>Add Category Here</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('add_post_download_categories_list') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Icons</label>
                                <input type="text" name="downlord_categories_icons" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Save Student</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
