<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
    <link rel='stylesheet'href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container m-5">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>NAME</th>
                                                <th>UNIT</th>
                                                <th>PRICE</th>
                                                <th>XDATE</th>
                                                <th>AVAILABLE</th>
                                                <!-- Add more columns as needed -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->p_name }}</td>
                                                    <td>{{ $item->p_unit }}</td>
                                                    <td>{{ $item->p_price }}</td>
                                                    <td>{{ $item->p_xdate }}</td>
                                                    <td>{{ $item->p_available }}</td>
                                                    <!-- Add more columns as needed -->
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class=" w-100 bg-info p-5">
        <div class="d-flex justify-content-start">
            <div class="d-flex gap-3 text-wrap">
                @foreach ($data as $item)
                    <div class="card p-4 col-2 text-truncate">
                        <div>{{ $item->p_name }}</div>
                        <div>{{ $item->p_unit }}</div>
                        <div>{{ $item->p_price }}</div>
                        <div>{{ $item->p_xdate }}</div>
                        <div>{{ $item->p_available }}</div>
                    </div>
                    <!-- Add more columns as needed -->
                @endforeach
            </div>
        </div>
    </div>
    
    

    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>


    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
</body>
</html>