<?php
  //include_once 'userlogs.php';

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");
include('/Database/sessioncheck.php');	

session_start();
$uid = $_SESSION['id'];
 

function fetchTransactions(){
    global $connection;
    $transactions = mysqli_query($connection, "SELECT * FROM transaction");
    return $transactions;
  }

function fetchPName(){
    global $connection;
    $pname = mysqli_query($connection, "SELECT * FROM patients");
    return $pname;
  }

  function fetchSOADetails($uid){
    global $connection;
    $soa = mysqli_query($connection, "SELECT * FROM statement_of_account AS a INNER JOIN transaction AS b ON a.soa_id = b.soa_id INNER JOIN users AS c ON a.user_id=c.id WHERE a.user_id = $uid");
    return $soa;
}

function getSOAid($uid){
    global $connection;
    $soa = mysqli_query($connection, "SELECT soa_id FROM statement_of_account WHERE user_id=$uid LIMIT 1");

    $retrieved_soa = mysqli_fetch_row($soa);
    
    return $retrieved_soa[0];
}

?>

<!DOCTYPE html lang=en dir="ltr">
<html>
    <head>
        <link rel="stylesheet" href="billing.css">
        <meta charset="UTF-8">

        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="css/all.min.css">

         <!--========== BOX ICONS ==========-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


        <meta name="description" content="Admin Dental Clinic Web Page">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Cruz Dental Clinic Website</title>

    </head>
    <body>

        <!--========== NAV ==========-->
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="#" class="nav__link nav__logo">
                    <i class='bx bxs-disc nav__icon'></i>
                    <span class="nav__logo-name">Cruz Dental Clinic</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">

                        <a href="/Secretary/index.php" class="nav__link active">
                            <i class='bx bx-home nav__icon'></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bxs-calendar nav__icon'></i>

                                <span class="nav__name">Schedule</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="/Patient/patient-book/patient-booking.php" class="nav__dropdown-item">Calendar</a>
                                    <a href="/Patient/patientschedulelist.php" class="nav__dropdown-item">Schedule List</a>
                                </div>
                            </div>
                        </div>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Accounts</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="/Patient/PatientAccount/appthistory.php?id=<?php echo $id;?>" class="nav__dropdown-item">Profile</a>

                                </div>
                            </div>
                        </div>


                        <a href="#" class="nav__link">
                            <i class='bx bx-money nav__icon'></i>
                            <span class="nav__name">Billing</span>
                        </a>
                    </div>

                    <a href="#" class="nav__link">
                        <i class='bx bxs-megaphone nav__icon'></i>
                        <span class="nav__name">Announcement</span>
                    </a>
                </div>

                <a href="#" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon'></i>
                    <span class="nav__name">Log Out</span>
                </a>
        </nav>
        </div>

        <div class="body_content">
            <h1>Statement of Account</h1>
        </div>

    <div class="cont">
        <div class=""><a class="hidden" href="#divOne"></a></div>
        </div>
        
        <div class="container">
    
        <div class="table-section"> <!--MUST BE ON TABLE FORM-->
    
            <div id="border">
            
            <table>

                <?php

                $uid = $_SESSION['id'];

                $query = fetchSOADetails($uid);

                $row= mysqli_fetch_assoc($query);

                echo "<tr>";
                echo "<td> NAME OF PATIENT </td>";
                echo "<td class='patient-name'>" .$row['fname']. " " .$row['lname']. "</td>";
                echo "</tr>";

                echo "<th></th><th></th><th></th><th></th><th></th><th></th><th></th>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";

                echo "<tr>";
                    echo "<th>DATE</th>";
                    echo "<th>DENTAL PROCEDURE</th>";
                    echo "<th>TRANSACTION TYPE</th>";
                    echo "<th>PAYMENT STATUS</th>";
                    echo "<th>INVOICE AMOUNT</th>";
                    echo "<th>AMOUNT PAID</th>";
                    echo "<th>INVOICE BALANCE</th>";
                    echo "</tr>";

                    if(mysqli_num_rows($query) > 0){

                        while($rows= mysqli_fetch_assoc($query)){

                            $singleBalance = $rows['total_amount'] - $rows['amount_paid'];

                            echo "<tr>";
                                echo "<td class='date'>" .$rows['transaction_date']. "</td>";
                                echo "<td class='tprocedure'>" .$rows['type_of_procedure']. "</td>";
                                echo "<td>" .$rows['transaction_type']. "</td>";
                                echo "<td>" .$rows["status"]. "</td>";
                                echo "<td>" .$rows['total_amount']. "</td>";
                                echo "<td>" .$rows['amount_paid']. "</td>";
                                echo "<td>" .$singleBalance. "</td>";
                            echo "</tr>";

                            $totalAmountPaid += $rows['amount_paid'];
                            $totalBalance += $singleBalance;
                        }
                    } else {
                        echo "";
                    }

                    echo "<td></td><td></td><td></td><td></td><th></th><th></th><th></th>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";

                    echo "<tr>";
                    echo "<td></td><td></td><td></td><td></td><td></td>";
                    echo "<td> TOTAL PAID </td>";
                    echo "<td>" .$totalAmountPaid. "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td></td><td></td><td></td><td></td><td></td>";
                    echo "<td> TOTAL BALANCE </td>";
                    echo "<td>" .$totalBalance. "</td>";
                    echo "</tr>";

                ?>
           
            </table>
        </div>
        </div> 
        </div>

            <!-- Klyde's additional code -->

            <div class="overlay" id="divTwo">
                        <div class="wrapper1">
                       <h2>Edit Transaction</h2><a class="close" href="#">&times;</a>
                <div class="containerr1">
                    <div class="content">

                    
                    <form>
                    <div class="row1">
                        <div class="input-box">
                        <span class="details">Select Patient</span>
                        <input type="name" name="pn" required>
                        </div>
                        
                        <div class="input-box">
                        <span class="details">Date</span>
                        <input type="date" name="edit-dob" required>
                        </div>
                    </div>   
                        
                    <div class="row2">    
                        <div class="input-box1">
                         <span class="details">Type of Procedure</span>
                            <select id="dropdown" name="edit-procedure" class="dropdown" >
                                <option disabled value>Choose Procedure</option>
                                <option value="0">None</option>
                                <option value="1">Dental Check-Up</option>
                                <option value="2">Teeth Whitening</option>
                                <option value="3">Dental Implants</option>
                                <option value="4">Root Canal Treatment</option>
                                <option value="5">Cosmetic Dentistry</option>
                                <option value="6">Dental Crown</option>
                                <option value="7">Dental Bridge</option>
                                <option value="8">Orthiontics</option>
                                <option value="9">Restoration</option>
                                <option value="10">Fluoride Application </option>
                                <option value="11">Odontectomy</option>
                            </select>
                        </div>
                        
                        <div class="input-box1">
                        <span class="details">Price</span>
                        <input type="price" name="edit-pr" required>
                        <button onclick="" id="plus-btn">+</button>
                        </div>
                    </div>
                     
                    <div class="row3">    
                        <div class="input-box2">
                        <span class="details">Other Charges</span>
                        <input type="xcharges" name="edit-xc[]" required>
                        </div>
                        
                        <div class="input-box3">
                        <span class="details">Price</span>
                        <input type="price" name="edit-opr[]" required>
                        <button onclick="" id="plus-btn1">+</button>
                        </div>
                        
                    </div> 
                        
                        <div class="row4">    
                        <div class="input-box1">
                         <span class="details">Transaction type</span>
                            <select id="dropdown" name="Procedure" class="dropdown" >
                                <option disabled value>Choose Procedure</option>
                                <option value="0">None</option>
                                <option value="1">Fully Paid</option>
                                <option value="2">Partial</option>
                                <option value="3">Installment</option>

                            </select>
                        </div>
                        
                        <div class="input-box1">
                        <span class="details">STATUS</span>
                        <input type="status" name="stat" required>
                        </div>
                    </div>  
                        
                 </div>
                </div>
                        
                        
                        <div class="container3">
                            <h2>Total Amount</h2>
                                <h3>₱ 7,797</h3>

                            <h2>Amount Paid</h2>
                                <p>₱ 1,500</p>
           
                            <h2>Total Amount</h2>
                                <p>₱ 0</p>

                        </div>
                    <div>
                    <input type="submit" value="Save" id="save-btn1"></input>
                    </div>
            
                    </form>
                      
                </div>
              </div>
            

        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
        <script src="chart1.js"></script>
      
        <script>
            $('.sched-btn').click(function() {
                $('nav ul .sched-show').toggleClass("show");
                $('nav ul .first').toggleClass("rotate");
            });
            $('.acct-btn').click(function() {
                $('nav ul .acct-show').toggleClass("show1");
                $('nav ul .second').toggleClass("rotate");
            });
            $('nav ul li').click(function() {
                $(this).addClass("active").siblings().removeClass("active");
            });

            
            $(document).on("change", ".price-input", function() {
                var sum = 0;
                $(".price-input").each(function(){
                    sum += +$(this).val();
                });
                $(".total").val(sum);

            });

            function addAdditionalProcedure() {

                // Get the element
                var elem = document.querySelector('#in-div-section');

                var clone = elem.cloneNode(true);

                clone.id = 'elem2';
                clone.classList.add('text-large');

                // Inject it into the DOM
                elem.after(clone);

                /**var card = document.createElement("div");
                card.className += "input-box1";

                var s = document.createElement("select");
                s.className += "dropdown";
                //s.setAttribute('id','dropdown');
                //s.setAttribute('name','procedure-dd');
                //s.style.width("250px");

                let opt1 = new Option('None','0');
                let opt2 = new Option('Dental Check-Up','Dental Check-Up');
                let opt3 = new Option('Teeth Whitening','Teeth Whitening');
                let opt4 = new Option('Dental Implants','Dental Implants');
                let opt5 = new Option('Root Canal Treatment','Root Canal Treatment');
                let opt6 = new Option('Cosmetic Dentistry','Cosmetic Dentistry');
                let opt7 = new Option('Dental Crown','Dental Crown');
                let opt8 = new Option('Dental Bridge','Dental Bridge');
                let opt9 = new Option('Orthiontics','Orthiontics');
                let opt10 = new Option('Restoration','Restoration');
                let opt11 = new Option('Fluoride Application','Fluoride Application');
                let opt12 = new Option('Odontectomy','Odontectomy');

                s.add(opt1,undefined);
                s.add(opt2,undefined);
                s.add(opt3,undefined);
                s.add(opt4,undefined);
                s.add(opt5,undefined);
                s.add(opt6,undefined);
                s.add(opt7,undefined);
                s.add(opt8,undefined);
                s.add(opt9,undefined);
                s.add(opt10,undefined);
                s.add(opt11,undefined);
                s.add(opt12,undefined);

                card.append(s);

                var i = document.createElement("input");
                //i.setAttribute('type', 'price');
                //i.setAttribute('name','edit-pr');

                card.append(i);

                //let target = document.getElementById("in-div-left")
                document.getElementById("in-div-section").append(card);**/
            }

            function addAdditionalOtherProcedure() {

                // Get the element
                var elem = document.querySelector('#in-div-section2');

                var clone = elem.cloneNode(true);

                clone.id = 'elem2';
                clone.classList.add('text-large');

                // Inject it into the DOM
                elem.after(clone);
                /**var card = document.createElement("div");
                card.className += "input-box3";

                var i = document.createElement("input");
                i.innerHTML("Other Charges");
                card.append(i);

                var j = document.createElement("input");
                card.append(j);

                document.getElementById("in-div-section2").append(card); **/
            }

    
            var buttons = document.querySelectorAll(".schedule-tabs .btn-cont button");
            var tabP = document.querySelectorAll(".schedule-tabs .tabPanel");
    
            function showPanel(panelIndex, colorCode) {
                buttons.forEach(function(node) {
                    node.style.backgroundColor = "";
                    node.style.color = "";
                });
                buttons[panelIndex].style.backgroundColor = colorCode;
                buttons[panelIndex].style.color = "white";
    
    
                tabP.forEach(function(node) {
                    node.style.display = "none";
                });
                tabP[panelIndex].style.display = "block";
            }
            showPanel(0, '#8d1ecd');

        </script>

        
    </body>
</html>
    
