@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Tour</h4>
                    <form action="{{ route('admin.multidaytour.store') }}" class="form-sample" method="post" enctype='multipart/form-data'>
                        @csrf
                        <p class="card-description"></p>
                        <div class="row">

                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="hotal_name">Tour Name</label>
                                    <input type="text" class="form-control @error('hotal_name') is-invalid @enderror"
                                        id="hotal_name" name="hotal_name" value="{{ old('hotal_name') }}">
                                    @error('hotal_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="price">Phone</label>
                                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                                        id="phone_number" name="phone_number" step=".01" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" step=".01" value="{{ old('price') }}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                        id="city" name="city" value="{{ old('city') }}">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address') }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="adults">Adults</label>
                                    <input type="number" class="form-control @error('adults') is-invalid @enderror"
                                        id="adults" name="adults" value="{{ old('adults') }}">
                                    @error('adults')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="children">Children</label>
                                    <input type="number" class="form-control @error('children') is-invalid @enderror"
                                        id="children" name="children" value="{{ old('children') }}">
                                    @error('children')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="available_rooms">Available Rooms</label>
                                    <input type="number" class="form-control @error('available_rooms') is-invalid @enderror"
                                        id="available_rooms" name="available_rooms" value="{{ old('available_rooms') }}">
                                    @error('available_rooms')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="location_id">Select Location</label>
                                <select class="form-control @error('location_id') is-invalid @enderror"
                                    id="location_id" name="location_id">
                                    <option value="">Select Location</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('location_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Upload Image</label>
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
                                    <label for="description">Description</label>
                                    <input type="textarea" class="form-control @error('description') is-invalid @enderror"
                                        id="city" name="description" value="{{ old('description') }}">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="float-right">
                            <a href="{{ route('admin.multidaytour.index') }}" class="btn btn-outline-primary">Back</a>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
