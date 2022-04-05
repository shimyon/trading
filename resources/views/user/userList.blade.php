@extends('sidemenu')

@section('content')
<div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">
              <div class="row">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">User List</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <div class="col-md-8"> 
                    <a class="btn btn-success" href="/user/userFormAdd" style="float:right;"> Create User</a>
                     {{-- <button type="button" class="btn btn-info btn-xs" style="float:right;" >Add New</button>  --}}
                 </div>
              </div>
                 <br/>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">User List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Created Date</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Created Date</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->getFullNameAttribute() }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ date('d/M/Y', strtotime($user->created_at)) }}</td>
                                        <td>
                                        <form action="/user/deleteUser/{{$user->id }}" method="Post">
                                        <a href="/user/edituser/{{$user->id }}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                                        <a class="btn btn-secondary" href="/user/editpassword/{{$user->id }}" >Change Password</a>
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-eraser"></i>Delete</button>
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
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<!-- /.container-fluid -->
@endsection



{{-- {{url('config/editconfig').'/'.$configuration->id }} --}}