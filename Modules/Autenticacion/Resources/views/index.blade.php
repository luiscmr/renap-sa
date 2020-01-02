@extends('autenticacion::layouts.app')

@section('content')
    <h1>Hello World</h1>
    {{dd($user2)}}
    <p>
        This view is loaded from module: {!! config('autenticacion.name') !!}
    </p>
@endsection
