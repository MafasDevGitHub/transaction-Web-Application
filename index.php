<?php
    include_once './list.php';
    session_start();

    if($_SESSION['list'] !== null){
        // if session exists
        $list = $_SESSION['list'];
    }else{
        $list = new BankingSystem();
        $_SESSION['list'] = $list;
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit</title>
    <link rel="stylesheet" href="Styles.css">
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>

    <header class="header">
        <div class="brand">
            <h1><i class='bx bxs-bank'></i> Banking System</h1>
        </div>
        <div class="pages">
            <!-- <a href="">HOME</a>
            <a href="">TRANSACTIONS</a>
            <a href="">DEPOSIT</a>
            <a href="">WITHDRAW</a> -->
            <!-- <a href="">SEARCH</a> -->
            <p>Your Banking Partner</p>
        </div>


    </header>

    <div class="main">
    <?php  ?>
        <div class="sub">
            <div class="balance">
                <p>Account Balance : Rs.<?= $list->getBalance() ?></p>
            </div>
            <div class="buttons">
                <button><a href="./Deposit.php">DEPOSIT</a></button>
                <button><a href="./Withdrawel.php">WITHDRAW</a></button>
                <button><a href="./Transaction.php">TRANSACTIONS</a></button>
                <button><a href="./search.php">SEARCH</a></button>
            </div>
        </div>
        
        <div class=" image">
                        <img src="backnew.png" alt="Description of the image">
        </div>


        </div>

        <script src="https://unpkg.com/scrollreveal"></script>

        <!-- <script>
            const sr = ScrollReveal({
                distance: '80px',
                duration: 1250,
                reset: true,
                scroll: true
            });

            sr.reveal('img', {
                delay: 650,
                origin: 'bottom'
            });

            sr.reveal('.blance', {
                delay: 650,
                origin: 'left'
            });

            sr.reveal('.buttons', {
                delay: 650,
                origin: 'left'
            });

            sr.reveal('.header', {
                delay: 650,
                origin: 'top'
            });
        </script> -->
</body>