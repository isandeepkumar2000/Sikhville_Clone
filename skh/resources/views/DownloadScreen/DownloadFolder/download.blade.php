@extends('Layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h4>All Download Data</h4>
            <a href="{{ url('add_download_list') }}" class="btn btn-success">Add
            </a>
        </div>
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-4">
                    <form action="{{ route('downloadfolder') }}" method="GET">
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




            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Thumbnail Image</th>
                            <th>Featured Image</th>
                            <th>Short Description</th>
                            <th>Download Pdf Url</th>
                            <th>Featured</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($download as $item)
                        <tr>
                            <td>
                                @if (!empty($item->downloadcategoryDetails))
                                {{ $item->downloadcategoryDetails->name }}
                                @endif
                            </td>
                            <td>
                                @if (!empty($item->thumbnail_image))
                                <img src="{{ url('skh/public/' . $item->thumbnail_image) }}" alt="Thumbnail Image" width="80px" height="80px">
                                @else
                                <p>No Thumbnail available</p>
                                @endif
                            </td>

                            <td>
                                @if (!empty($item->featured_download_Image_Url))
                                <img src="{{ url('skh/public/' . $item->featured_download_Image_Url) }}" alt="Featured Image" width="80px" height="80px">
                                @else
                                <p>No featured image available</p>
                                @endif
                            </td>
                            <td>{{ $item->short_title }}</td>
                            <td>{{ $item->downloadpdf_url }}</td>
                            <td>
                                <button class="btn btn-sm {{ $item->featured_download ? 'btn-success' : 'btn-primary' }} featured-games-btn" data-toggle="modal" data-target="#featuredModal_{{ $item->id }}">
                                    <i class="fas fa-heart"></i>
                                    {{ $item->featured_download ? 'Added' : 'Not Added' }}
                                </button>
                            </td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <a href="{{ url('edit_download_list/' . $item->id) }}" class="btn btn-warning btn-sm me-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </td>
                            <td>
                                @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                'modalId' => 'deleteConfirmationModal_' . $item->id,
                                'deleteUrl' => url('delete_download_list', $item->id),
                                ])
                                @endcomponent
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmationModal_{{ $item->id }}">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </td>
                        </tr>
                        @include('Layouts.FeaturedModelLayout.featuredModelLayout', [
                        'id' => $item->id,
                        'action' => url('featured_download/' . $item->id),
                        'inputName' => 'featured_download_Image_Url',
                        'submitButtonLabel' => 'Add Featured Downlord '
                        ])
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $download->links('Pagination.default') }}
        </div>
    </div>
</div>
@endsection
