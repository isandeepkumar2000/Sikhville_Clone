@extends('Layouts.master')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>All Dynamic Page 

                    </h4>
                    <a href="{{ url('add_dynamic_page_list') }}" class="btn btn-primary float-end">Add 
                        </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Slug</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Body</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dynamicpagecontent as $item)
                                <tr>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->body }}</td>
                                    <td>
                                        <a href="{{ url('edit_dynamic_page_list/' . $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                      <td>
                                        <!-- Delete confirmation modal -->
                                        @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                        'modalId' => 'deleteConfirmationModal_' . $item->id,
                                        'deleteUrl' => url('delete_dynamic_page_list', $item->id),
                                        ])
                                        @endcomponent
                                        <!-- Button to trigger delete confirmation modal -->
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteConfirmationModal_{{ $item->id }}">
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
