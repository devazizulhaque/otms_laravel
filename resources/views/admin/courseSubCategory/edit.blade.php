@extends('admin.master')

@section('title')
    Edit Course Sub Category
@endsection

@section('body')
    <div class="row">
        <div class="col-md-6 py-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Edit Course Sub Category</h3>
                    <a href="{{ route('course-sub-categories.index') }}" class="btn btn-primary float-end">Manage</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('course-sub-categories.update', $courseSubCategory->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Category name</label>
                            <div class="col-md-8">
                                <select name="category_id" class="form-control select2" data-toggle="select2" data-placeholder="Select a category">
                                    <option></option>
                                    @foreach($courseCategories as $courseCategory)
                                        <option value="{{ $courseCategory->id }}" {{ $courseCategory->id == $courseSubCategory->category_id ? 'selected' : '' }}>{{ $courseCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Sub Category name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" value="{{ $courseSubCategory->name }}" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <label ><input type="radio" name="status" value="1" {{ $courseSubCategory->status == 1 ? 'checked' : '' }} > Published</label>
                                <label ><input type="radio" name="status" value="0" {{ $courseSubCategory->status == 0 ? 'checked' : '' }} > UnPublished</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit"  class="btn btn-success" value="Update Sub Category" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
