@extends('front.master')

@section('title')
    {{ $course->slug }}
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset($course->image) }}" alt="" style="height: 100px;">
                </div>
                <div class="col-md-10">
                    <h3>{{ $course->title }}</h3>
                    <p>{{ $course->short_description }}</p>
                </div>
            </div>
            <div class="row bg-light">
                <div class="col-8">
                    <p>
                        <span>Course Price: {{ $course->price }} BDT</span> <br/>
                        <span>Total Duration: {{ $course->total_hour }} Hours</span> <br/>
                        <span>Starts From: {{ \Illuminate\Support\Carbon::parse($course->starting_date)->format('d-m-Y') }} </span>
                        <br/>
                        <span>Ends: {{ \Illuminate\Support\Carbon::parse($course->ending_date)->format('d-m-Y') }} </span>
                        <br/>
                    </p>
                </div>
                <div class="col-md-4">
                    <div>
                        <a href="{{ route('front.checkout-page', ['slug' => $course->slug]) }}" class="btn btn-success mt-4">Enroll Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    {!! $course->long_description !!}
                </div>
                <div class="col-md-3">
                    <h5>Trainer Name</h5>
                    <h1>{{ $course->trainer->name }}</h1>
                </div>
            </div>
        </div>
    </section>
@endsection
