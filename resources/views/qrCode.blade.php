<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>QR Code untuk {{ $book->judul_buku }}</h1>
        {!! $qrCode !!}
        <p>{{ $book->judul_buku }} - {{ $book->penulis }}</p>
    </div>
</body>
</html>
