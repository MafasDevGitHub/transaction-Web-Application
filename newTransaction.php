<?php
    include_once './list.php';
    session_start();

    if (isset($_SESSION['list']) && $_SESSION['list'] instanceof BankingSystem){

        $list = $_SESSION['list'];
        if($list == null){
            echo "<h1>No list!</h1>";
        }else{

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $name = isset($_POST['name']) ? $_POST['name'] : null;
            $type = isset($_POST['type']) ? $_POST['type'] : null;
            $amount = isset($_POST['amount']) ? $_POST['amount'] : null;
            $nic = isset($_POST['nic']) ? $_POST['nic'] : null;
            
            $list->newTransactionLast($id, $name, $nic, $type, $amount);
            $_SESSION['list'] = $list;
            header('location:./Deposit.php');
            exit();
        }else{
            echo "<h1>No Form Data Found</h1>";
        }
    }
    }
                         