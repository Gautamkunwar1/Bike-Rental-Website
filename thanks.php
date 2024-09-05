<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #333;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .confirmation-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        .confirmation-box h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1a1a1a;
        }

        .confirmation-box p {
            font-size: 18px;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .confirmation-box a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #1a1a1a;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        .confirmation-box a:hover {
            background-color: #333;
            color: #e0e0e0;
        }

        @media only screen and (max-width: 600px) {
            .confirmation-box h1 {
                font-size: 20px;
            }

            .confirmation-box p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="confirmation-box">
        <h1>Booking Confirmed</h1>
        <p>Your Bike/Scooty has been booked. You can pick your bike from Kunwar Bike Rental Services near Big Bazaar, ISBT, Dehradun, Uttarakhand.</p>
        <a href="index.php">Go to Homepage</a>
    </div>
</body>

</html>
