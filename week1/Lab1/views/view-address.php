<!DOCTYPE html>

<html>
    <meta charset="UTF-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
    <?php
    require_once '../functions/dbconnect.php';
    require_once '../functions/util.php';
    $addresses = getAlladdress();
    ?>


    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip Code</th>
                    <th>Date of Birth</th> 
                </tr>
            </thead>
            <tbody>           
                <?php foreach ($addresses as $row): ?>

                    <tr>
                        <?php foreach ($row as $column): ?>

                            <td><?php echo $column; ?></td>                    
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>                
            </tbody>
        </table>
    </div>

    <br /><br />  
</body>
</html>
