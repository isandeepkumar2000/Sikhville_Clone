@extends('Layouts.master')

@section('content')
<div class="container-fluid">
    <div class="column">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Edit and Update Video Data
                    </h4>
                    <a href="{{ url('add_video_list') }}" class="btn btn-primary float-end">
                        <i class="fas fa-plus-circle me-1"></i>Add Video Category
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Thumbnail Image Url</th>
                                    <th>Highlighting Image Url</th>
                                    <th>Featured Video Url</th>
                                    <th>Youtube Video Url </th>
                                    <th>Donating Link </th>
                                    <th>PlayNow Link </th>
                                    <th>Start Quiz Easy Link </th>
                                    <th>Start Quiz Hard Link </th>
                                    <th>Download Pdf Link </th>
                                    <th>Highlighting video Duration</th>
                                    <th>Details</th>
                                    <th>Top Video</th>
                                    <th>Featured Video</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($video as $item)
                                <tr>
                                    <td>
                                        @if (!empty($item->videoCategoryDetails))
                                        {{ $item->videoCategoryDetails->name }}
                                        @endif
                                    </td>
                                    <td>{{ $item->short_description }}</td>
                                    <td>
                                        @if (!empty($item->thumbnail_image))
                                        <img src="{{ url('skh/public/' . $item->thumbnail_image) }}" alt="thumbnail image Image" width="100px" height="100px">
                                        @else
                                        <p>Thumbnail image available</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($item->highlighting_video_Image))
                                        <img src="{{ url('skh/public/' . $item->highlighting_video_Image) }}" alt="highlighting Video Image" width="100px" height="100px">
                                        @else
                                        <p>highlighting Video image available</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($item->featured_video_Image_Url))
                                        <img src="{{ url('skh/public/' . $item->featured_video_Image_Url) }}" alt="Featured Video Image" width="100px" height="100px">
                                        @else
                                        <p>youtube image available</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($item->youtube_video_url))
                                        <iframe width="100" height="100" src="https://www.youtube.com/embed/{{ $item->youtube_video_url }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        @else
                                        <p>Invalid YouTube video URL</p>
                                        @endif
                                    </td>

                                    <td>{{ $item->donating_link }}</td>
                                    <td>{{ $item->playnow_link }}</td>
                                    <td>{{ $item->startquiz_easy }}</td>
                                    <td>{{ $item->startquiz_hard }}</td>
                                    <td>{{ $item->downloadpdf_link }}</td>
                                    <td>{{ $item->video_duration }}</td>

                                    <td style=" display: block;width: 100px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis">
                                        {{ $item->details }}</td>
                                    <td>
                                        <a href="top_video/{{ $item->id }}" class="btn btn-sm btn-{{ $item->top_video ? 'success' : 'primary' }}">
                                            <i class="fas fa-video me-1" style="margin-right: 2px;"></i>{{ $item->top_video ? 'Added' : 'Not Added' }}
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-{{ $item->featured_video ? 'success' : 'primary' }} featured-games-btn" data-toggle="modal" data-target="#featuredModal_{{ $item->id }}">
                                            <i class="fas fa-star me-1" style="margin-right: 2px;"></i>{{ $item->featured_video ? 'Added' : 'Not Added' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ url('edit_video_list/' . $item->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit me-1"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                        'modalId' => 'deleteConfirmationModal_' . $item->id,
                                        'deleteUrl' => url('delete_video_list', $item->id),
                                        ])
                                        @endcomponent
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteConfirmationModal_{{ $item->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>

                                @include('Layouts.FeaturedModelLayout.featuredModelLayout', [
                                'id' => $item->id,
                                'action' => url('featured_video/' . $item->id),
                                'inputName' => 'featured_video_Image_Url',
                                'submitButtonLabel' => 'Add Featured Video '
                                ])
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
