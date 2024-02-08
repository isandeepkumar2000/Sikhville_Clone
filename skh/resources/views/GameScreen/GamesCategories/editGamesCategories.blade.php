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
                        Edit & Update Games Category
                        <a href="{{ url('games_categories_list') }}" class="btn btn-danger">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update_games_categories_list/' . $gameCategories->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Game Name</label>
                            <input type="text" id="name" name="name" value="{{ $gameCategories->name }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="games_logo" class="form-label"> Game Logo</label>
                            <input type="text" id="games_logo" name="games_logo" value="{{ $gameCategories->games_logo }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
