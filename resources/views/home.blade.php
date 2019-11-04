@extends('layouts.app')

@section('content')
<home-component
    :app_name="{{json_encode(config('app.name','No Name :v'))}}"
    :user_data="{{json_encode(Auth::user())}}"
>
</home-component>
@endsection
