@extends('admin.master')

@section('title')
    Add Course
@endsection

@section('body')
    <div class="row">
        <div class="col-md-6 py-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Add Course</h3>
                    <a href="{{ route('courses.index') }}" class="btn btn-primary float-end">Manage</a>
                </div>
                <div class="card-body">
                    @foreach($errors->all() as $error)
                        <span class="text-danger">{{ $error }}</span>
                        <br>
                    @endforeach
                    <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Category name</label>
                            <div class="col-md-8">
                                <select name="course_category_id" id="categoryId" class="form-control select2" data-toggle="select2" data-placeholder="Select a category">
                                    <option></option>
                                    @foreach($courseCategories as $courseCategory)
                                        <option value="{{ $courseCategory->id }}">{{ $courseCategory->name }}</option>
                                    @endforeach
                                </select>
                                @error('course_category_id') <span class="text-danger">{{ $errors->first('course_category_id') }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Sub Category name</label>
                            <div class="col-md-8">
                                <select name="course_sub_category_id" id="subCategory" class="form-control select2" data-toggle="select2" data-placeholder="Select a sub category">
                                    <option disabled>Select a sub category</option>
                                </select>
                                @error('course_category_id') <span class="text-danger">{{ $errors->first('course_sub_category_id') }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Course Title</label>
                            <div class="col-md-8">
                                <input type="text" name="title" class="form-control" />
                                @error('title') <span class="text-danger">{{ $errors->first('title') }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Course Price</label>
                            <div class="col-md-8">
                                <input type="number" name="price" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Total duration</label>
                            <div class="col-md-8">
                                <input type="number" name="total_hour" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Starting date</label>
                            <div class="col-md-8">
                                <input type="date" name="starting_date" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Ending date</label>
                            <div class="col-md-8">
                                <input type="date" name="ending_date" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Short Description</label>
                            <div class="col-md-8">
                                <textarea name="short_description" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Long Description</label>
                            <div class="col-md-8">
                                <textarea name="long_description" class="form-control" id="longDescription" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Banner Image</label>
                            <div class="col-md-8">
                                <input type="file" name="image" class="form-control">
                                @error('image') <span class="text-danger">{{ $errors->first('image') }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit"  class="btn btn-success" value="Create Course" />
                            </div>
                        </div>
                    </form>
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
