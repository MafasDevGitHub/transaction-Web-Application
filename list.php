<?php

class TransactionNode
{
    public $id;
    public $name;
    public $nic;
    public $type;
    public $amount;
    public $date;
    public $next;

    public function __construct($id, $name, $nic, $type, $amount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->nic = $nic;
        $this->type = $type;
        $this->amount = $amount;
        $this->date = date("Y-m-d");
        $this->next = null;
    }
}
class BankingSystem
{
    public $head;

    public function __construct()
    {
        $this->head = null;
    }

    //insert transaction at first
    public function newTransactionFirst($id, $name, $nic,$type, $amount)
    {
        $transaction = new TransactionNode($id, $name, $nic, $type, $amount);
        if ($this->head == null) {
            //if head is null
            $this->head = $transaction;
        } else {
            $transaction->next = $this->head;
            $this->head = $transaction;
        }
        $this->getBalance();
    }
    //insert transaction at last
    public function newTransactionLast($id, $name, $nic, $type, $amount)
    {
        $transaction = new TransactionNode($id, $name, $nic, $type, $amount);
        if ($this->head == null) {
            //if head is null
            $this->head = $transaction;
        } else {
            $temp = $this->head;
            while ($temp->next !== null) {
                $temp = $temp->next;
            }
            $temp->next = $transaction;
        }
        $this->getBalance();
    }

    //remove transaction by id
    public function deleteTransaction($id)
    {
        if ($this->head == null) {
            echo "There are no any transactions!";
        } else if ($this->head->id == $id) {
            //if to remove the head
            if ($this->head->next == null) {
                $this->head = null;
                echo "Removed head.List is empty now!";
            } else {
                $this->head = $this->head->next;
                echo "Removed head.Head is next";
            }
        } else {
            $current = $this->head->next;
            $previ = $this->head;
            while ($current !== null) {
                if ($current->id == $id) {
                    echo "Transaction Found!";
                    if ($current->next == null) {
                        $previ->next = null;
                    } else {
                        $previ->next = $current->next;
                    }
                    return;
                }
                $previ = $current;
                $current = $current->next;
            }
        }
        $this->getBalance();
    }

    //search by id
    public function searchTransaction($id)
    {
        $current = $this->head;
        if($current == null){
            return null;
        }else{
            while($current !== null){
                if ($current->id == $id){
                    return $current;
                }
                $current = $current->next;
            }
            return null;
        }
        return null;

        // $current = $this->head;
        // if ($current == null) {
        //     return null;
        // }
        // while ($current !== null) {
        //     if ($current->id == $id) {
        //         return $current;
        //     }
        //    $current = $current->next;
        // }
        // return null;
        
    }

    //update transaction by id
    public function updateTransaction($id, $name, $nic, $type, $amount)
    {
        $current = $this->head;
        if ($current == null) {
            echo "List is empty!";
        } else {
            while ($current !== null) {
                if ($current->id == $id) {
                    $current->type = $type;
                    $current->amount = $amount;
                    echo "Updated Transaction";
                }
                $current = $current->next;
            }
            echo "Transaction not available!";
        }
        $this->getBalance();
    }

    //display history
    public function displayTransactions()
    {
        $current = $this->head;
        while ($current !== null) {
            echo "ID: {$current->id}, Name: {$current->name}, NIC: {$current->nic}, Type: {$current->type}, Amount: {$current->amount}, Date: {$current->date}\n";
            $current = $current->next;
        }
    }

    //check balance
    public function getBalance()
    {
        $current = $this->head;
        $balance = 0;
        
        if ($current == null) {
            echo "0";
        } else {
            while ($current !== null) {
                if ($current->type == "Deposit") {
                    $balance += $current->amount;
                } else if ($current->type == "Withdrawal") {
                    $balance -= $current->amount;
                }
                $current = $current->next;
            }
            return $balance;
        }
    }
}
