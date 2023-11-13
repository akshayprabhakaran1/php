<?php

class CreditCard{

    const CARDNUMBER = "1111222233334444";
    private $totalBalance = 1000;
    private $pinNumber = "1234";

    public function getCardNumber() {
        return self::CARDNUMBER;
    }

    public function getTotalBalance() {
        return $this -> totalBalance;
    }

    private function setTotalBalance($balance) {
        $this -> totalBalance = $balance;
    }


    public function setPin($newPin) {
        if (preg_match( "/^[1-9]\d{3}$/", $newPin )){
            $this -> pinNumber = $newPin;
        } else{
            echo "Pin number should be a string of 4 digits and first digit should not be zero.";
        }
    }

    public function getPin() {
        return $this -> pinNumber;
    }

    public function shopping($cardNumber, $pinNumber, $spendingMoney) {
        if ($cardNumber === $this -> getCardNumber() and $pinNumber == $this -> getPin()){
            if ($spendingMoney <= $this -> getTotalBalance()) {
                $remBalance = $this -> getTotalBalance() - $spendingMoney;
                $this -> setTotalBalance($remBalance);
                echo "You have spend $spendingMoney pounds and your remaing balance is $remBalance.";
            } else{
                echo "You dont have enough balance in your account.";
            }
        } else{
            echo "Your card number or pin is invalid.";
        }
    }

    public function withdrawMoney($cardNumber, $pinNumber, $withdrawMoney) {
        if ($cardNumber === $this -> getCardNumber() and $pinNumber === $this -> getPin()) {
            $withdrawMoney = $withdrawMoney + $withdrawMoney * (3/100);
            if ($withdrawMoney <= $this -> getTotalBalance()) {
                $remBalance = $this -> getTotalBalance() - $withdrawMoney;
                $this -> setTotalBalance($remBalance);
                echo "You have withdrawn $withdrawMoney  pounds and your remaing balance is $remBalance.";
            } else{
                echo "You dont have enough balance in your account.";
            }
        } else{
            echo "Your card number or pin is invalid.";
        }
    }
}

$obj = new CreditCard();
// $obj -> setPin("1472");
// $obj -> shopping("1111222233334444", "1234", 500);
$obj -> withdrawMoney("1111222233334444", "1234" ,500);
// $obj -> getTotalBalance();