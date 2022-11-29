<?php
  //include_once 'userlogs.php';
  require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6c262b249a.js" crossorigin="anonymous"></script>
    
  </head>
  <body>
    <!-- start of the navbar -->

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">   
            <a class="navbar-brand" href="#">Notification</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <?php
            $countsql = mysqli_query($connection, "SELECT * FROM notify WHERE status=0");
            $count = mysqli_num_rows($countsql);

            ?>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- Bell Icon plus Count Tag--> 
                    <i class="fa-regular fa-bell"></i> <span class="badge text-bg-secondary"><?php echo $count; ?></span>
                </a>
                <ul class="dropdown-menu">
                <?php
                 $notifysql = mysqli_query($connection, "SELECT * FROM notify WHERE status=0");
                 if(mysqli_num_rows($notifysql)>0){
                    while($result = mysqli_fetch_assoc($notifysql)){
                     echo '<a class="dropdown-item" href="#">'.$result['message'].'</a>';
                     echo '<div class="dropdown-divider"></div>';
                      }
                     }
                 else{
                    echo '<a class="dropdown-item text-danger font-weight-bold" href="#"> No Notification </a>';
                      }
                 ?>
                </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>