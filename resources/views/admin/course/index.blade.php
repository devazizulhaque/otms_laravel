@extends('admin.master')

@section('title')
    Manage Courses
@endsection

@section('body')

    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Manage Courses</h3>
                    <span>
                        <a href="{{ route('courses.create') }}" class="btn btn-primary float-end">Create</a>
                    </span>
                </div>
                <div class="card-body">
                    <table id="courseTable" class="table table-striped w-100 nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            @if(auth()->user()->role_type == 1)
                                <th>P.by</th>
                            @endif
                            <th>Title</th>
                            <th>Price</th>
                            <th>Total Hours</th>
                            <th>Duration</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->category->name }}</td>
                                <td>{{ $course->subCategory->name }}</td>
                                @if(auth()->user()->role_type == 1)
                                    <td>{{ $course->trainer->name }}</td>
                                @endif
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->price }}</td>
                                <td>{{ $course->total_hour }}</td>
                                <td>{{ $course->starting_date.' to '. $course->ending_date }}</td>
                                <td>{{ $course->short_description }}</td>
                                <td>{!! \Illuminate\Support\Str::words($course->long_description, 20) !!}</td>
                                <td>
                                    <img src="{{ asset($course->image) }}" alt="" style="height: 80px; width: 80px">
                                </td>
                                <td>{{ $course->status == 1 ? 'Published' : 'Unublished' }}</td>
                                <td>
                                    @if(auth()->user()->role_type == 1)
                                        <a href="{{ route('courses.approve', ['id' => $course->id]) }}" class="btn btn-sm btn-{{ $course->status == 1 ? 'warning' : 'primary' }}" title="Change Course Status">
                                            <i class="uil-{{ $course->status == 1 ? 'arrow-down' : 'arrow-up' }}"></i>
                                        </a>
                                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info">
                                            <i class="uil-atom"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-secondary">
                                        <i class="uil-edit"></i>
                                    </a>
                                    <form action="{{ route('courses.destroy', $course->id) }}" onsubmit="return confirm('Are you sure to delete this?')" style="display: inline-block" method="post">
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

@section('script')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#courseTable').DataTable({
                scrollX: true
            });
        } );
    </script>
@endsection
