<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <h1>Proceed to Payment</h1>
    <button id="rzp-button1">Pay Now</button>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    document.getElementById('rzp-button1').onclick = function (e) {
        fetch('{{ url("/api/checkout") }}')
        .then(res => res.json())
        .then(data => {
            var options = {
                "key": data.razorpay_key,
                "amount": data.amount,
                "currency": data.currency,
                "name": "My E-Commerce",
                "description": "Test Transaction",
                "order_id": data.order_id,
                "handler": function (response){
                    alert("Payment ID: " + response.razorpay_payment_id);
                    // You can call API to store payment confirmation
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        });
        e.preventDefault();
    }
    </script>

</body>
</html>
