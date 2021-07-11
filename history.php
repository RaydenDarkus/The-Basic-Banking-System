<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/navbar&footer.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <div class="container-fluid" style="background-color: #e5eeea;">
        <h2 class="text-center pt-4">Transaction history</h2>
        <br>
        <div class="table-responsive-sm">
            <table class="table table-dark table-hover table-sm table-striped table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="py-2">S.No.</th>
                        <th class="py-2">Sender</th>
                        <th class="py-2">Receiver</th>
                        <th class="py-2">Amount</th>
                        <th class="py-2">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'config.php';
                        $sql = "SELECT * from `transaction`";
                        $query = mysqli_query($conn, $sql);
                        while($rows = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td class="py-2"><?php echo $rows['sno']; ?></td>
                        <td class="py-2"><?php echo $rows['sender']; ?></td>
                        <td class="py-2"><?php echo $rows['receiver']; ?></td>
                        <td class="py-2"><?php echo $rows['balance']; ?></td>
                        <td class="py-2"><?php echo $rows['datetime']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <br>
        </div>
    </div>
    <?php 
        include 'footer.php';
    ?>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>