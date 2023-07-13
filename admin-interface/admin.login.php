<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopBuds Clothing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="page.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
    <script src="jquery-3.6.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
      </script>
</head>
<body>

<form action="func.php" method="post"
    style="margin-left: 500px; border: 1px solid gray; width: 410px; margin-top: 50px; height: 400px;">
    <h1 style="text-align: center;">Log In</h1>
    <div class="form-group" style="padding-top: 20px;">
        <label for="username">Username</label>
        <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp"
            placeholder="Enter Username" autocomplete="off">
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    </div>
    <div class="form-group" style="padding-top: 20px;">
        <label for="password">Password</label>
        <input type="password" name="loginpass" class="form-control" id="loginpass" placeholder="Password">
    </div>
    <h6 class="text-dark text-center">Don't have an account? <span><a href="signuppage.php">Create Account</a></span>
    </h6>
    <button type="submit" name="submit" class="btn btn-primary"
        style="margin-left: 100px; width: 50%; margin-top: 10px;">Log In</button>

        