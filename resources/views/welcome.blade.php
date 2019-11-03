@extends('layouts.app')

@section('content')
    <welcome-component
        :app_name="{{json_encode(config('app.name', 'No Name :v'))}}"
    >
    </welcome-component>  
@endsection