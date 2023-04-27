@extends('admin.layouts.app')
@section('content')
   <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tour Detail</h4>
                        <section class="users-list-wrapper section">
                        <div class="users-list-table">
                        <div class="card">
                        <div class="card-content">
                        <div class="row">
                        <div class="col l12">
                        <div class="data-section">
                        <div class="user-view  height-label-1 d-flex">
                        <label>Name:</label>
                        <span class="ml-2">{{ $locDetail->name ? $locDetail->name : 'N/A' }}
                        </span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>City:</label>
                        <span class="ml-2"> {{ ($locDetail->city) ? $locDetail->city : '' }}</span>
                        </div>
                        
                        <div class="user-view  height-label-1 d-flex">
                        <label>image:</label>
                        @php 
                        $image = 'deals-bg.jpg';
                        if($locDetail->image != null){
                            $image = $locDetail->image;
                        }else{
                            $image = 'deals-bg.jpg';
                        }
                        @endphp
                        <span class="ml-2"><img src="{{ asset('storage/upload_image/'.$image) }}" height="250" width="250" /></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Description:</label>
                        <span class="ml-2"> {{ ($locDetail->description) ? $locDetail->description : '' }}</span>
                        </div>
                        
                        </div>
                        </div> 
                        </div>
                        </div>
                        </div>
                        </div>
                        </section>
                </div>
            </div>
        </div>
    </div>
@endsection
