@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="text-center m-3">Own Complaint Analysis</h2>

    <div class="row">
        <div class="col-12">
            <h3>Yours Complaints: {{ $total }}</h3>
        </div>
        <div class="col-12 mb-3">
            <a href="{{ route('complaints.index') }}" class="btn btn-primary">Own Complaints List</a>
            <a href="{{ route('complaints.create') }}" class="btn btn-primary">Lodge Complaint</a>
        </div>
        {{-- foreach all the status--}}
        @foreach ($status as $sts)
            @include('components.status_card', ['route' => 'complaints.index'])
        @endforeach

    </div>
</div>

@endsection
