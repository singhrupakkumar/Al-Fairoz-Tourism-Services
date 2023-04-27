@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Destination</h4>
                    <form action="{{ route('admin.destination.update', $id) }}" class="form-sample" method="post" enctype='multipart/form-data'>
                        @csrf
                        <p class="card-description"></p>
                        <div class="row">
                           
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('available_rooms',$locDetail->name) }}" id="name">
                                     @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" name="city" id="city" value="{{ old('city',$locDetail->city) }}">
                                     @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="4">{{ old('description',$locDetail->description) }}</textarea>
                                     @error('description')
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
                                <img src="{{ asset('storage/upload_image/'.$locDetail->image) }}" height="250" width="250" />
                                </div>
                                <input type="hidden" name="oldLocImg" value="{{$locDetail->image }}">
                            </div>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('admin.destinations.index')}}" class="btn btn-outline-primary">Back</a>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
