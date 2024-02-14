@extends('Layouts.master')

@section('content')
<div class = "container">
<div class = "row">
<div class = "col-md-12">
<div class = "card">
<div class = "card-header d-flex justify-content-between align-items-center">
                    <h4>All Music Category

                    </h4>
                    <a href="{{ url('add_music_categories_list') }}" class="btn btn-primary float-end">Add
                         </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Music Category</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($musicCategories as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ url('edit_music_categories_list/' . $item->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                        'modalId' => 'deleteConfirmationModal_' . $item->id,
                                        'deleteUrl' => url('delete_music_categories_list', $item->id),
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
