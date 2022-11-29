

<html>
    <head>
        <link rel="stylesheet" href="">
    </head>
    <body>
        
    
<table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Mobile No.</th>
                        <th>Birthdate</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    
                    <?php
                    require '../Database/connect.php';
                 
                    $drselect=$_GET['dr'];

                    //check connection
                    if ($connection->connect_error){
                        die("Connection failed: " . $connection->connect_error );
                    }

                    //read rows from the database
                    $sql = "SELECT * FROM persons WHERE accrole ='Patient' ORDER BY lname ASC";
                    $result = $connection->query($sql);

              
                    if (!$result){
                        die("Invalid query: " . $connection->error);
                    }

                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $users)
                                        {
                                            ?>
                                            <tr>
                        
                                                <td><?= $users['fname'] . ' ' .$users['lname'];?></td>
                                                <td><?= $users['gender']; ?></td>
                                                <td><?= $users['phonenumber']; ?></td>
                                                <td><?= $users['birthdate']; ?></td>
                                                <td>
                                                    <a href="procedure.php?currentid=<?= $users['id'];?>" class="btn btn-info btn-sm">Book</a>
                                                   
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                    ?>
                    
                </tbody>
            </table>
    </body>
</html>