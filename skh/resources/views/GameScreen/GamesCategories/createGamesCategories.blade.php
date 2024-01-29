@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-info text-white">
                        <h4>Add Games Category Here</h4>
                        <a href="{{ url('games_categories_list') }}" class="btn btn-danger">BACK</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add_post_games_categories_list') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Game Name</label>
                                <input type="text" name="name" class="form-control" required id="name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="games_logo">Game Logo</label>
                                <input type="text" name="games_logo" class="form-control" required id="games_logo">
                            </div>

                            <div class="form-group mb-3 text-end">
                                <button type="submit" class="btn btn-primary btn-custom">Save Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
