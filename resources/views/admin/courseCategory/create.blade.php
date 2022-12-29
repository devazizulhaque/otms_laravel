@extends('admin.master')

@section('title')
    Add Course Category
@endsection

@section('body')
    <div class="row">
        <div class="col-md-6 py-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Add Course Category</h3>
                    <a href="{{ route('course-categories.index') }}" class="btn btn-primary float-end">Manage</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('course-categories.store') }}" method="post">
                        @csrf
                        <div class="row mt-2">
                            <label  for="" class="col-md-4">Category name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <label ><input type="radio" name="status" value="1" checked > Published</label>
                                <label ><input type="radio" name="status" value="2" > UnPublished</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label  for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit"  class="btn btn-success" value="Add Category" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
