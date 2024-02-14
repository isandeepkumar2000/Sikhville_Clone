@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4>All Download Category</h4>
                        <a href="{{ url('add_download_categories_list') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add
                        </a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
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
                                            <td>
                                                @if (!empty($item->downlord_categories_icons))
                                                    <img src="{{ url('skh/public/' . $item->downlord_categories_icons) }}"
                                                        alt="Thumbnail Image" width="60px" height="60px">
                                                @else
                                                    <p>No Thumbnail available</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('edit_download_categories_list/' . $item->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                                    'modalId' => 'deleteConfirmationModal_' . $item->id,
                                                    'deleteUrl' => url('delete_download_categories_list', $item->id),
                                                ])
                                                @endcomponent
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteConfirmationModal_{{ $item->id }}">
                                                    <i class="fas fa-trash-alt"></i> Delete
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
