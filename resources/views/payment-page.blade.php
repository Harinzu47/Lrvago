<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
        <h1 class="text-2xl font-bold text-center mb-6">Proceed to Payment</h1>
        <button id="pay-button" class="w-full bg-blue-500 text-white font-semibold py-2 rounded hover:bg-blue-600 transition duration-200">
            Pay Now
        </button>
    </div>

    <script>
        var snapToken = "{{ $snapToken }}";
        document.getElementById('pay-button').onclick = function () {
            snap.pay(snapToken, {
                onSuccess: function (result) {
                    console.log('Success:', result);
                    window.location.href = "/success";
                },
                onPending: function (result) {
                    console.log('Pending:', result);
                },
                onError: function (result) {
                    console.log('Error:', result);
                }
            });
        };
    </script>
</body>
</html>