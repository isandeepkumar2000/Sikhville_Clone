@extends('Layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <form action="{{ route('sentancemakingFolder') }}" method="GET">
                            <div class="input-group">
                                <select name="category_id" class="form-select">
                                    <option value="all" {{ Request::input('category_id') == 'all' ? 'selected' : '' }}>
                                        <i class="fas fa-globe"></i> All Categories
                                    </option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ Request::input('category_id') == $category->id ? 'selected' : '' }}>
                                        <i class="fas fa-folder"></i> {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-header">
                    <h4 class="d-flex justify-content-between align-items-center">
                        Edit and Update Sentence Making
                        <a href="{{ url('add_sentence_making_list') }}" class="btn btn-primary">Add
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Video Game Play</th>
                                    <th>Thumbnail Image Url</th>
                                    <th>Sentence Making Vismaad Title</th>
                                    <th>Short Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sentancemaking as $item)
                                <tr>
                                    <td>
                                        @if (!empty($item->sentancemakingCategoryDetails))
                                        {{ $item->sentancemakingCategoryDetails->name }}
                                        @endif
                                    </td>
                                    <td>{{ $item->video_game_play }}</td>
                                    <td>{{ $item->thumbnail_image }}</td>
                                    <td>{{ $item->sentance_making_vismaad_title }}</td>
                                    <td>{{ $item->short_description }}</td>
                                    <td>
                                        <a href="{{ url('edit_sentance_making_list/' . $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                        'modalId' => 'deleteConfirmationModal_' . $item->id,
                                        'deleteUrl' => url('delete_sentance_making_list', $item->id),
                                        ])
                                        @endcomponent
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteConfirmationModal_{{ $item->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $sentancemaking->appends(['category_id' => Request::input('category_id')])->links('Pagination.default') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
