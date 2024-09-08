<?php
    include_once './list.php';
    session_start();
    if($_SESSION['list'] == null){
        $list = new BankingSystem();
        $_SESSION['list'] = $list;
    }else{
        $list = $_SESSION['list'];
    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>

    <link rel="stylesheet" href="TransactionStyle.css">
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
            <a href="index.php">HOME</a>
            <a href="Transaction.php">TRANSACTIONS</a>
            <a href="Deposit.php">DEPOSIT</a>
            <a href="Withdrawel.php">WITHDRAW</a>
            <a href="search.php">SEARCH</a>
        </div>
    </header>

    <div class="form-container">
        <h1><i class='bx bx-money-withdraw'></i>TRANSACTIONS</h1>
    </div>

    <div class="table-container">
        <div class="table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>NIC</th>
                    <th>AMOUNT</th>
                    <th>TYPE</th>
                </tr>
                <?php 
                    $current = $list->head;
                    while($current !== null)
                    {?>
                    <tr>
                        <th><?= $current->id?></th>
                        <th><?= $current->name?></th>
                        <th><?= $current->nic?></th>
                        <th><?= $current->amount?></th>
                        <th><?= $current->type?></th>
                    </tr>
                <?php $current = $current->next; }?>
            </table> 

        </div>
        <img src="Transaction.png">
    </div>

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