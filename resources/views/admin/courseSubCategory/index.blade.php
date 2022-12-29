@extends('admin.master')

@section('title')
    Manage Course Category
@endsection

@section('body')
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Manage Course Category</h3>
                    <span>
                        <a href="{{ route('course-sub-categories.create') }}" class="btn btn-primary float-end">Create</a>
                    </span>
                </div>
                <div class="card-body">
                    <table id="basic-datatable" class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($courseSubCategories as $courseSubCategory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $courseSubCategory->category->name }}</td>
                                <td>{{ $courseSubCategory->name }}</td>
                                <td>{{ $courseSubCategory->slug }}</td>
                                <td>{{ $courseSubCategory->status == 1 ? 'Published' : 'Unublished' }}</td>
                                <td>
                                    <a href="{{ route('course-sub-categories.edit', $courseSubCategory->id) }}" class="btn btn-sm btn-secondary">
                                        <i class="uil-edit"></i>
                                    </a>
                                    <form action="{{ route('course-sub-categories.destroy', $courseSubCategory->id) }}" onsubmit="return confirm('Are you sure to delete this?')" style="display: inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="uil-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
