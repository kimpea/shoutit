<?php include 'database.php'; ?>
<?php
    //Create Select Query
    $query = "SELECT * FROM shout ORDER BY id DESC";
    $shouts = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css" type="text/css"/>
    <title>SHOUT IT!</title>
</head>
<body>
    <div id="container">
    
        <header>
            <h1>SHOUT IT! Shoutbox</h1>
        </header>
        <div id="shouts">
            <ul>
                <?php while($row = mysqli_fetch_assoc($shouts)) : ?>
                    <li class="shout"><span><?php echo $row['time'] ?> - </span><?php echo $row['user'] ?>: <?php echo $row['message'] ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div id="input">
            <?php if(isset($_GET['error'])) : ?>
                <div class="error"><?php echo $_GET['error']; ?></div>
            <?php endif; ?>
            <form method="POST" action="process.php">
                <input type="text" name="user" placeholder="Enter Your Name" />
                <input type="text" name="message" placeholder="Enter A Message" />
                <br />
                <input class="shout-btn" type="submit" name="submit" value="Shout It Out" />
            </form>
        </div>
    </div>
</body>
</html>