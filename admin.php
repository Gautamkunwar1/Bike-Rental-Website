<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .header {
            background-color: #1a1a1a;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 50px;
        }

        .title h2 {
            margin: 0;
            color: white;
            font-size: 24px;
        }

        .right {
            display: flex;
            gap: 20px;
        }

        .right a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        .right a:hover {
            background-color: #575757;
            color: #e0e0e0;
        }

        main {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }

        main h2 {
            margin-bottom: 30px;
            font-size: 28px;
        }

        main a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            background-color: #1a1a1a;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        main a:hover {
            background-color: #333;
            color: #e0e0e0;
        }

        @media only screen and (max-width: 600px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .right {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
                margin-top: 10px;
            }

            .right a {
                width: 100%;
                text-align: left;
            }

            .title h2 {
                font-size: 20px;
            }

            main h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="logo1.png" alt="Logo">
        </div>
        <div class="title">
            <h2>Kunwar Bike Rental Services</h2>
        </div>
        <nav class="right">
            <a href="alluser.php" class="link">All Users</a>
            <a href="images\index.php" class="link">Images</a>
            <a href="addsuper.php" class="link">Add Superbike</a>
            <a href="addbike.php" class="link">Add Bike</a>
            <a href="addscooty.php" class="link">Add Scooty</a>
            <a href="login.php" class="link">LogOut</a>
        </nav>
    </header>
    <main>
        <h2><marquee behavior="" direction="">Welcome Mr. Gautam Singh Kunwar</marquee></h2>
        <a href="nbiketable.php">See the list of all bikes</a><br><br>
        <a href="allsuperbike.php">See the list of all super bikes</a><br><br>
        <a href="allscooty.php">See the list of all scooty</a><br><br>
        <a href="bookingSuperBike.php">All SuperBike booking</a><br><br>
        <a href="bookingBike.php">All Bike booking</a><br><br>
        <a href="bookingScooty.php">All Scooty booking</a><br>
    
    </main>
</body>

</html>
