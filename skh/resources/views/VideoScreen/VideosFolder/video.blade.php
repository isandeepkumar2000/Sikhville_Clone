@extends('Layouts.master')

@section('content')
<div class="container-fluid">

    <div class="column">
        <div class="col-md-12">
            @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>All Video List
                    </h4>
                    <a href="{{ url('add_video_list') }}" class="btn btn-primary float-end">
                        <i class="fas fa-plus-circle me-1"></i>Add
                    </a>
                </div>
                <div class = "card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Category Name
                                    </th>
                                    <th>Short Description </th>
                                    <th>Thumbnail Image </th>
                                    <th>Highlighting Image </th>
                                    <th>Highlighting Second Image </th>
                                    <th>Top Video Image </th>
                                    <th>Middle Video Image </th>
                                    <th>Bottom Video Image </th>
                                    <th>Youtube Video </th>
                                    {{-- <th>PlayNow Youtube Link </th> --}}
                                    <th>Start Quiz Easy Link </th>
                                    <th>Start Quiz Hard Link </th>
                                    <th>Download Pdf Link </th>
                                    <th>Move of the Year Text </th>
                                    <th>Video Release Type </th>
                                    <th>Film Certificate Ratings </th>
                                    <th>Video Music </th>
                                    <th>Video Singer </th>
                                    <th>Video Lyrics </th>
                                    <th>Video Quality In </th>
                                    <th>Video Genre By </th>
                                    <th>Video Dimension Type </th>
                                    <th>Video Duration </th>
                                    <th>Full Video Details Text </th>
                                    <th>Top Video For Home Page </th>
                                    <th>Select Top Slider Video For Home Page </th>
                                    <th>Select Middle Slider Video For Home Page</th>
                                    <th>Select Bottom Slider Video For Home Page</th>
                                    <th>Edit </th>
                                    <th>Delete </th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($video as $item)
                                <tr>
                                    <td>
                                        @if (!empty($item->videoCategoryDetails))
                                        <strong>{{ $item->videoCategoryDetails->name }}</strong>
                                        @endif
                                    </td>

                                    <td>{{ $item->short_description }}</td>

                                    <!-- Display thumbnail image or a message if not available -->
                                    <td>
                                        @if (!empty($item->thumbnail_image))
                                        <img src="{{ url('skh/public/' . $item->thumbnail_image) }}" alt="thumbnail image Image" width="100px" height="100px">
                                        @else
                                        <p>Thumbnail image available</p>
                                        @endif
                                    </td>

                                    <!-- Display highlighting video image or a message if not available -->
                                    <td>
                                        @if (!empty($item->highlighting_video_Image))
                                        <img src="{{ url('skh/public/' . $item->highlighting_video_Image) }}" alt="highlighting Video Image" width="100px" height="100px">
                                        @else
                                        <p>highlighting Video image available</p>
                                        @endif
                                    </td>

                                    <!-- Display highlighting second video image or a message if not available -->
                                    <td>
                                        @if (!empty($item->highlighting_second_video_Image))
                                        <img src="{{ url('skh/public/' . $item->highlighting_second_video_Image) }}" alt="highlighting Video Image" width="100px" height="100px">
                                        @else
                                        <p>highlighting Second Video image available</p>
                                        @endif
                                    </td>

                                    <!-- Display top featured video image or a message if not available -->
                                    <td>
                                        @if (!empty($item->top_featured_video_Image_slider))
                                        <img src="{{ url('skh/public/' . $item->top_featured_video_Image_slider) }}" alt="Featured Video Image" width="100px" height="100px">
                                        @else
                                        <p>youtube image available</p>
                                        @endif
                                    </td>

                                    <!-- Display middle featured video image or a message if not available -->
                                    <td>
                                        @if (!empty($item->middle_featured_video_Image_slider))
                                        <img src="{{ url('skh/public/' . $item->middle_featured_video_Image_slider) }}" alt="Featured Video Image" width="100px" height="100px">
                                        @else
                                        <p>youtube image available</p>
                                        @endif
                                    </td>

                                    <!-- Display bottom featured video image or a message if not available -->
                                    <td>
                                        @if (!empty($item->bottom_featured_video_Image_slider))
                                        <img src="{{ url('skh/public/' . $item->bottom_featured_video_Image_slider) }}" alt="Featured Video Image" width="100px" height="100px">
                                        @else
                                        <p>youtube image available</p>
                                        @endif
                                    </td>

                                    <!-- Display YouTube video iframe or a message if URL is invalid -->
                                    <td>
                                        @if (!empty($item->youtube_video_url))
                                        <iframe width="200" height="100" src="https://www.youtube.com/embed/{{ $item->youtube_video_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        @else
                                        <p>Invalid YouTube video URL</p>
                                        @endif
                                    </td>

                                    {{-- <td>{{ $item->playnow_link }}</td> --}}
                                    <td>{{ $item->startquiz_easy }}</td>
                                    <td>{{ $item->startquiz_hard }}</td>
                                    <td>{{ $item->downloadpdf_link }}</td>
                                    <td>{{ $item->move_of_the_year_content }}</td>
                                    <td>{{ $item->video_release_type }}</td>
                                    <td>{{ $item->film_certificate_ratings }}</td>
                                    <td>{{ $item->video_playback_singer_by }}</td>
                                    <td>{{ $item->video_singer_details }}</td>
                                    <td>{{ $item->video_lyrics_details }}</td>
                                    <td>{{ $item->video_quality_in }}</td>
                                    <td>{{ $item->video_genre_by }}</td>
                                    <td>{{ $item->video_dimension_type }}</td>
                                    <td>{{ $item->video_duration }}</td>
                                    <!-- Display item details with ellipsis if exceeds 100px width -->
                                    <td style="display: block; width: 100px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                        {{ $item->details }}
                                    </td>
                                    <td>
                                        <a href="top_video/{{ $item->id }}" class="btn btn-sm btn-{{ $item->top_video ? 'success' : 'primary' }}">
                                            <i class="fas fa-video me-1" style="margin-right: 2px;"></i>{{ $item->top_video ? 'Added' : 'Not Added' }}
                                        </a>
                                    </td>

                                    <!-- Display buttons indicating whether the item is featured or not -->
                                    <td>
                                        <button class="btn btn-sm btn-{{ $item->top_video_slider ? 'success' : 'primary' }} featured-games-btn" data-toggle="modal" data-target="#featuredModal_{{ $item->id }}">
                                            <i class="fas fa-star me-1" style="margin-right: 2px;"></i>{{ $item->top_video_slider ? 'Added' : 'Not Added' }}
                                        </button>
                                    </td>

                                    <td>
                                        <button class="btn btn-sm btn-{{ $item->middle_video_slider ? 'success' : 'primary' }} featured-games-btn" data-toggle="modal" data-target="#featuredModal_{{ $item->id."_m" }}">
                                            <i class="fas fa-star me-1" style="margin-right: 2px;"></i>{{ $item->middle_video_slider ? 'Added' : 'Not Added' }}
                                        </button>
                                    </td>

                                    <td>
                                        <button class = "btn btn-sm btn-{{ $item->bottom_video_slider ? 'success' : 'primary' }} featured-games-btn" data-toggle = "modal" data-target = "#featuredModal_{{ $item->id."_b" }}">
                                        <i      class = "fas fa-star me-1" style                                                                                 = "margin-right: 2px;"></i>{{ $item->bottom_video_slider ? 'Added' : 'Not Added' }}
                                        </button>
                                    </td>

                                    <!-- Edit and delete buttons -->
                                    <td>
                                        <a href="{{ url('edit_video_list/' . $item->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit me-1"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <!-- Delete confirmation modal -->
                                        @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                        'modalId' => 'deleteConfirmationModal_' . $item->id,
                                        'deleteUrl' => url('delete_video_list', $item->id),
                                        ])
                                        @endcomponent
                                        <!-- Button to trigger delete confirmation modal -->
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteConfirmationModal_{{ $item->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>


                                </tr>


                                @include('Layouts.FeaturedModelLayout.featuredModelLayout', [
                                'id' => $item->id,
                                'action' => url('top_video_slider/' . $item->id),
                                'inputName' => 'top_featured_video_Image_slider',
                                'submitButtonLabel' => 'Add Top Featured Video',
                                ])

                                @include('Layouts.FeaturedModelLayout.featuredModelLayout', [
                                'id' => $item->id.'_m',
                                'action' => url('middle_video_slider/' . $item->id),
                                'inputName' => 'middle_featured_video_Image_slider',
                                'submitButtonLabel' => 'Add Middle Featured Video',
                                ])

                                @include('Layouts.FeaturedModelLayout.featuredModelLayout', [
                                'id' => $item->id."_b", // Different ID here
                                'action' => url('bottom_video_slider/' . $item->id),
                                'inputName' => 'bottom_featured_video_Image_slider',
                                'submitButtonLabel' => 'Add Bottom Featured Video',
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
