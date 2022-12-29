<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public $course, $subCategories;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.course.index', [
            'courses'   => Course::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create', [
            'courseCategories'  => CourseCategory::where('status', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'course_category_id' => 'required|numeric',
            'course_sub_category_id' => 'required',
            'title' => 'required|string',
            'image' => 'required|image'
        ], [
            'image.required'    => 'Image den vai',
            'image.image'    => 'faijlami paisen,, image upload den mia',
        ]);

        Course::createOrUpdateCourse($request);
        return redirect()->back()->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.course.show', [
            'course'            => Course::where('id',$id)->first(),
            'courseCategories'  => CourseCategory::where('status', 1)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.course.edit', [
            'course'    => Course::where('id',$id)->first(),
            'courseCategories'  => CourseCategory::where('status', 1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Course::createOrUpdateCourse($request, $id);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->course = Course::find($id);
        if (isset($this->course->image))
        {
            if (file_exists($this->course->image))
            {
                unlink($this->course->image);
            }
        }
        $this->course->delete();
        return redirect()->back()->with('success', 'Course deleted successfully');
    }

    public function getSubCategory(Request $request)
    {
        $this->subCategories = CourseSubCategory::where('category_id', $request->category_id)->get();
        return response()->json($this->subCategories);
    }

    public function approveCourse($id)
    {
        $this->course = Course::where('id', $id)->first();
        if ($this->course->status   == 1)
        {
            $this->course->status   = 0;
            $message = 'Course unpublished successfully';
        } else{
            $this->course->status   = 1;
            $message = 'Course Published successfully';
        }
        $this->course->save();
        return redirect()->back()->with('success', $message);
    }
}
