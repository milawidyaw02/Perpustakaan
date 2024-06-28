<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
</head>
<body>
    <h1>Books List</h1>

    @if(isset($books->works))
        <ul>
            @foreach ($books->works as $book)
                <li>
                    <h3>{{ $book->title }}</h3>
                    
                    @if(isset($book->first_publish_date))
                        <p>First Publish Date: {{ $book->first_publish_date }}</p>
                    @endif
                    @if(isset($book->subject))
                        <p>Subject: {{ implode(', ', $book->subject) }}</p>
                    @endif
                    @if(isset($book->cover_id))
                        <img src="https://covers.openlibrary.org/b/id/{{ $book->cover_id }}-L.jpg" alt="Book Cover">
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

</body>
</html>
