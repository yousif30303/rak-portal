<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        /* CSS styles for the container */
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 20px;
        }

        .payment-details {
            flex-basis: 45%;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .payment-link {
            flex-basis: 45%;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* CSS styles for iframe */
        .payment-iframe {
            width: 100%;
            height: 600px; /* Adjust height as needed */
            border: none; /* Remove border */
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Get the button element
    var button = document.querySelector('button');
    
    // Add a click event listener to the button
    button.addEventListener('click', function() {
        // Wait for 10 seconds (10000 milliseconds)
        setTimeout(function() {
            // Redirect to another URL
            window.location.href = 'https://www.example.com'; // Replace 'https://www.example.com' with your desired URL
        }, 10000); // 10000 milliseconds = 10 seconds
    });
});
    </script>
    <script>
        window.addEventListener('onbeforeunload', function (e) {
          // Cancel the event
          e.preventDefault();
          // Chrome requires returnValue to be set
          e.returnValue = '';
      
          // Prompt the user
          var confirmationMessage = 'Are you sure you want to leave?';
          e.returnValue = confirmationMessage; // Gecko and Trident
          return confirmationMessage; // Gecko and WebKit
        });
      </script>
</head>
<body>
    <div class="container">
        <div class="payment-details">
            <!-- Payment details content here -->
            <h2>Payment Details</h2>
            <p>Details about the payment go here...</p>
        </div>
        <div class="payment-link">
            <!-- Payment link content here -->
            <h2>Payment Link</h2>
            <!-- Embedding the payment link using iframe -->
            <iframe class="payment-iframe" src="{{$url}}" frameborder="0"></iframe>
        </div>
    </div>
</body>
</html>