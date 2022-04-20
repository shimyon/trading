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
                <h1 class="h3 mb-2 text-gray-800">Configuration List</h1>
                 <div class="col-md-8"> 
                    <a class="btn btn-success" href="/config/configFormAdd" style="float:right;"> Create Config</a>
                     {{-- <button type="button" class="btn btn-info btn-xs" style="float:right;" >Add New</button>  --}}
                 </div>
              </div>
                 <br/>
                 @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
                </div>
                @endif
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Configuration List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Config Name</th>
                                        <th>Stop</th>
                                        <th>TP</th>
                                        <th>SL</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Status</th>
                                        <th>Config Name</th>
                                        <th>Stop</th>
                                        <th>TP</th>
                                        <th>SL</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($configurations as $configuration)
                                    <tr>
                                        <td>
                                            {{-- <input data-id="{{$configuration->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $configuration->isStop ? 'checked' : '' }}>  --}}
                                            <div class="form-check">
                                               <input class="form-check-input" type="checkbox" name="isStop" id="isStop" {{($configuration->isStop) ? 'checked' : ''}}
                                               onclick="changeUserStatus(event.target, {{ $configuration->id }});">
                                               <label class="form-check-label" for="flexCheckDefault" checked>
                                                Stop
                                             </label>
                                             </div>
                                         </td>
                                        <td>{{ $configuration->cofigame }}</td>
                                        <td class="{{ $configuration->isStop ? 'text-danger':'text-success' }} ">{{ $configuration->isStop ? 'Yes':'No' }}</td>
                                        <td>{{ $configuration->tp }}</td>
                                        <td>{{ $configuration->sl }}</td>
                                        <td>
                                        <form action="/config/deleteConfig/{{$configuration->id }}" method="Post">
                                        <a href="/config/editconfig/{{$configuration->id }}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
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
<script>
    function changeUserStatus(_this, id) {
        if (confirm("Do you really want to change your status?")){
        var isStop = $(_this).prop('checked') == true ? 1 : 0;
        let _token = $('meta[name="csrf-token"]').attr('content');
    
        $.ajax({
            url: `./change-status`,
            type: 'get',
            data: {
                _token: _token,
                id: id,
                isStop: isStop 
            },
            success: function (result) {
                window.location.href= "/config/configList";
                alert('Status successfully Change!'); 
            }
        });
    }
    }
    
    </script>

{{-- {{url('config/editconfig').'/'.$configuration->id }} --}}