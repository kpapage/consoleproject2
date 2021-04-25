<?php
  session_start();
  if(!isset($_SESSION['usr'])){?>
      <script> location.replace("index.php");</script>
      <?php
  }
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <title>Sandbox | CodeBlock</title>
    <meta name="description" content="Create pagination with filters using PHP, JQuery and Ajax">
    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/global.css" type="text/css" media="all">
    
    <script  src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    
    
    
    
</head>




<body>
     
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ΚΙΝΗΣΕΙΣ
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">ΠΡΟΣΘΗΚΗ</a>
            <a class="dropdown-item" href="movements.php">ΠΑΡΟΥΣΙΑΣΗ</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ΠΕΛΑΤΕΣ
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="necustomer.php">ΠΡΟΣΘΗΚΗ</a>
            <a class="dropdown-item" href="showcustomers.php">ΠΑΡΟΥΣΙΑΣΗ</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ΣΥΣΚΕΥΕΣ
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="newdevice.php">ΠΡΟΣΘΗΚΗ</a>
            <a class="dropdown-item" href="showdevices.php">ΠΑΡΟΥΣΙΑΣΗ</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ΑΝΤΑΛΛΑΚΤΙΚΑ
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">ΠΡΟΣΘΗΚΗ</a>
            <a class="dropdown-item" href="#">ΠΑΡΟΥΣΙΑΣΗ</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="repairstatus.php">ΣΤΑΔΙΟ ΕΠΙΣΚΕΥΗΣ</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ADMIN
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="productcats.php">ΚΑΤΗΓΟΡΙΕΣ ΠΡΟΙΟΝΤΩΝ</a>
            <a class="dropdown-item" href="malfunctioncats.php">ΚΑΤΗΓΟΡΙΕΣ ΒΛΑΒΩΝ</a>
            <a class="dropdown-item" href="manufacturercats.php">ΚΑΤΗΓΟΡΙΕΣ ΚΑΤΑΣΚΕΥΑΣΤΩΝ</a>
            <a class="dropdown-item" href="modelcats.php">ΚΑΤΗΓΟΡΙΕΣ ΜΟΝΤΕΛΩΝ ΚΑΤΑΣΚΕΥΑΣΤΩΝ</a>
            <a class="dropdown-item" href="jobcats.php">ΚΑΤΗΓΟΡΙΕΣ ΕΠΑΓΓΕΛΜΑΤΩΝ</a>
            <a class="dropdown-item" href="nowarcats.php">ΚΑΤΗΓΟΡΙΕΣ ΜΗ-ΕΓΓΥΗΣΗΣ</a>
            <a class="dropdown-item" href="users.php"> ΔΙΑΧΕΙΡΙΣΗ ΧΡΗΣΤΩΝ</a>
            </div>
        </li>
        </ul>
    </div>
    <div >
            <?php
                if(isset($_SESSION['usr'])){
                    echo "<h6 style='color:#FFFFFF; margin-right:40px;'>Χειριστής : ".$_SESSION['usr']."</h6>";
                }
            ?>
        </div>
        
        
        <div class="float-right">
            <form action="resources/logout-res.php" method="POST" class="form-inline my-2 my-lg-0 ">
                <button class="btn btn-light my-2 my-sm-0 " type="submit">Αποσύνδεση</button>
            </form>
        </div>
    </nav>

    <main>

        <div class="container">
            <div><h2 >ΠΡΟΣΘΗΚΗ ΝΕΟΥ ΠΕΛΑΤΗ</h2></div>
            <br>
            <form action="resources/customer-res.php" method="POST" class="input-group" >
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputLast">ΕΠΩΝΥΜΟ</label>
                        <input type="text" name="lastname"  class="form-control " required />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputFirst">ΟΝΟΜΑ</label>
                        <input type="text" name="firstname"  class="form-control " required />
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="inputTel1">ΤΗΛΕΦΩΝΟ 1</label>
                        <input type="text" name="tel1"  class="form-control"  required/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputTel2">ΤΗΛΕΦΩΝΟ 2</label>
                        <input type="text" name="tel2"  class="form-control "  />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAd">ΔΙΕΥΘΗΝΣΗ</label>
                        <input type="text" name="ad"  class="form-control" required />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPost">ΤΑΧΥΔΡΟΜΙΚΟΣ ΚΩΔΙΚΑΣ</label>
                        <input type="text" name="postcode"  class="form-control "  required/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCity">ΠΟΛΗ</label>
                        <input type="text" name="city"  class="form-control "  required/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail">EMAIL</label>
                        <input type="email" name="email" class="form-control "  required >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputJob">ΕΠΑΓΕΛΜΑ</label>
                        <select class="form-control" name="job" id="exampleFormControlSelect1">
                            <option>ΕΛΕΥΘΕΡΟΣ ΕΠΑΓΓΕΛΜΑΤΙΑΣ</option>
                            <option>ΠΕΛΑΤΗΣ ΛΙΑΝΙΚΗΣ</option>
                            <option>ΠΕΛΑΤΗΣ ΧΟΝΔΡΙΚΗΣ</option>
                        
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">ΚΑΤΑΧΩΡΗΣΗ</button>
                </div>
                
                
            </form>
        </div>
            

        
    </main>


</body>

</html>