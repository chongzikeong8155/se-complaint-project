@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="text-center m-3">Assigned Task</h2>

    <div class="row">
        <div class="col-12">
            <h3>Total Tasks: {{ $total }}</h3>
        </div>
        <div class="col-12 mb-3">
            <a href="{{ route('executive.verified_complaints.index') }}" class="btn btn-primary">Tasks List</a>
        </div>
        {{-- foreach all the status--}}
        @foreach ($status_verified_complaint as $sts)
            @include('components.status_card', ['route' => 'executive.verified_complaints.index'])
        @endforeach

    </div>
</div>

@endsection
