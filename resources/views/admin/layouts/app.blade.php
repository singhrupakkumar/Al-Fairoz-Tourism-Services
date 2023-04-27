<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Al Fairoz Tourism Services</title>

    {{-- Include styles --}}
    @include('admin.partials.styles')
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        @include('admin.partials.navbar') {{-- Include Navbar --}}
        <div class="container-fluid page-body-wrapper">
            @include('admin.partials.sidebar') {{-- Include Sidebar --}}
            <div class="content-wrapper">
                @yield('content') {{-- Include Page Content (content within class "main-panel") --}}
            </div>
        </div>
    </div>
    {{-- Include scripts --}}
    @include('admin.partials.scripts')
    @include('admin.datatable.datatable-script')
    @yield('scripts') {{-- Include Page Script (content within class "main-panel") --}}

</body>

</html>
