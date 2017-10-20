@extends('layouts.app')
@section('content')

{{ $message }}

@push('scripts')
	<link rel="stylesheet" href="css/catalogo.css">
	<script type="text/javascript" src="{{asset('js/app/categorias/check-list.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/app/productos/productos-list.components.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/efectcards.js')}}"></script>
@endpush
@endsection
