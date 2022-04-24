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
                            {{-- <button type="button" class="btn btn-info btn-xs" style="float:right;" >Add New</button> --}}
                        </div>
                    </div>
                    <br />
                    @if (session('status'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- DataTales Example -->
                    @foreach ($configurations as $configuration)
                        <div class="card shadow mb-5">
                            <div class="card-header py-3">
                                <span class="{{ $configuration->servername == 'Live' ? 'text-success' : 'text-primary' }}">
                                    {{ $configuration->servername }} -
                                </span>
                                {{ $configuration->cofigame }}
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-8">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" role="switch" type="checkbox"
                                                name="isStop_{{ $configuration->id }}"
                                                id="isStop_{{ $configuration->id }}"
                                                {{ $configuration->isStop ? 'checked' : '' }}
                                                onclick="changeUserStatus(event, event.target, {{ $configuration->id }});">
                                            <label class="form-check-label" for="isStop_{{ $configuration->id }}">
                                                Stop
                                            </label>
                                        </div>
                                        <p
                                            class="card-text {{ $configuration->isStop ? 'text-danger' : 'text-success' }}">
                                            Bot is {{ $configuration->isStop ? 'Off' : 'On' }}
                                        </p>
                                    </div>
                                    <div class="col-6 col-md-3 text-right">
                                        <a href=" /config/editconfig/{{ $configuration->id }}"
                                            class="btn btn-primary btn-large"><i class="fas fa-edit"></i>Edit</a>
                                    </div>
                                </div>

                                @csrf

                                {{-- <hr style="background: currentColor;"> --}}



                            </div>


                        </div>
                    @endforeach
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
    function changeUserStatus(event, _this, id) {
        if (confirm("Do you really want to change your status?")) {
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
                success: function(result) {
                    window.location.href = "/config/configList";
                    alert('Status successfully changed.');
                }
            });
        } else {
            event.preventDefault();
        }
    }
</script>

{{-- {{url('config/editconfig').'/'.$configuration->id }} --}}
