<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <!-- <meta name="viewport" content="width=device-width, height=device-width, initial-scale=1.0"> -->
</head>
<body>

</body>
</html>
<?php       
include "view.php";
            include "connection.php";
            
            if (isset($_POST['submit'])) 
        {
            $to=$_POST['to'];
            $from=$_POST['from'];
            $amount=$_POST['amount'];
            $newmoney1=0;
            $newmoney2=0;
            $sql="SELECT balance FROM customers WHERE name = '$to'";
            $data=mysqli_query($conn,$sql);
            $res1=mysqli_fetch_array($data);
            $sql="SELECT balance FROM customers WHERE name = '$from'";
            $data=mysqli_query($conn,$sql);
            $res2=mysqli_fetch_array($data);
            $newmoney1  = ($res1['balance'] + (int)$amount);
            $newmoney2  = ($res2['balance'] - (int)$amount);
            if($res2['balance']<$amount && $amount>$res1['balance'])
            {
             echo '<script>alert("Enter correct amount")</script>';
            }
           
            else if((!(is_numeric($_POST['amount'])) || $_POST['amount'] == 0 || $_POST['amount'] == " "))
            {
               echo '<script>alert("Error cannot transfer balances")</script>';
              
            }
            else if($_POST['to'] === 'null' || $_POST['from'] === 'null' ) {
            
            echo '<script>alert("Select user name c")</script>';
           
             }  
            else if($_POST['to']== $_POST['from']){
               echo '<script>alert("Cannot transfer to yourself")</script>';
              
            }
            else
            {
            $sql="UPDATE customers SET balance='$newmoney1' WHERE name='$to'";
            mysqli_query($conn,$sql);
            $sql="UPDATE customers set balance='$newmoney2' WHERE name='$from'";
            mysqli_query($conn,$sql);
            //echo  "balances Transfered";
            echo '<script>alert("Transaction Successful")</script>';
             }
            }
?>