<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom fonts for this template-->

    <link href="/asset/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

   


    <!-- Custom styles for this template-->
    <link href="/asset/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/asset/css/custom.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <style>
        label.error {
            color: #dc3545;
            font-size: 14px;
        }

    </style>
</head>

<body class="bg-gradient-primary">

    @yield('content')
    <!-- Bootstrap core JavaScript-->
    <script src="/asset/jquery/jquery.min.js"></script>
    <script src="/asset/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/asset/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/asset/js/sb-admin-2.min.js"></script>
    <!-- Custom validation for registration pages-->
    <script src="/asset/js/custom.js" type="text/javascript"></script>
    <script src="/asset/js/jquery.validate.min.js" type="text/javascript"></script>
</body>

</html>
