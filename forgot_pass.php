<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Masuk Seternak</title>
    <style>
        body{
            background-image: url(assets/bg-login.png);
            background-attachment: fixed;
            background-position: center center;
            background-repeat: no-repeat;
            background-size:cover;
        }
        #kartu{
            margin:50px auto;
            margin-top: 10%;;
           
        }
       
    </style>
</head>
<body>
<div class="container">
    <div class="card" id="kartu" style="width: 30rem;">
        <h5 class="card-header">Reset Password</h5>
        <div class="card-body">
        <form action="function/kirim_pass.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="text" class="form-control" id="" name="username" placeholder="Username" Required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="Submit" type="submit" value="Submit">Reset Password</button>
            </div>
        </form>
        </div>
    </div>

  
</div>
</body>
</html>