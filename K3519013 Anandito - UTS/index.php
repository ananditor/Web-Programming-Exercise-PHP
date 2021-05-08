<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Matematika - Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        html{
            height: 100%;
        }
        body{
            min-height: 100%;
            background-image: url('https://images.pexels.com/photos/53621/calculator-calculation-insurance-finance-53621.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    
    <div class="container container-fluid mt-5">
        <?php
            if(isset($_COOKIE['pemain'])){
                ?>
                    <h1>Hallo <?php echo"{$_COOKIE['pemain']}"?> , selamat datang kembali di permainan ini!!!</h1>
                    <a href='main.php'class="btn btn-primary">Start Game</a>
                    <p>Bukan Anda? <a href='destroy.php'class="btn btn-warning">Klik Disini</a></p>
                <?php
            }else{
                ?>
                <form action="proses.php" method="post" class="form form-control-lg">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama">
                    <label for="nama" class="form-label">Email</label>
                    <input type="email" class="form-control mb-3" name="email" style="border: none;">
                    <button type="submit" class="btn btn-primary" name="submit">Login</button>

                </form>
                <?php
            }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>