@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Vehicles</h4>
                    <form action="{{ route('admin.vehicles.store') }}" class="form-sample" method="post" enctype='multipart/form-data'>
                        @csrf
                        <p class="card-description"></p>
                        <div class="row">

                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="name">Vehicle Name<span>*</span><span>*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="type">Type<span>*</span></label>
                                    <input type="text" class="form-control @error('type') is-invalid @enderror"
                                        id="type" name="type" step=".01" value="{{ old('type') }}">
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="make">Make By Company<span>*</span></label>
                                    <input type="make" class="form-control @error('make') is-invalid @enderror"
                                        id="price" name="make" step=".01" value="{{ old('make') }}">
                                    @error('make')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="model">Make Name<span>*</span></label>
                                    <input type="text" class="form-control @error('model') is-invalid @enderror"
                                        id="model" name="model" value="{{ old('model') }}">
                                    @error('model')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                           
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="adults">Adults<span>*</span></label>
                                    <input type="number" class="form-control @error('adults') is-invalid @enderror"
                                        id="adults" name="adults_capacity" value="{{ old('adults') }}">
                                    @error('adults')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="children">Children<span>*</span></label>
                                    <input type="number" class="form-control @error('children') is-invalid @enderror"
                                        id="children" name="children_capacity" value="{{ old('children') }}">
                                    @error('children')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           <!--  <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="available_rooms">Available Rooms<span>*</span></label>
                                    <input type="number" class="form-control @error('available_rooms') is-invalid @enderror"
                                        id="available_rooms" name="available_rooms" value="{{ old('available_rooms') }}">
                                    @error('available_rooms')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="from_location_id">Select From Location<span>*</span></label>
                                <select class="form-control @error('from_location_id') is-invalid @enderror"
                                    id="from_location_id" name="from_location_id">
                                    <option value="">Select Location</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('from_location_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="to_location_id">Select To Location<span>*</span></label>
                                <select class="form-control @error('to_location_id') is-invalid @enderror"
                                    id="to_location_id" name="to_location_id">
                                    <option value="">Select Location</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('to_location_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="price">Rent<span>*</span></label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price') }}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="trip_date">Trip Date<span>*</span></label>
                                    <input type="text" class="form-control @error('trip_date') is-invalid @enderror"
                                        id="trip_date" name="trip_date" value="{{ old('trip_date') }}">
                                    @error('trip_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="trip_time">Trip Time<span>*</span></label>
                                    <input type="text" class="form-control @error('trip_time') is-invalid @enderror"
                                        id="trip_time" name="trip_time" value="{{ old('trip_time') }}">
                                    @error('trip_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Upload Image<span>*</span></label>
                                 <!--    <input type="file" name="profile_img" id="userImage" class="dropify-event dropify z-depth-4 circle"
                                 data-default-file="" /> -->
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="city" name="image" value="{{ old('image') }}">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="description">Description<span>*</span></label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description" value="{{ old('description') }}">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="float-right">
                            <a href="{{ route('admin.vehicles.index') }}" class="btn btn-outline-primary">Back</a>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
