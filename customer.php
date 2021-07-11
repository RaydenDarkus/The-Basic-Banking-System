<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/navbar&footer.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <style type="text/css">

      button{
        transition: 1.5s;
      }

      button:hover{
        background-color:#616C6F;
        color: white;
      }

    </style>
</head>
<body>
    <?php
        include 'config.php';
        $sql = "SELECT * from `users`";
        $result = mysqli_query($conn,$sql);
    ?>
    <?php 
        include 'navbar.php';
    ?>
    <div class="container-fluid" style="background-color: #e5eeea;">
        <h2 class="text-center pt-4">View Customers / Transfer Money</h2>
        <br>
        <div class="row">
            <div class="col">
                <div class="table-responsive-sm">
                    <table class="table table-dark table-hover table-sm table-striped table-condensed table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="py-2">Id</th>
                                <th scope="col" class="py-2">Name</th>
                                <th scope="col" class="py-2">E-Mail</th>
                                <th scope="col" class="py-2">Balance</th>
                                <th scope="col" class="py-2">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td class="py-2"><?php echo $rows['id'] ?></td>
                                <td class="py-2"><?php echo $rows['name'] ?></td>
                                <td class="py-2"><?php echo $rows['email'] ?></td>
                                <td class="py-2"><?php echo $rows['balance'] ?></td>
                                <td><a href="selectuserdetails.php?id= <?php echo $rows['id']; ?>"><button type="button" class="btn">Transact</button></a></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
    </div>
    <?php 
        include 'footer.php';
    ?>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>