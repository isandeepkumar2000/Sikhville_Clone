@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit and Update Download Category
                            <a style="margin-left: 45%" href="{{ url('add_download_categories_list') }}"
                                class="btn btn-primary float-end">Add
                                Categories</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Icons</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($downlordCategories as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->downlord_categories_icons }}</td>
                                        <td>
                                            <a href="{{ url('edit_download_categories_list/' . $item->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                                'modalId' => 'deleteConfirmationModal_' . $item->id,
                                                'deleteUrl' => url('delete_download_categories_list', $item->id),
                                            ])
                                            @endcomponent
                                            <button type="button" class="btn btn-outline-danger"
                                                data-toggle="modal"
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
@endsection