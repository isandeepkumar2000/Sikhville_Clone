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
                        <h4>Edit & Update Punjabi Reading
                            <a href="{{ url('punjabi_reading_list') }}"
                                class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update_punjabi_reading_list/' . $punjabireading->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label for="shopping_id">Select Punjab Reading</label>
                                    <select class="form-control select2" name="punjabireadingCategoriesid"
                                        required id="punjabireadingCategoriesid">
                                        <option value="option_select">Choose a category</option>
                                        @foreach ($punjabireadingcategories as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $punjabireading->punjabireadingCategoriesid) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="validationCustom02">Thumbnail Big Image</label>
                                    <input type="text" class="form-control" required
                                        id="validationCustom02"
                                        value="{{ $punjabireading->thumbnail_big_image }}"
                                        placeholder="Image Url" name="thumbnail_big_image" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom03">Reading Summary Pdf</label>
                                    <input type="text" class="form-control" required
                                        id="validationCustom03"
                                        value="{{ $punjabireading->reading_summary_pdf }}"
                                        placeholder="Short Description" name="reading_summary_pdf" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom03">Reading Video Url</label>
                                    <input type="text" class="form-control" required
                                        id="validationCustom03"
                                        value="{{ $punjabireading->reading_video_url }}"
                                        placeholder="Short Description" name="reading_video_url" required>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update Punjabi
                                    Reading</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection