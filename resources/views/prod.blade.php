<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Arvin Crud Laravel & Ajax</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
  <link rel='stylesheet'href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

</head>
<body class="bg-light">
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-primary d-flex justify-content-between align-items-center p-3">
            <h4 class="text-light">Manage Products</h4>
            <button data-toggle="tooltip" data-placement="top" title="Add Product" class="vibrate-1 btn btn-light d-flex justify-content-evenly text-primary align-items-center gap-2" style="border-radius: 20px;" data-bs-toggle="modal" data-bs-target="#addProductModal"><i
                class="bi bi-plus-square-dotted fs-5 text-primary"></i>Add Product</button>
          </div>
          <div class="w-100 p-3">
            <div class="card-body p-3" id="show_all_products">
              <h3 class="text-center text-primary my-5">Loading...</h3>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
{{-- add new product modal start --}}
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Add New Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_product_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="p_name">Product Name</label>
              <input type="text" name="p_name" class="form-control" placeholder="Product Name" required>
            </div>
            <div class="col-lg">
              <label for="p_unit">Unit</label>
              <input type="text" name="p_unit" class="form-control" placeholder="Unit" required>
            </div>
          </div>
          <div class="my-2">
            <label for="p_price">Price</label>
            <input type="number" name="p_price" class="form-control" placeholder="Price" required>
          </div>
          <div class="my-2">
            <label for="p_xdate">Expiry Date</label>
            <input type="date" name="p_xdate" class="form-control" placeholder="" required>
          </div>
          <div class="my-2">
            <label for="p_available">Available</label>
            <input type="number" name="p_available" class="form-control" placeholder="Available" required>
          </div>
          <div class="my-2">
            <label for="p_image">Select Image</label>
            <input type="file" name="p_image" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_product_button" class="btn btn-primary">Add Product</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new product modal end --}}

{{-- edit product modal start --}}
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_product_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="prod_id" id="prod_id">
        <input type="hidden" name="prod_p_image" id="prod_p_image">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="p_name">Product Name</label>
              <input type="text" name="p_name" id="p_name" class="form-control" placeholder="Product Name" required>
            </div>
            <div class="col-lg">
              <label for="p_unit">Unit</label>
              <input type="text" name="p_unit" id="p_unit" class="form-control" placeholder="Unit" required>
            </div>
          </div>
          <div class="my-2">
            <label for="p_price">Price</label>
            <input type="number" name="p_price" id="p_price" class="form-control" placeholder="Price" required>
          </div>
          <div class="my-2">
            <label for="p_xdate">Expiry Date</label>
            <input type="date" name="p_xdate" id="p_xdate" class="form-control" placeholder="" required>
          </div>
          <div class="my-2">
            <label for="p_available">Available</label>
            <input type="number" name="p_available" id="p_available" class="form-control" placeholder="Available" required>
          </div>
          <div class="my-2">
            <label for="p_image">Select Image</label>
            <input type="file" name="p_image" class="form-control">
          </div>
          <div class="mt-2" id="p_image">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_product_btn" class="btn btn-primary">Update Product</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit product modal end --}}

{{-- view product modal start --}}
<div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">View Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="view_product_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="prod1_id" id="prod_id">
        <input type="hidden" name="prod1_p_image" id="prod_p_image">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="p1_name">Product Name</label>
              <input type="text" name="p1_name" id="p1_name" class="form-control"  readonly>
            </div>
            <div class="col-lg">
              <label for="p1_unit">Unit</label>
              <input type="text" name="p1_unit" id="p1_unit" class="form-control"  readonly>
            </div>
          </div>
          <div class="my-2">
            <label for="p1_price">Price</label>
            <input type="number" name="p1_price" id="p1_price" class="form-control"  readonly>
          </div>
          <div class="my-2">
            <label for="p1_xdate">Expiry Date</label>
            <input type="date" name="p1_xdate" id="p1_xdate" class="form-control"  readonly>
          </div>
          <div class="my-2">
            <label for="p1_available">Available</label>
            <input type="number" name="p1_available" id="p1_available" class="form-control"  readonly>
          </div>
          <div class="my-2">
            <label for="p2_available">Available Inventory Cost</label>
            <input type="number" name="p2_available" id="p2_available" class="form-control"  readonly>
          </div>

          <div class="mt-2" id="p1_image">

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- view product modal end --}}



  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(function() {
      // add new product ajax request
      $("#add_product_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_product_button").text('Adding...');
        $.ajax({
          url: '{{ route('store1') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire({
                    icon: 'success',
                    title: 'Added Successfully',
                    showConfirmButton: false,
                    timer: 1700,
                    timerProgressBar: false,
                    toast: true,
                    position: 'top',
                    iconColor: '#0d6efd',
                    customClass: {
                      popup: 'colored-toast'
                    },
                  })
                  fetchAllProducts();
            }
            $("#add_product_button").text('Add Product');
            $("#add_product_form")[0].reset();
            $("#addProductModal").modal('hide');
          }
        });
      });

      // edit product ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('edit1') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            var formattedPrice = parseFloat(response.p_price).toFixed(2);
            $("#p_name").val(response.p_name);
            $("#p_unit").val(response.p_unit);
            $("#p_price").val(formattedPrice);
            $("#p_xdate").val(response.p_xdate);
            $("#p_available").val(response.p_available);
            $("#p_image").html(
              `<img src="storage/images/${response.p_image}" width="100" class="img-fluid img-thumbnail">`);
            $("#prod_id").val(response.id);
            $("#prod_p_image").val(response.p_image);
          }
        });
      });

      // view product ajax request
      $(document).on('click', '.viewIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('view1') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {

            var result = response.p_available * response.p_price;
            var formattedPrice = parseFloat(response.p_price).toFixed(2);
            var formattedPrice1 = parseFloat(result).toFixed(2);
            $("#p1_name").val(response.p_name);
            $("#p1_unit").val(response.p_unit);
            $("#p1_price").val(formattedPrice);
            $("#p1_xdate").val(response.p_xdate);
            $("#p1_available").val(response.p_available);
            $("#p2_available").val(formattedPrice1);
            $("#p1_image").html(
              `<img src="storage/images/${response.p_image}" width="300" class="img-fluid img-thumbnail">`);
            $("#prod1_id").val(response.id);
            $("#prod1_p_image").val(response.p_image);
          }
        });
      });

      // update product ajax request
      $("#edit_product_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_product_btn").text('Updating...');
        $.ajax({
          url: '{{ route('update1') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire({
                    icon: 'success',
                    title: 'Updated Successfully',
                    showConfirmButton: false,
                    timer: 1700,
                    timerProgressBar: false,
                    toast: true,
                    position: 'top',
                    iconColor: '#0d6efd',
                    customClass: {
                      popup: 'colored-toast'
                    },
                  })
              fetchAllProducts();
            }
            $("#edit_product_btn").text('Update Product');
            $("#edit_product_form")[0].reset();
            $("#editProductModal").modal('hide');
          }
        });
      });

      // delete product ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('delete1') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted Successfully',
                    showConfirmButton: false,
                    timer: 1700,
                    timerProgressBar: false,
                    toast: true,
                    position: 'top',
                    iconColor: '#0d6efd',
                    customClass: {
                      popup: 'colored-toast'
                    },
                  })
                fetchAllProducts();
              }
            });
          }
        })
      });

      // fetch all product ajax request
      fetchAllProducts();

      function fetchAllProducts() {
        $.ajax({
          url: '{{ route('fetchAll1') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_products").html(response);
            $("table").DataTable({
            "paging": true, // Enable pagination
            "searching": true, // Enable search bar
            "ordering": true, // Disable sorting
            "responsive": true
            });
          }
        });
      }
    });
  </script>
 <script>
  function startVibration() {
    var button = document.querySelector('.vibrate-1');
    button.style.animation = 'vibrateAnimation 0.3s ease-in-out infinite';
  }

  function stopVibration() {
    var button = document.querySelector('.vibrate-1');
    button.style.animation = 'none';
  }

  setInterval(function() {
    startVibration();
    setTimeout(stopVibration, 3000); // Stop after 3 seconds
  }, 5000); // Start every 5 seconds
</script>

<script>
    $(document).ready(function () {
        // Handle "Select All" checkbox
        $('#selectAll').on('change', function () {
            $('.select-checkbox').prop('checked', $(this).prop('checked'));
        });

        // Handle individual checkbox change
        $('.select-checkbox').on('change', function () {
            var allChecked = $('.select-checkbox:checked').length === $('.select-checkbox').length;
            $('#selectAll').prop('checked', allChecked);
        });

        // ... other JavaScript code ...
    });
</script>

<style>
  .table{
      max-width: 100%;
      overflow-x: auto;
  }
  table tr:hover {
      cursor: pointer;
      color: #0d6efd;
    }
  .table tbody td {
      padding: auto;
      border:none;
      margin-bottom: 0;
  }
  .table thead th {
    border: none;
    padding: 10px;
    color:#0d6efd;
  }
  .card-body {
    max-width: 100% auto;
    overflow-x: auto; /* Enable horizontal scrollbar if needed */
  }

  .colored-toast.swal2-icon-success {
    margin-top: 30px;
    background-color: #fff !important;
    border-radius: 50px;
    padding: 15px;
    display: flex;
    justify-content: center;
    font-size: 15px;
  }
  .colored-toast .swal2-title {
      color: #0d6efd;
  }

  @keyframes vibrateAnimation {
      0% { transform: translate(0); }
      25% { transform: translate(-2px, 2px); }
      50% { transform: translate(2px, -2px); }
      75% { transform: translate(2px, 2px); }
      100% { transform: translate(-2px, -2px); }
    }

    .vibrate-1 {
      animation: none; /* initially, no animation */
    }
.modal.fade .modal-dialog {
    transform: translate(0, -50%);
    opacity: 0;
    transition: transform 0.3s ease-out, opacity 0.3s ease-out;
}

.modal.fade.show .modal-dialog {
    transform: translate(0, 0);
    opacity: 1;
}

/* Override the Bootstrap modal fade-out animation */
    .modal.fade .modal-dialog {
      transition: transform 0.3s ease-out;
      transform: translate(0, -50%);
    }

    .modal.fade.show .modal-dialog {
      transform: translate(0, 0);
    }
.table-hover tbody tr:hover {
  background-color: #58585809;
}
</style>
</body>

</html>
