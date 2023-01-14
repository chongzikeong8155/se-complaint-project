@extends('layouts.app')

@section('content')

<div class="container">


    <h2 class="text-center m-3">Ongoing Complaints</h2>

    <div class="row">
        <div class="col-12">
            <h3>Total Assigned Complaints: {{ $total_verified_complaints }}</h3>
            <h3>Total Ongoing Complaints: {{ $total_ongoing_verified_complaints }}</h3>
        </div>
        <div class="col-12 mb-3">
            <a href="{{ route('helpdesk.verified_complaints.index') }}" class="btn btn-primary">Ongoing Complaints</a>
        </div>
        {{-- foreach all the status--}}
        @foreach ($status_verified_complaint as $sts)
            @include('components.status_card', ['route' => 'helpdesk.verified_complaints.index'])
        @endforeach

    </div>

    <h2 class="text-center m-3">All Complaints</h2>

    <div class="row">
        <div class="col-12">
            <h3>Total Complaints: {{ $total_complaints }}</h3>
        </div>
        <div class="col-12 mb-3">
            <a href="{{ route('helpdesk.complaints.index') }}" class="btn btn-primary">Student Complaints</a>
        </div>
        {{-- foreach all the status--}}
        @foreach ($status_complaint as $sts)
            @include('components.status_card', ['route' => 'helpdesk.complaints.index'])
        @endforeach

    </div>


</div>

@endsection
