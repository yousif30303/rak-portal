<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Payment Page</title>
   
</head>
<body class="bg-gray-200">
    
    <div class="flex justify-between mt-5">
        <div class="w-4/12 bg-white p-6 rounded-lg ml-4" style="height: 300px">
            <!-- Payment details content here -->
            <h2>Payment Details</h2>
            <p>Details about the payment go here...</p>
        </div>
        <div style="width:800px" class="bg-white p-6 rounded-lg mr-4">
            <!-- Embedding the payment link using iframe -->
            <iframe class="w-full" style="height: 570px" src="{{$url}}" frameborder="0"></iframe>
        </div>
    </div>
</body>
</html>