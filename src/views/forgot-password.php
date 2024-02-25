<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <h1>Forgot Password</h1>
    <form action="src/controllers/passwordResetController.php" method="post">
        <input type="email" name="email" placeholder="Email">
        <button type="submit" name="forgot-password">Submit</button>
    </form>
</body>
</html>
