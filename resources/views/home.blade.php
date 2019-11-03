@extends('layouts.app')

@section('content')
<home-component
    :app_name="{{json_encode(config('app.name','No Name :v'))}}"
    :username="{{json_encode(Auth::user()->name)}}"
>
</home-component>
@endsection
