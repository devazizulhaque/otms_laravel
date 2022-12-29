@extends('front.master')

@section('title')
    {{ $category->name }} Courses
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">{{ $category->name }} Courses</h2>
                    <div class="row mt-4">
                        @forelse($courses as $course)
                            <div class="col-md-4 mt-2">
                                <div class="card">
                                    <img src="{{ asset($course->image) }}" alt="" class="w-100 card-img-top" style="height: 250px" />
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $course->title }}</h4>
                                        <p>Price: {{ $course->price }}tk</p>
                                        <p>total hours: {{ $course->total_hour }} hours</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="" class="btn btn-success float-end">Enroll Now</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h1>No Courses Avaliable</h1>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
