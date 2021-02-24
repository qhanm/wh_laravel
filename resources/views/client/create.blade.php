@php
    /** @var \App\Models\Accounts\Client $model */
    /** @var array $countries */
@endphp

@extends('layout.master')

@section('content')
    <div id="pjax-create-client">
        <form action="{{ route('client.store') }}" method="post" data-pjax="">
            @csrf
            @include('client._form', [
                'model' => $model,
                'countries' => $countries
            ])
        </form>
    </div>

@endsection

@section('script')
    <script>
        $.pjax.defaults.push = false;
    </script>
@endsection
