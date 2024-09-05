<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway Form</title>
    <link rel="stylesheet" href="payment.css">
</head>

<body>
    <div class="payment-form">
        <h1>Payment Details</h1>
        <form id="paymentForm">
            <label for="payment-method">Select Payment Method:</label><br>
            <select id="payment-method" name="payment-method" class="select-field" onchange="togglePaymentDetails()" required>
                <option value="select">Select Your payment option</option>
                <option value="credit-card">Credit Card</option>
                <option value="debit-card">Debit Card</option>
                <option value="net-banking">Net Banking</option>
                <option value="upi">UPI</option>
            </select><br><br>
            <div id="cardDetails" style="display: none;">
                <label for="card-number">Card Number:</label><br>
                <input type="text" id="card-number" name="card-number" class="input-field" required><br>
                <label for="expiry-date">Expiry Date:</label><br>
                <input type="text" id="expiry-date" name="expiry-date" class="input-field" required><br>
                <label for="cvv">CVV:</label><br>
                <input type="text" id="cvv" name="cvv" class="input-field" required><br>
                <label for="name">Cardholder's Name:</label><br>
                <input type="text" id="name" name="name" class="input-field" required><br>
            </div>
            <div id="upiDetails" style="display: none;">
                <label for="upi">UPI ID:</label><br>
                <input type="email" id="upi" name="upi" class="input-field" required><br>
            </div>
            <div id="netBankingDetails" style="display: none;">
                <label for="bank-name">Bank Name:</label><br>
                <input type="text" id="bank-name" name="bank-name" class="input-field" required><br>
                <label for="account-number">Account Number:</label><br>
                <input type="text" id="account-number" name="account-number" class="input-field" required><br>
                <label for="ifsc-code">IFSC Code:</label><br>
                <input type="text" id="ifsc-code" name="ifsc-code" class="input-field" required><br>
            </div>
            <label for="amount">Amount:</label><br>
            <input type="text" id="amount" name="amount" class="input-field" required><br><br>
            <button type="submit" class="pay-button" onclick="newPage(event)">Pay Now</button>
        </form>
    </div>

    <script>
    function togglePaymentDetails() {
        let paymentMethod = document.getElementById("payment-method").value;
        let cardDetails = document.getElementById("cardDetails");
        let upiDetails = document.getElementById("upiDetails");
        let netBankingDetails = document.getElementById("netBankingDetails");

        cardDetails.style.display = "none";
        upiDetails.style.display = "none";
        netBankingDetails.style.display = "none";

        if (paymentMethod === "credit-card" || paymentMethod === "debit-card") {
            cardDetails.style.display = "block";
        } else if (paymentMethod === "upi") {
            upiDetails.style.display = "block";
        } else if (paymentMethod === "net-banking") {
            netBankingDetails.style.display = "block";
        }
    }

    function newPage(event) {
        event.preventDefault(); // Prevent form submission
        window.location.href = "thanks.php"; // Redirect to the new page
    }
    </script>
</body>

</html>
