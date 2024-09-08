<?php
include_once './list.php';
session_start();
if ($_SESSION['list'] == null) {
    //if there is no session before
    $list = new BankingSystem();
    $_SESSION['list'] = $list;
} else {
    $list = $_SESSION['list'];
}
$data = new TransactionNode(0, null, null, null, 10);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>

    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
    <header class="header">
        <div class="brand">
            <h1><i class='bx bxs-bank'></i> Banking System</h1>
        </div>
        <div class="pages">
            <a href="./index.php">HOME</a>
            <a href="./Transaction.php">TRANSACTIONS</a>
            <a href="./Deposit.php">DEPOSIT</a>
            <a href="./Withdrawel.php">WITHDRAW</a>
            <a href="./search.php">SEARCH</a>
        </div>
    </header>

    <div class="form-container">
        <form class="form" method="POST">
            <label>ID :</label>
            <input type="text" name="sid" id="sid" value="0">

            <button type="submit" id="search" method="POST">SEARCH<i class='bx bx-search-alt'></i></button>
        </form>
    </div>

    <?php
        $sid = $_POST['sid'];
        $data = $list->searchTransaction($sid);
    ?>

    <?php
    if ($sid == 0) {
    ?>
        <h4 class="head">Please Enter Id</h4>
    <?php
    } else if ($data !== null) {
    ?>
        <div class="form-cont">
            <form class="form">
                <label>Account No:</label><br>
                <input type="text" id="id" name="id" value="<?= $data->id ?>"><br><br>

                <label>User Name:</label><br>
                <input type="text" id="name" name="name" value="<?= $data->name ?>" readonly><br><br>

                <label>Type:</label><br>
                <input type="text" id="type" name="type" value="<?= $data->type ?>" readonly><br><br>

                <label>Amount:</label><br>
                <input type="text" id="amount" name="amount" value="<?= $data->amount ?>" readonly><br><br>

                <label>NIC:</label><br>
                <input type="text" id="nic" name="nic" value="<?= $data->nic ?>" readonly><br><br>


            </form>
            <img src="search.png">
        </div>
    <?php
    } else {
    ?>
        <h4 class="head">No Data Found</h4>
    <?php
    }
    ?>

    <script src="https://unpkg.com/scrollreveal"></script>

    <script>
        const sr = ScrollReveal({
            distance: '80px',
            duration: 1250,
            reset: true,
            scroll: true
        });

        sr.reveal('form', {
            delay: 650,
            origin: 'left'
        });

        sr.reveal('table', {
            delay: 650,
            origin: 'bottom'
        });

        sr.reveal('img', {
            delay: 650,
            origin: 'top'
        });

        sr.reveal('.header', {
            delay: 650,
            origin: 'top'
        });
    </script>

</body>

</html>