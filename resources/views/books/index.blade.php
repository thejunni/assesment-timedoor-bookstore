<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">📚 Book List</h2>
            <div>
                <a href="{{ route('rate.create') }}" class="btn btn-success me-2">Submit Rating</a>
                <a href="{{ route('authors.top') }}" class="btn btn-outline-primary">Top 10 Authors</a>
            </div>
        </div>

        <!-- Filter Form -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('books.index') }}" class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label for="limit" class="form-label">Show Amount</label>
                        <select name="limit" class="form-select">
                            @for ($i = 10; $i <= 100; $i += 10)
                                <option value="{{ $i }}" {{ request('limit') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="search" class="form-label">Search Book / Author</label>
                        <input type="text" name="search" class="form-control" placeholder="e.g. Harry Potter or J.K. Rowling" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Book Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Book Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Average Rating</th>
                        <th>Total Voters</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $index => $book)
                        <tr>
                            <td>{{ $books->firstItem() + $index }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ number_format($book->average_rating, 2) }}</td>
                            <td>{{ $book->voters }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted">No books found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Right Pagination -->
        <div class="d-flex justify-content-end mt-4">
            {{ $books->withQueryString()->links() }}
        </div>        
    </div>
</body>
</html>
