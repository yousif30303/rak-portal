<!-- resources/views/fees.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        .fees-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .fee {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            width: calc(50% - 20px);
            margin-bottom: 20px;
        }
        .fee:nth-child(even) {
            margin-left: 20px;
        }
        .fee-code {
            font-weight: bold;
            color: #007bff;
        }
        .fee-amount {
            font-size: 18px;
            margin-top: 5px;
        }
        .submit-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>Fees</h1>
    <form method="POST" action="{{route('payments')}}">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fees as $fee)
                    <tr>
                        <td>{{ $fee->fscode }}</td>
                        <td>{{ $fee->fsname }}</td>
                        <td>{{ $fee->fsamount }}</td>
                        <td><input type="checkbox" name="fees[]" value="{{ json_encode(['description' => $fee->fsname, 'code' => $fee->fscode, 'amount' => $fee->fsamount]) }}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit">Submit Selected Rows</button>
    </form>

</body>
</html>
