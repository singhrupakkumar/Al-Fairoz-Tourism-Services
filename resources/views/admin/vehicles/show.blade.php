@extends('admin.layouts.app')
@section('content')
   <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Vehicle Detail</h4>
                        <section class="users-list-wrapper section">
                        <div class="users-list-table">
                        <div class="card">
                        <div class="card-content">
                        <div class="row">
                        <div class="col l12">
                        <div class="data-section">
                        <div class="user-view  height-label-1 d-flex">
                        <label>Name:</label>
                        <span class="ml-2">{{ $vehiclesDetail->name ? $vehiclesDetail->name : 'N/A' }}
                        </span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Type:</label>
                        <span class="ml-2"> {{ $vehiclesDetail->type ? $vehiclesDetail->type : 'N/A' }}</span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Make:</label>
                        <span class="ml-2"> {{ ($vehiclesDetail->make) ? $vehiclesDetail->make : '' }}</span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Model:</label>
                        <span class="ml-2"> {{ ($vehiclesDetail->model) ? $vehiclesDetail->model : '' }}</span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Adults:</label>
                        <span class="ml-2"> {{ ($vehiclesDetail->adults_capacity) ? $vehiclesDetail->adults_capacity : '' }}</span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Children:</label>
                        <span class="ml-2"> {{ ($vehiclesDetail->children_capacity) ? $vehiclesDetail->children_capacity : '' }}</span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>From Location:</label>
                        <span class="ml-2"> {{ ($vehiclesDetail->from_loc_name) ? $vehiclesDetail->from_loc_name : '' }}</span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>To Location:</label>
                        <span class="ml-2"> {{ ($vehiclesDetail->to_loc_name) ? $vehiclesDetail->to_loc_name : '' }}</span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Price:</label>
                        <span class="ml-2"> {{ ($vehiclesDetail->price) ? $vehiclesDetail->price : '' }}</span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Rooms:</label>
                        <span class="ml-2"> {{ ($vehiclesDetail->rooms) ? $vehiclesDetail->rooms : '' }}</span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Car Image:</label>
                        @php 
                        $image = 'deals-bg.jpg';
                        if($vehiclesDetail->image != null){
                            $image = $vehiclesDetail->image;
                        }else{
                            $image = 'deals-bg.jpg';
                        }
                        @endphp
                        <span class="ml-2"><img src="{{ asset('storage/upload_image/'.$image) }}" /></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Description:</label>
                        <span class="ml-2"> {{ ($vehiclesDetail->description) ? $vehiclesDetail->description : '' }}</span>
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
