<?php
    include 'config.php';

    if(isset($_POST['submit'])) {

        $from = $_GET['id'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];

        $sql = "SELECT * from `users` where id=$from";
        $query = mysqli_query($conn,$sql);
        $sql1 = mysqli_fetch_array($query);

        $sql = "SELECT * from `users` where id=$to";
        $query = mysqli_query($conn,$sql);
        $sql2 = mysqli_fetch_array($query);

        if(($amount) < 0) {
            echo '<script type = "text/javascript"';
            echo 'alert("Negative amount cannot be transferred.")';
            echo '</script>';
        }

        else if($amount > $sql1['balance']) {
            echo '<script type = "text/javascript"';
            echo 'alert("Insufficient balance of the sender.")';
            echo '</script>';
        }

        else if($amount == 0) {
            echo '<script type = "text/javascript"';
            echo 'alert("The sender has no money.")';
            echo '</script>';
        }

        else {

            //deducting amount from sender's account
            $newbalance = $sql1['balance'] - $amount;
            $sql = "UPDATE `users` set balance=$newbalance where id=$from";
            mysqli_query($conn,$sql);

            //updating amount in receiver's account
            $newbalance = $sql2['balance'] + $amount;
            $sql = "UPDATE `users` set balance=$newbalance where id=$to";
            mysqli_query($conn,$sql);

            $sender = $sql1['name'];
            $receiver = $sql2['name'];  
            $sql = "INSERT INTO `transaction`(`sender`,`receiver`,`balance`) VALUES ('$sender','$receiver','$amount')";
            $query = mysqli_query($conn,$sql);

            if($query) {
                echo "<script> alert('Transaction Successful');
                      window.location='history.php';
                      </script>";

            }

            $newbalance = 0;
            $amount = 0;

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select User Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/navbar&footer.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <style type="text/css">

        button {
            transition: 1.5s;
            background-color: black !important;
            color: #e5eeea !important;
            border: 2px solid red !important;
            box-sizing: border-box;
            box-shadow: 2px 2px #951c49;
        }

        button:hover {
            transform: scale(1.1);
            color: aqua !important;
            background-color: darkblue !important;
        }

    </style>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <div class="container-fluid" style="background-color: #e5eeea;">
        <h2 class="text-center pt-4">Transaction</h2>
        <?php 
            include 'config.php';
            $sid = $_GET['id'];
            $sql = "SELECT * from `users` where id=$sid";
            $result = mysqli_query($conn,$sql);
            if(!$result) {
                echo "Error : ".$sql."<br>".mysqli_error($conn);
            }
            $rows = mysqli_fetch_assoc($result);
        ?>
        <form method="post" name="tcredit" class="tabletext">
        <br>
            <div class="table-responsive-sm">
                <table class="table table-dark table-hover table-sm table-striped table-condensed table-bordered text-center">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Balance</th>
                    </tr>
                    <tr>
                        <td class="py-2"><?php echo $rows['id']; ?></td>
                        <td class="py-2"><?php echo $rows['name']; ?></td>
                        <td class="py-2"><?php echo $rows['email']; ?></td>
                        <td class="py-2"><?php echo $rows['balance']; ?></td>
                    </tr>
                </table>
            </div>
            <br><br><br>
            <label>Transfer To:</label>
            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                    include 'config.php';
                    $sid = $_GET['id'];
                    $sql = "SELECT * from `users` where id!= $sid";
                    $result = mysqli_query($conn,$sql);
                    if(!$result) {
                        echo "Error".$sql."<br>".mysqli_error($conn);
                    }
                    while($rows = mysqli_fetch_assoc($result)) {
                ?>
                <option class="table" value="<?php echo $rows['id']; ?>">
                    <?php echo $rows['name']; ?>
                    (Balance : <?php echo $rows['balance']; ?>) 
                </option>
                <?php
                    }
                ?>
            </select>
            <br><br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>
            <br><br>
            <div class="text-center">
                <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
        <br>
    </div>
    <?php 
        include 'footer.php';
    ?>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>