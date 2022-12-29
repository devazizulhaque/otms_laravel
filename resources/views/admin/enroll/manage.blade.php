@extends('admin.master')

@section('title')
    Manage Enrolls
@endsection

@section('body')

    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Manage Course Enrolls</h3>
                </div>
                <div class="card-body">
                    <table id="courseTable" class="table table-striped w-100 nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Trainer Name</th>
                            <th>Student Name</th>
                            <th>Price</th>
                            <th>Applied Date</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($enrolls as $enroll)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $enroll->course->title }}</td>
                                <td>{{ $enroll->course->trainer->name }}</td>
                                <td>{{ $enroll->student->name }}</td>
                                <td>{{ $enroll->course->price }}</td>
                                <td>{{ $enroll->created_at->format('d-m-Y') }}</td>
                                <td>{{ $enroll->payment_method }}</td>
                                <td>
                                    {{ $enroll->status == 0 ? 'Rejected' : '' }}
                                    {{ $enroll->status == 1 ? 'Pending' : '' }}
                                    {{ $enroll->status == 2 ? 'Approved' : '' }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm"><i class="uil-arrow-up"></i></a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="uil-arrow-down"></i></a>
                                    <a href="" class="btn btn-warning btn-sm"><i class="uil-arrow-right"></i></a>
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
