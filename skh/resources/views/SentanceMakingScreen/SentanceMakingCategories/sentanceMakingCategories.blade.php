@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">
    All Categories
                        <a style="margin-left: 35px" href="{{ url('add_sentance_making_categories_list') }}"
                            class="btn btn-primary float-end">Add
                            </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                              <th>Game Link</th>
                                               <th>Title</th>
                                                    <th>Image</th>
                                                          <th>Long Description</th>
                                                                <th>Short Description</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sentancemakingCategories as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                             <td>{{ $item->title }}</td>
                                             <td>{{ $item->game_play_link }}</td>
                                           <td>
                                        @if($item->thumbnail_image)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ url('skh/public/' . $item->thumbnail_image) }}" class="card-img-top" alt="delete image" style="width: 200px; height: 80px;">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImageModal_{{ $item->id }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('Layouts.DeleteImageModel.DeleteImageModel', ['itemId' => $item->id, 'deleteRoute' => route('delete_image', $item->id)])
                                        @else
                                        <p>No featured image available</p>
                                        @endif
                                    </td>
                                               <td>{{ $item->long_description }}</td>
                                                <td>{{ $item->short_description }}</td>
                                            <td>
                                                <a href="{{ url('edit_sentance_making_categories_list/' . $item->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </td>
                                            <td>
                                                @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                                    'modalId' => 'deleteConfirmationModal_' . $item->id,
                                                    'deleteUrl' => url('delete_sentance_making_categories_list', $item->id),
                                                ])
                                                @endcomponent
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                    data-target="#deleteConfirmationModal_{{ $item->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

