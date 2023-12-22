<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css"
rel="stylesheet"
/>
</head>
<body>
    <div class="container">
        <div class="d-flex p-2 justify-content-center align-items-center bg-info w-100 h-100">
            <div>
                <button type="button" class="btn btn-primary position-relative">
                Inbox
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger">
                    {{ $data }}
                <span class="visually-hidden">unread messages</span>
                </span>
            </button>
            </div>
        </div>

        <div>
            @foreach ($data1 as $item)
                <div>{{$item -> p_name}}</div>
            @endforeach
        </div>
    </div>
<script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>
</html>
