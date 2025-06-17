<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Top Authors</title>
</head>
<body>
<div class="container py-5">
    <h2 class="text-center mb-4">Top 10 Most Famous Authors</h2>
    
    <div class="row justify-content-center">
           
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Author Name</th>
                                <th>Voters</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($authors as $index => $author)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->voters }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No authors found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         <!-- Tombol Back -->
         <div class="mt-4 text-center">
            <a href="{{ url('/') }}" class="btn btn-secondary">
                ← Back
            </a>
        </div>
    </div>
</body>
</html>
