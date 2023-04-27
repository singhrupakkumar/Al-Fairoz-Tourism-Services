@extends('emails.layouts.app')
@section('content')

	{!! html_entity_decode(@$data) !!}
	@include('emails.layouts.footer')

@endsection
                        