@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Setting</h4>
                    <form action="{{ route('admin.setting.store') }}" id="settings_form" class="form-sample" method="post" enctype='multipart/form-data'>
                        @csrf
                        <p class="card-description"></p>
                        <div class="row">

                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email',$setting->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="price">Phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" step=".01" value="{{ old('phone',$setting->phone) }}">
                                    @error('phone')
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
                                        id="address" name="address" step=".01" value="{{ old('address',$setting->address) }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo">Upload Logo</label>
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                        id="logo" name="logo" value="{{ old('logo') }}">
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <img src="{{ asset('storage/upload_image/'.$setting->logo) }}" height="250" width="250" />
                                <input type="hidden" name="oldLogoImg" value="{{$setting->logo }}">
                            </div>
                        <div class="float-right">
                            
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
