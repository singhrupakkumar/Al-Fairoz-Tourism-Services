@extends('admin.layouts.app')
@section('content')
   <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Contact Request Detail</h4>
                        <section class="users-list-wrapper section">
                        <div class="users-list-table">
                        <div class="card">
                        <div class="card-content">
                        <div class="row">
                        <div class="col l12">
                        <div class="data-section">
                        <div class="user-view  height-label-1 d-flex">
                        <label>Name:</label>
                        <span class="ml-2">{{ $contactReqDetail->name ? $contactReqDetail->name : 'N/A' }}
                        </span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Email:</label>
                        <span class="ml-2"> {{ $contactReqDetail->email ? $contactReqDetail->email : 'N/A' }}</span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Suject:</label>
                        <span class="ml-2"> {{ ($contactReqDetail->subject) ? $contactReqDetail->subject : '' }}</span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Message:</label>
                        <span class="ml-2"> {{ ($contactReqDetail->message) ? $contactReqDetail->message : '' }}</span>
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
