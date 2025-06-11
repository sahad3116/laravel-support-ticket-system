<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 100px;
            text-align: center;
            background-image: url('https://img.freepik.com/free-photo/flat-lay-desk-concept-with-copy-space_23-2148236810.jpg?semt=ais_hybrid&w=740'); /* Replace with your image URL */
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
            background-position: center center; 
        }
        .btn-lg {
            width: 200px;
            margin: 10px;
        }
    </style>
</head>
<body>

    <h1>Welcome</h1>

    <div class="mt-5">
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg"> Login</a>
        <a href="{{ route('tickets') }}" class="btn btn-success btn-lg">Submit Ticket</a>
    </div>

</body>
</html>