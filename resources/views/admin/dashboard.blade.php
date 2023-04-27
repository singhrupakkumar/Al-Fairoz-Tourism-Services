@extends('admin.layouts.app')
@section('content')
    <!-- demo dashoboard for now -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{ $user ? $user->name : 'Guest' }}</h3>
                            <p>Here you can find information and manage different aspects of your application.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- main-panel ends -->
@endsection
