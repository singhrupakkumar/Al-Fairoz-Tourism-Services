@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Tour</h4>
                    <form action="{{ route('admin.tours.update', $tour->id) }}" class="form-sample" method="POST">
                        @csrf
                        @method('PUT')
                        <p class="card-description"></p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $tour->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="number" class="form-control @error('duration') is-invalid @enderror"
                                        id="duration" name="duration" value="{{ old('duration', $tour->duration) }}">
                                    @error('duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" step=".01"
                                        value="{{ old('price', $tour->price) }}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tour_type">Tour Type</label>
                                    <select class="form-control @error('tour_type') is-invalid @enderror" id="tour_type"
                                        name="tour_type">
                                        <option value="">Select Tour Type</option>
                                        <option value="custom"
                                            {{ old('tour_type', $tour->tour_type) == 'custom' ? 'selected' : '' }}>Custom
                                        </option>
                                        <option value="day"
                                            {{ old('tour_type', $tour->tour_type) == 'day' ? 'selected' : '' }}>Day
                                        </option>
                                        <option value="night"
                                            {{ old('tour_type', $tour->tour_type) == 'night' ? 'selected' : '' }}>Night
                                        </option>
                                    </select>
                                    @error('tour_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tour_category_id">Tour Category</label>
                                    <select class="form-control @error('tour_category_id') is-invalid @enderror"
                                        id="tour_category_id" name="tour_category_id">
                                        <option value="">Select Tour Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('tour_category_id', $tour->tour_category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tour_category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="1">{{ old('description', $tour->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('admin.tours.index') }}" class="btn btn-outline-primary">Back</a>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
