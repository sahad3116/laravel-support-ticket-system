<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ticket: {{ $ticket->subject }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .ticket-card {
            margin-top: 50px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

    <div class="container">
       <div class="card-footer text-end">
    <a href="{{ route('ticket.list') }}" class="btn btn-secondary">Back to Ticket List</a>
</div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ticket-card">
                    <div class="card-header bg- text-black">
                        <h4 class="mb-0">Ticket Details: {{ $ticket->subject }}</h4>
                    </div>
                    <div class="card-body">
                      
                        <div class="mb-3">
                            <strong>Submitted By:</strong> {{ $ticket->name }}
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong> {{ $ticket->email }}
                        </div>
                        <div class="mb-3">
                            <strong>Subject:</strong> {{ $ticket->subject }}
                        </div>
                        <div class="mb-3">
                            <strong>Type:</strong> <span class="badge bg-secondary">{{ ucfirst($ticket->type) }}</span>
                        </div>
                        
                         <div class="mb-3">
                            <strong>Submitted At:</strong> {{ $ticket->created_at->format('M d, Y H:i A') }}
                        </div>
                         <div class="mb-3 d-flex justify-content-between align-items-center">
    <div>
        <strong>Status:</strong>
        @if ($ticket->status === 'Noted')
            <span class="badge bg-success">Noted</span>
        @else
            <span class="badge bg-warning text-dark">{{ $ticket->status }}</span>
        @endif
    </div>

    @if ($ticket->status !== 'Noted')
        <form action="{{ route('change-status', ['id' => $ticket->id, 'source' => $ticket->source]) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-primary">Mark as Noted</button>
        </form>
    @endif
</div>

                        <hr>
                        <div class="mb-3">
                            <strong>Message:</strong>
                            <div>
                                {!! $ticket->message !!}
                            </div>
                        </div>
                    </div>
                   <div class="card-footer text-end">
 



            </div>
<div class="row">
    <div class="col-md-12 mb-3">
        <form action="{{ route('admin.note.update', ['id' => $ticket->id, 'source' => $ticket->source]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="note" class="form-label"><strong>Admin Note:</strong></label>
                <textarea name="note" id="note" class="form-control" rows="4">{{ $ticket->note }}</textarea>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-success btn-sm">Update Note</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('note', {
        versionCheck: false
    });
</script>



                </div>
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>