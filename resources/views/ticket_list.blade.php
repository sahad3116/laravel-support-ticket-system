<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Tickets</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">

    <div class="container">
        @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  

@endif
  <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Support Tickets</h2>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>

        <table id="ticketTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Type</th>
                    <th>Submitted At</th>
                     <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
    <tr>
        <td>{{ $ticket->id }}</td>
        <td>{{ $ticket->name }}</td>
        <td>{{ $ticket->email }}</td>
        <td>{{ $ticket->subject }}</td>
        <td>{{ ucfirst($ticket->type) }}</td>
        <td>{{ $ticket->created_at->format('d M Y, h:i A') }}</td>
                <td>{{ $ticket->status }}</td>

        <td>
        <form action="{{ route('tickets.view', ['id' => $ticket->id, 'source' => $ticket->source]) }}" method="POST" class="d-inline">
    @csrf
    <button class="btn btn-sm btn-info" {{ $ticket->status === 'noted' ? 'disabled' : '' }}>
        @if($ticket->status === 'noted')
             Noted
        @else
             View
        @endif
    </button>
</form>





        </td>
    </tr>
@endforeach

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#ticketTable').DataTable();
        });
    </script>
<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            alert.style.display = 'none';
        }
    }, 3000); 
</script>

</body>
</html>
