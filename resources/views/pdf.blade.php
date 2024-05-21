<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generate PDF</title>

    <style>
        *{
            font-family: Arial, Helvetica, sans-serif
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td{
            border: 1px solid #333;
        }
    </style>
</head>
<body>
    <h1>Manhwa List</h1>

    <hr>

    <table class="table table-bordered table-striped">
        <thead class="table-pink">
            <tr>
                <th>Picture</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>QRcode</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($portfolio as $item)
                <tr>
                    <td><img src="{{ $item->imageUrl }}" alt="{{ $item->name }}" style="max-width: 100px;"></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->status}}</td>
                    <td><img src="data:image/png;base64,{{ base64_encode(QrCode::size(100)->generate($item->name)) }}" alt="QR Code"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
