<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Support Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <style>
        .is-invalid {
            border-color: #dc3545 !important;
        }
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: .875em;
            color: #dc3545;
        }
    </style>
</head>
<body class="bg-light">
<div class="d-flex justify-content-start mb-3">
    <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('success'))
                    <div class="alert alert-success mt-4 alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif



                <form action="{{ route('tickets.store') }}" method="POST" class="mt-4 p-4 border rounded shadow-sm bg-white">
                    @csrf
                    <h3 class="mb-4 text-center">Submit a Support Ticket</h3>

                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Enter your name" value="{{ old('name') }}" >
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" name="email" id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Enter your email" value="{{ old('email') }}" >
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" name="subject" id="subject"
                               class="form-control @error('subject') is-invalid @enderror"
                               placeholder="Ticket subject" value="{{ old('subject') }}" >
                        @error('subject')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                     id="message" rows="4" placeholder="Describe your issue" >{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="type" class="form-label">Ticket Type</label>
                        <select name="type" id="type"
                                 class="form-select @error('type') is-invalid @enderror" >
                            <option value="">Select Ticket Type</option>
                            <option value="technical" >Technical Issues</option>
                            <option value="billing" >Account & Billing</option>
                            <option value="product" >Product & Service</option>
                            <option value="general" >General Inquiry</option>
                            <option value="feedback" >Feedback & Suggestions</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Submit Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('message', {
            versionCheck: false 
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>