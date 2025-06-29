<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Insert Rating</title>
</head>
<body>
    <div class="container py-5">
        <h2 class="text-center mb-4">Insert Rating</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                {{-- Form Select Author --}}
                <form method="GET" action="{{ route('rate.create') }}">
                    <div class="mb-3">
                        <label class="form-label">Book Author:</label>
                        <select name="author_id" class="form-select" onchange="this.form.submit()">
                            <option value="">Select an author</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>

                @if(request('author_id'))
                {{-- Form Submit Rating --}}
                <form method="POST" action="{{ route('rate.store') }}" id="ratingForm">
                    @csrf
                    <input type="hidden" name="author_id" value="{{ request('author_id') }}">

                    <div class="mb-3">
                        <label class="form-label">Book Title:</label>
                        <select name="book_id" class="form-select" required>
                            <option value="">Select a book</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rating:</label>
                        <select name="rating" class="form-select" required>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="d-grid">
                        <button id="submitBtn" type="submit" class="btn btn-primary">
                            <span id="btnText">Submit</span>
                            <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>
                @endif

                {{-- Tombol Back --}}
                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" class="btn btn-secondary">
                        ← Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Spinner on Submit --}}
    <script>
        const form = document.getElementById('ratingForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        const btnSpinner = document.getElementById('btnSpinner');

        if (form) {
            form.addEventListener('submit', function () {
                submitBtn.disabled = true;
                btnText.textContent = 'Submitting...';
                btnSpinner.classList.remove('d-none');
            });
        }
    </script>
</body>
</html>
