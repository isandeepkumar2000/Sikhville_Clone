@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Add Punjabi Reading</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add_post_punjabi_reading_list') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <select class="js-states form-control select2"
                                    name="punjabireadingCategoriesid" required id="shopping_id">
                                    <option value="option_select" disabled selected>Choose the name
                                    </option>
                                    @foreach ($punjabireading as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <label for="thumbnail_big_image">Thumbnail Image</label>
                                    <input type="text" class="form-control" required
                                        id="thumbnail_big_image" placeholder="Thumbnail Image"
                                        name="thumbnail_big_image" required>
                                </div>
                                <div class="form-group col-md-6">

                                    <label for="reading_summary_pdf">Reading Summary Pdf</label>
                                    <input type="text" class="form-control" required
                                        id="reading_summary_pdf" placeholder="Reading Summary"
                                        name="reading_summary_pdf" required>
                                </div>

                                <div class="form-group col-md-6">

                                    <label for="reading_video_url">Reading Video Url</label>
                                    <input type="text" class="form-control" required
                                        id="reading_video_url" placeholder="Reading Video"
                                        name="reading_video_url" required>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">Submit Punjabi Reading</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection