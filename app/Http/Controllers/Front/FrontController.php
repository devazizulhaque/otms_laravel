<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public $course;
    public function home ()
    {
        return view('front.home.home', [
            'courses'   => Course::where('status', 1)->get(),
        ]);
    }

    public function aboutUs ()
    {
        return view('front.about.about');
    }

    public function contactUs ()
    {
        return view('front.contact.contact');
    }

    public function categoryCourses($categoryId)
    {
        return view('front.category.index', [
            'courses'       => Course::where('course_category_id', $categoryId)->where('status', 1)->get(),
            'category'      => CourseCategory::find($categoryId),
        ]);
    }

    public function courseDetails($slug)
    {
        $this->course = Course::where('slug', $slug)->first();

        $this->course->hit_count = $this->course->hit_count +1;
        $this->course->save();

        return view('front.course.details', [
            'course'    => $this->course,
        ]);
    }

    public function checkoutPage($slug)
    {
        return view('front.course.checkout', [
            'course'    => Course::where('slug', $slug)->first(),
        ]);
    }
}
