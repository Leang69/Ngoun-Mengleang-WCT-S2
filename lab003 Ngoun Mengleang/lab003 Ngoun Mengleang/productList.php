<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table, th, td {border: 1px solid black;}
            th {padding-right: 30px}
            table{margin: auto}
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Method</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php
                //use Factory Pattern
                class paymentMethodFactory {
                    function getPaymentMethod($paymentName){
                        switch ($paymentName){
                            case "Wing":
                                return new Wing;
                            case "ABA":
                                return new ABA;
                            case "Pipay":
                                return new PiPay;
                        }
                    }
                }
                
                interface paymentMethod{
                    public function payment();
                }
                class ABA implements paymentMethod{
                    public function payment(){
                        return "ABA";
                    }
                }
                class Wing implements paymentMethod{
                    public function payment(){
                        return "Wing";
                    }
                }
                class PiPay implements paymentMethod{
                    public function payment(){
                        return "PiPay";
                    }
                }
                class Item {
                    public $ItemName;
                    public $Price;
                    public $Quantity;
                    public $Method;
                    public $Total;   
                    function __construct($ItemName,$Price,$Quantity,$Method){
                        $paymentMethodFactory = new paymentMethodFactory();
                        $this->ItemName = $ItemName;
                        $this->Price = $Price;
                        $this->Quantity = $Quantity;
                        $this->Method = $paymentMethodFactory->getPaymentMethod($Method);
                        $this->Total = $this->Price * $this->Quantity;
                    }
                }
                $array = array(
                    new Item("Coca",1.5,2,"ABA"),
                    new Item("Pipsi",1,3,"ABA"),
                    new Item("Fanta",1,5,"Pipay"),
                    new Item("Monster Energy",3,5,"ABA"),
                    new Item("Red Bull",3,5,"Wing"),
                    new Item("Dr Pepper",1.5,3,"Wing"),
                    new Item("Budweiser",1.5,16,"ABA"),
                    new Item("Jack daniels",5,2,"Wing")
                );
                function sortObj($a, $b){
                    if ($a->Total == $b->Total){
                        return 0;
                    }
                    return ($a->Total  > $b->Total ) ? -1 : 1;
                }
                 usort($array, "sortObj");
                echo "<tbody>";
                foreach ($array as $value) {
                    echo "<tr>
                        <th>$value->ItemName</th>
                        <th>$value->Price</th>
                        <th>$value->Quantity</th>
                        <th>{$value->Method->payment()}</th>
                        <th>$value->Total</th>
                    </tr>";
                }
                echo "</tbody>";
                function  fineABA ($var){
                    return !strcmp($var->Method->payment(),"ABA");
                }
                function  fineAnother ($var){
                    return !strcmp($var->Method->payment(),"Wing") || !strcmp($var->Method->payment(),"PiPay");
                }
                $numABA = sizeof(array_filter($array, "fineABA"));
                $numAnother = sizeof(array_filter($array, "fineAnother"));
                echo "<h3>Number of sales by ABA method: $numABA</h3>";
                echo "<h3>Number of sales by PiPay and Wing method $numAnother</h3>";
             ?>
        </table>
    </body>
</html>
