<header class="header">
    <div class="logo">
        <img src="logo1.png" alt="Logo">
    </div>
    <div class="title">
        <h2>Kunwar Bike Rental Services</h2>
    </div>
    <div class="right">
        <a href="logout.php" class = "link">Login/Logout</a>
    </div>
</header>

<style>
    *{
        margin: 0;
        padding: 0;
    }
.header {
    background-color:#333;
    color: #fff;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.logo img {
    height: 50px;
}

.title h2 {
    margin: 0;
    color:white;
}

.right {
    text-align: right;
    padding-left: 800px;
}
.link{
    color:white;
}

@media only screen and (max-width: 600px) {
    .header {
        flex-direction: column;
        align-items: flex-start;
    }

    .right {
        text-align: left;
        margin-top: 10px;
    }
}

</style>