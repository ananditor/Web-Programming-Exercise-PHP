<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Matematika - Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <style>
        html{
            height: 100%;
        }
        body{
            background-image: url('https://images.pexels.com/photos/411207/pexels-photo-411207.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100%;
            color: grey;
        }
    </style>
</head>
<body>
    <div class="container container-fluid mt-5">
        <?php
            session_start();
            include_once("./dbconfig.php");
            if(isset($_COOKIE['pemain'])){
                if($_SESSION['nyawa'] == 0){
                    $insert = "INSERT INTO highscore (Player, Score) VALUES ('{$_COOKIE['pemain']}', '{$_SESSION['skor']}')";
                    if(!mysqli_query($conn, $insert)){
                        die("Insert Failed".mysqli_error($conn));
                    }
                    $fetch = "SELECT * FROM highscore ORDER BY Score DESC LIMIT 10";
                    $search = mysqli_query($conn, $fetch);
                    $index = 1;
                    if(mysqli_num_rows($search) > 0){
                        ?>
                        <center>
                            <h1>Global Leaderboard</h1>
                        </center>
                        <table class="table table-bordered table-dark">
                            <tr>
                                <th>Pemain</th>
                                <th>Score</th>
                            </tr>
                            <?php
                        while($data = mysqli_fetch_assoc($search)){
                            echo("<tr>
                                <td>{$data['Player']}</td>
                                <td>{$data['Score']}</td>
                            </tr>");
                        }
                        mysqli_close($conn);
                        ?>
                        </table>
                        <?php

                    }
                    ?>
                    <h1>Hello, <?php echo $_COOKIE['pemain']?> Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik.</h1>
                    <p>Score Anda <?php echo $_SESSION['skor'] ?></p>
                    <a href='main.php' class="btn btn-warning">Main Lagi</a>
                    <?php
                    $_SESSION['angka1'] = random_int(0, 20);   
                    $_SESSION['angka2'] = random_int(0, 20);
                    $_SESSION['nyawa'] = 5;
                    $_SESSION['skor'] = 0;
                    
                }else{
                    $hasil = $_SESSION['angka1'] + $_SESSION['angka2'];
                    if(isset($_POST['jawab'])){
                        if($_POST['jawaban'] == $hasil){
                            $_SESSION['skor'] += 10;
                            ?>
                            <h1>Hello <?php echo $_COOKIE['pemain'] ?>, Selamat jawaban Anda benar…</h1>
                            <p>Lives: <?php echo $_SESSION['nyawa'] ?> | Score: <?php echo $_SESSION['skor'] ?></p> 
                            <?php
                        }else{
                            $_SESSION['skor'] -= 2;
                            $_SESSION['nyawa'] -= 1;
                            ?>
                            <h1>Hello <?php echo $_COOKIE['pemain'] ?>, sayang jawaban Anda salah… tetap semangat ya !!!</h1>
                            <p>Lives: <?php echo $_SESSION['nyawa'] ?> | Score: <?php echo $_SESSION['skor'] ?></p> 
                            <?php
                        }
                        $_SESSION['angka1'] = random_int(0, 20);   
                        $_SESSION['angka2'] = random_int(0, 20);
                        ?>
                        <a href="main.php" class="btn btn-primary">Soal Selanjutnya</a>
                        <?php
                    }else{
                        ?>
                        <form action="main.php" method="post">
                            <table>
                                <tr>
                                    <td>Berapakah <?php echo "{$_SESSION['angka1']} + {$_SESSION['angka2']} = "?></td>
                                    <td><input type="number" name="jawaban" class="form-control"></td>
                                </tr>
                            </table>
                            <button type="submit" name="jawab" class="btn btn-dark">Jawab</button>
                        </form>
                        <?php
                    }
                }
            }else{
                header("Location: index.php");
            }

        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>