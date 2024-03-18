<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    {{-- datatable start --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap5.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.dataTables.css">
    {{-- datatable end --}}

    <style>
        div.container {
            width: 80%;
        }
    </style>

  </head>
  <body class="bg-light">
    {{-- <div class="container">
        <div class="card-body">
            {{ $employees->first()->p_name }}
        </div>
        <div class="mt-3 col-xl-6">
            <div class="col justify-content-between d-flex align-items-center col-xl-12 mb-2">
                <label class="">Employee Name</label>
                <label class="">Data count: {{$count}}</label>
            </div>


            <select name="data" id="data" class="form-select form-control">

                <option value="">--Select an option--</option>

                @foreach($employees as $option)
                <option value="{{ $option->id }}">{{ $option->p_name }}</option>
                @endforeach

            </select>
        </div>

        <div class="form-row row">
            <div class="col-xl-6">
                <label for="txt-time">Product name:</label>
                <input type="text" name="p_name" class="form-control" id="p_name" readonly>
                <h1   id="p_name_display"></h1>
            </div>
            <div class="col-xl-6">
                <label for="txt-time">Unit:</label>
                <input type="text" name="p_unit" class="form-control" id="p_unit" readonly>
            </div>
            <div class="col-xl-6">
                <label for="txt-time">Price:</label>
                <input type="text" name="p_price" class="form-control" id="p_price" readonly>
            </div>
            <div class="col-xl-6">
                <label for="txt-time">Available:</label>
                <input type="text" name="p_available" class="form-control" id="p_available" readonly>
            </div>
            <div class="col-xl-6">
                <img id="p_image" name="p_image" src="storage/images/" alt="User Image" style="width: 5rem; height: 5rem;">
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="card mt-5 mb-5 shadow-sm border-0">
            <div class="card-header bg-white">
                <h4 class="mt-1">Table Sample</h4>
            </div>
            <div class="card-body table-responsive">
                <table id="example" class="table table-hover mt-3 w-100">
                    <thead>
                        <tr>
                            <th>Seq.</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tiger</td>
                            <td>Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Garrett</td>
                            <td>Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>

                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ashton</td>
                            <td>Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>

                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Cedric</td>
                            <td>Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>

                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Airi</td>
                            <td>Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>

                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Brielle</td>
                            <td>Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>

                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Brielle</td>
                            <td>Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>

                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Brielle</td>
                            <td>Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>

                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Brielle</td>
                            <td>Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>

                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Brielle</td>
                            <td>Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>

                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Brielle</td>
                            <td>Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>

                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Brielle</td>
                            <td>Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>

                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- datatable start --}}

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"></script>

    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.dataTables.js"></script>
    {{-- datatable end --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        new DataTable('#example', {
            ordering: false,
            responsive: true,
            stateSave: true,
            language: {
                search: "Search here: "
            },
            rowReorder: {
                selector: 'td:nth-child(2)',
                snapX: 50
            },
            layout: {
                topStart: {
                    buttons: [
                        'pageLength',
                        'colvis',
                        // {
                        //     extend: 'colvis',
                        //     text:'<i class="fas fa-eye"></i>',
                        //     titleAttr: 'Column visibility',
                        // },
                        {

                            text: '<i class="fas fa-file-code"></i>',
                            titleAttr: 'Download as JSON',
                            action: function (e, dt, button, config) {
                                var data = dt.buttons.exportData();

                                DataTable.fileSave(new Blob([JSON.stringify(data)]), 'Sample of json_file.json');
                            }
                        },
                        {
                            extend: 'copy',
                            text:'<i class="fas fa-copy"></i>',
                            titleAttr: 'Copy to clipboard',
                            exportOptions: {
                                rows: ':visible',
                                columns: ':visible'
                            },
                        },
                        {
                            extend: 'csvHtml5',
                            text:'<i class="fas fa-file-csv"></i>',
                            titleAttr: 'Download as CSV',
                            exportOptions: {
                                rows: ':visible',
                                columns: ':visible'
                            },
                        },
                        {
                            extend: 'excelHtml5',
                            text:'<i class="fas fa-file-excel"></i>',
                            titleAttr: 'Download as Excel',
                            messageTop:
                                'This print was produced using the Print button for DataTables',
                            title:"Monthly sales of the company.",
                            exportOptions: {
                                rows: ':visible',
                                columns: ':visible'
                            },
                        },
                        {
                            extend: 'pdfHtml5',
                            text:'<i class="fas fa-file-pdf"></i>',
                            titleAttr: 'Download as PDF',
                            messageTop:
                                'This print was produced using the Print button for DataTables',
                            title:"Monthly sales of the company.",
                            download: 'open',
                            exportOptions: {
                                rows: ':visible',
                                columns: ':visible'
                            },
                        },
                        {
                            extend: 'print',
                            text:'<i class="fas fa-print"></i>',
                            titleAttr: 'Print the table',
                            messageTop:
                                'This print was produced using the Print button for DataTables',
                            title:"Monthly sales of the company.",
                            exportOptions: {
                                rows: ':visible',
                                columns: ':visible'
                            },
                            customize: function (win) {
                                $(win.document.body)
                                    .css('font-size', '8pt')
                                    .prepend(
                                        '<img  width="64" height="64" src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/external-global-business-and-management-kiranshastry-gradient-kiranshastry.png" style="opacity: 20%;width:400px; height: auto; position:absolute; top:50%; left:50%; transform: translate(-50%, -50%);" />'
                                    );

                                $(win.document.body)
                                    .find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            },
                        }
                    ]
                }
            }
        });

        $(document).ready(function () {
            $.ajax({
                url: "{{ route('test') }}",
                type: "GET",
                success: function(response) {
                    $('#save-count').text('Total Saved Data: ' + response.count);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
            $('#data').on('change', function() {
                var id = $(this).val();

                if(id){
                    $.ajax({
                        url: "{{ route('view_prod') }}",
                        type: 'GET',
                        data: { id: id },
                        success: function(response) {
                            $('#p_name').val(response.p_name);
                            $('#p_name_display').text(response.p_name);
                            $('#p_unit').val(response.p_unit);
                            $('#p_price').val(response.p_price);
                            $('#p_available').val(response.p_available);
                            $('#p_image').attr('src', 'storage/images/' + response.p_image);
                        }
                    });
                }
                else{

                    $('input').val('');
                    $('img').attr('src', '');
                }
            });
        });

    </script>
  </body>
</html>
