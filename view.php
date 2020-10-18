<!Doctype html>
<html>
 <head>
        <title>USERS</title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="user.css">
        <?php
        include("connection.php");
        error_reporting(0);
        ?>        
 </head>
 <body>
    <div class="topnav">
            <h2>BANKING <sub>by Tharunsai A</sub></h2>
            <a href="#transactions">About us</a>
            <a href="home.html">Home</a>
    </div> <br><br>
    <?php
        $query="SELECT * FROM customers";
        $data=mysqli_query($conn,$query);
        $total=mysqli_num_rows($data);

        if($total !=0)
        { 
         ?>
         
         <div class="main">
             <div class="user"><center><h1>Account Holders</h1></center>
                 <?php while($result =mysqli_fetch_assoc($data))
                 {
                 ?>
                   <center><a  class="ani" href='view.php?id=<?php echo $result['cust_id']; ?>'> <br>               
                  <?php echo $result['name'];
                  }
                 } 
                 else
                 {
                  echo"No Record Found";
                 }
                 ?>
                 </a> </center>
               </div> 
               <div class="details">
                     <?php
                      if (isset($_GET["id"])) { $id  = $_GET["id"]; } else { $id=1000; };
                      $data=mysqli_query($conn,"SELECT * FROM customers WHERE cust_id=$id ");
                      $total=mysqli_num_rows($data);
                      $result =mysqli_fetch_array($data);
                     ?>
                    
                 
                  <center><h1><?php $var=$result['name']; echo $var;?></h1></center>
                 

                 
                     <table class="mytable">
                        <tbody>
                        
                         <tr>
                              <td>ID:</td>
                             <td> <?php $val = isset($result['cust_id']) ? $result['cust_id'] : 0; echo $val; ?> </td>
                         </tr>
                         
                         <tr>
                              <td>Email:</td>
                              <td> <?php $val = isset($result['mail']) ? $result['mail'] : 0; echo $val; ?> </td>
                         </tr>
                        
                         <tr>
                              <td>Balance:</td>
                             <td> <?php $val = isset($result['balance']) ? $result['balance'] : 0; echo $val; ?> </td>
                         </tr>
                        </tbody>
                      </table>
                     
               </div>
                <div class="Transactions">
                 <center> <h1>Transactions</h1></center>
                  <form  action="transaction.php" method="post">
                  <?php
                    $query="SELECT name FROM customers";
                    $data=mysqli_query($conn,$query);
                  ?>                 
                  <label for="from"><br>FROM:</label>
                   <center>  <select  name="from">
                        <option value="null">Not Selected</option>
                        <?php 
                         while($result= mysqli_fetch_array($data))
                         {
                          echo "<option value='" . $result['name']. "'>" . $result['name'] . "</option>";
                         }
                        ?><
                     </select></center>

                 <?php
                  $query="SELECT name FROM customers";
                  $data=mysqli_query($conn,$query);
                 ?>

                 
                    <label for="to"><br>TO    :</label>
                    <center><select  name="to">
                        <option value="null">Not Selected</option>
                        <?php 
                         while($result= mysqli_fetch_array($data))
                            {
                                echo "<option value='" . $result['name'] . "'>" . $result['name'] . "</option>";
            
                            }
                        ?>
                    </select></center>
                 
                 
                    <label for="amount"><br>Amount : </label>
                     <input  type="number" name="amount" min=1 autocomplete="off">
                  
                <br><br><center> <button type="submit"  name="submit" value="submit">Transfer</button></center>
               </form>
                           </div>      
  </div>      
 </body>
</html>