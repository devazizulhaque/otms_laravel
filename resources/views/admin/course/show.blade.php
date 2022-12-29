@extends('admin.master')

@section('title')
    {{ $course->slug }}
@endsection

@section('body')
    <div class="row">
        <div class="col-md-6 py-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Show Course</h3>
                    <a href="{{ route('courses.index') }}" class="btn btn-primary float-end">Manage</a>
                </div>
                <div class="card-body">

{{--                    <form action="{{ route('courses.update', $course->id) }}" method="post" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        @method('put')--}}
                        <div class="row mt-2">
                            <label for="" class="col-md-4">Category name</label>
                            <div class="col-md-8">
                                <select name="course_category_id" disabled id="categoryId" class="form-control select2" data-toggle="select2" data-placeholder="Select a category">
                                    <option></option>
                                    @foreach($courseCategories as $courseCategory)
                                        <option value="{{ $courseCategory->id }}" {{ $courseCategory->id == $course->course_category_id ? 'selected' : '' }}>{{ $courseCategory->name }}</option>
                                    @endforeach
                                </select>
                                @error('course_category_id') <span class="text-danger">{{ $errors->first('course_category_id') }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Sub Category name</label>
                            <div class="col-md-8">
                                <select name="course_sub_category_id" disabled id="subCategory" class="form-control select2" data-toggle="select2" data-placeholder="Select a sub category">
                                    <option value="{{ $course->subCategory->id }}">{{ $course->subCategory->name }}</option>
                                </select>
                                @error('course_category_id') <span class="text-danger">{{ $errors->first('course_sub_category_id') }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Course Title</label>
                            <div class="col-md-8">
                                <input type="text" name="title" disabled class="form-control" value="{{ $course->title }}"/>
                                @error('title') <span class="text-danger">{{ $errors->first('title') }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Course Price</label>
                            <div class="col-md-8">
                                <input type="number" name="price" disabled value="{{ $course->price }}" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Total duration</label>
                            <div class="col-md-8">
                                <input type="number" name="total_hour" disabled value="{{ $course->total_hour }}" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Starting date</label>
                            <div class="col-md-8">
                                <input type="date" name="starting_date" disabled value="{{ $course->starting_date }}" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Ending date</label>
                            <div class="col-md-8">
                                <input type="date" name="ending_date" disabled class="form-control" value="{{ $course->ending_date }}" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Short Description</label>
                            <div class="col-md-8">
                                <textarea name="short_description" disabled class="form-control" id="" cols="30" rows="10">{{ $course->short_description }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Long Description</label>
                            <div class="col-md-8">
                                <textarea name="long_description" disabled class="form-control" id="longDescription" cols="30" rows="10">{{ $course->long_description }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Banner Image</label>
                            <div class="col-md-8">
                                <img src="{{ asset($course->image) }}" alt="" style="height: 80px; width: 80px">
                                @error('image') <span class="text-danger">{{ $errors->first('image') }}</span> @enderror
                            </div>
                        </div>
                    <div class="row mt-2">
                        <label for="" class="col-md-4">Status</label>
                        <div class="col-md-8">
                            <span>{{ $course->status == 1 ? 'Published' : 'Unpublished' }}</span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <a href="{{ route('courses.approve', ['id' => $course->id]) }}" class="btn btn-success">Change Status</a>
                        </div>
                    </div>

{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('change', '#categoryId', function () {
            var categoryId = $(this).val();
            $.ajax({
                url: "/get-sub-category-by-category-id",
                method: "POST",
                dataType: "JSON",
                data: {category_id: categoryId},
                success: function (response) {
                    console.log(response);
                    var option = '';
                    option += '<option disabled>Select a sub category</option>';
                    $.each(response, function (index, value) {
                        option += '<option value="'+value.id+'">'+value.name+'</option>';
                    })
                    $('#subCategory').empty().append(option);
                }
            })
        });
    </script>
@endsection
