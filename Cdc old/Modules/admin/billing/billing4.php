<?php
  //include_once 'userlogs.php';

$dbServername = "localhost:8089";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "medicaldental";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn){
  die("Connection error!");
}

function fetchTransactions(){
    global $conn;
    $transactions = mysqli_query($conn, "SELECT * FROM transaction");
    return $transactions;
  }

function fetchPName(){
    global $conn;
    $pname = mysqli_query($conn, "SELECT * FROM patients");
    return $pname;
  }

function fetchSOADetails(){
    global $conn;
    $soa = mysqli_query($conn, "SELECT * FROM statement_of_account AS a INNER JOIN transaction AS b ON a.soa_id = b.soa_id INNER JOIN users_credentials AS c ON a.user_id=c.user_id INNER JOIN patients AS d ON a.user_id = d.user_id");
    return $soa;
}

?>

<!DOCTYPE html lang=e n dir="ltr">
<html>
    <head>
        <link rel="stylesheet" href="billing.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dental Clinic Web Page">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Cruz Dental Clinic Website</title>
    </head>
    <body>
        <div>
            <nav>
    
                <header>
                    <div class="logo"> <img src="logo dental.png" alt="dental logo"></div>
                    Cruz Dental Clinic
                </header>
    
                <ul>
    
                    <li>
                        <a href="index.html">
                            <i class="fa-solid fa-house"></i> Dashboard
                        </a>
                    </li>
    
                    <li>
                        <a href="#" class="sched-btn">
                            <i class="fa-solid fa-calendar-days"></i> Schedule
                            <span class="fas fa-caret-down first"></span>
                        </a>
                        <ul class="sched-show">
                            <li><a href="#">Calendar</a></li>
                            <li><a href="#">Schedule List</a></li>
                        </ul>
                    </li>
    
                    <li>
                        <a href="#" class="acct-btn">
                            <i class="fa-solid fa-user-group"></i> Accounts
                            <span class="fas fa-caret-down second"></span>
                        </a>
                        <ul class="acct-show">
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-tooth"></i> Dentist
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-user"></i> Patients
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-users-gear"></i> Administrator
                                </a>
                            </li>
                        </ul>
                    </li>
    
                    <li>
                        <a href="#about"> <i class="fa-solid fa-money-bill-wave"></i> Billing </a>
                    </li>
                    <li><a href="#announcements"><i class="fa-solid fa-bullhorn"></i> Announcements </a></li>
                </ul>
    
    
                <div class="logout">
                    <li>
                        <a href="#logout"> <i class="fa-solid fa-right-from-bracket"></i> Logout </a>
                    </li>
    
                </div>
    
    
    
            </nav>
    
        </div>

        <div class="body_content">
            <h1>Billing</h1>
        </div>
               <h2>Transaction Overview</h2>

          <!-------  LINE CHART ------>
                <div class = "charts">
                <div class = "chart">
                    <canvas id="barChart" width="50" height="20"></canvas>
                </div>
        </div>

    <div class="cont">
        <h2>Latest Invoice</h2>
        <div class="add-btn"><a class="button" href="#divOne">Add Transaction</a></div>
        </div>
        
        <div class="container">
    
        <div class="table-section"> <!--MUST BE ON TABLE FORM-->
    
            <div id="border">
            
            <table>
                <tr>
                    <th>Name of Patient</th>
                    <th>Date</th>
                    <th>Dental Procedure</th>
                    <th>Amount Paid</th>
                    <th>Balance</th>
                    <th>Transaction Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php

                $query = fetchSOADetails();

                    if(mysqli_num_rows($query) > 0){

                        while($rows= mysqli_fetch_assoc($query)){

                            echo "<tr>";
                                echo "<td class='patient-name'>" .$rows['patient_first_name']. " ".$rows['patient_surname']. "</td>";
                                echo "<td class='date'>" .$rows['transaction_date']. "</td>";
                                echo "<td class='tprocedure'>" .$rows['type_of_procedure']. "</td>";
                                echo "<td>" .$rows['total_amount']. "</td>";
                                echo "<td>" .$rows['balance']. "</td>";
                                echo "<td>" .$rows['transaction_type']. "</td>";
                                echo "<td>" .$rows["status"]. "</td>";
                                echo '<td> <div class="up-btn"><a class="button1" href="#divTwo">Edit</a></div></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "";
                    }
                ?>
           
            </table>
        </div>
        </div> 
        </div>
        
             <div class="overlay" id="divOne">
                        <div class="wrapper">
                        <h2>Add Transaction</h2><a class="close" href="#">&times;</a>
                <div class="content">

                <!-- start of form -->

                <form name="transaction-form" method="POST" action="add-transaction.php">

                    <div class="row1">
                        <div class="input-box">
                            <span class="details">Select Patient</span>

                            <?php

                                $qp = fetchPName();

                                echo "<select style='width: 200px' id='dropdown' name='pname-dd' class='dropdown' style='width: 20%'>";

                                while ($row = mysqli_fetch_assoc($qp)){
                                    echo "<option style='width:100px' value='" .$row['user_id']. "'>" .$row['patient_first_name']. " ".$row['patient_surname']. "</option>";
                                }
                                
                                echo "</select>";
                            ?>

                        </div>
                        
                        <div class="input-box">
                            <span class="details">Date</span>
                            <input type="date" name="dob" min="2022-01-01">
                        </div>
                    </div>   
                        
                        
                    <div class="row2" id="in-div-section">     
                        <div class="input-box1" id="in-div-left">
                        <span class="details">Type of Procedure</span>
                            <select id="dropdown" name="procedure-dd" class="dropdown">
                                <option disabled value>Choose Procedure</option>
                                <option value="0">None</option>
                                <option value="Dental Check-Up">Dental Check-Up</option>
                                <option value="Teeth Whitening">Teeth Whitening</option>
                                <option value="Dental Implants">Dental Implants</option>
                                <option value="Root Canal Treatment">Root Canal Treatment</option>
                                <option value="Cosmetic Dentistry">Cosmetic Dentistry</option>
                                <option value="Dental Crown">Dental Crown</option>
                                <option value="Dental Bridge">Dental Bridge</option>
                                <option value="Orthiontics">Orthiontics</option>
                                <option value="Restoration">Restoration</option>
                                <option value="Fluoride Application">Fluoride Application </option>
                                <option value="Odontectomy">Odontectomy</option>
                            </select>
                        </div>
                        
                        <div class="input-box1" id="in-div-right">
                            <span class="details">Price</span>
                            <input class="price-input" id="amount1" type="price" name="prc" value="0" required>
                            <!--<button id="plus-btn">+</button>-->
                            <button onclick="addAdditionalProcedure()" id="plus-btn">+</button>
                        </div>


                    </div>


                    <div class="row3">    
                        <div class="input-box2" >
                            <span class="details">Other Charges</span>
                            <input type="xcharges" name="xc" required>
                        </div>
                        
                        <div class="input-box3" id="in-div2">
                            <span class="details">Price</span>
                            <input class="price-input" id="amount2" type="price" name="opr" value="0" placeholder="None" required>
                            <button onclick="addAdditionalOtherProcedure()" id="plus-btn">+</button>
                        </div>
                    </div>  

                    <div class="container1" style="padding-left: 20%">
                        <h2>Total Amount</h2>
                        <input id="total" class="total" type="textfield" name="total" disabled="disabled" style="width: 400px; height: 80px; text-align: center;">
                    <div>

                    <div class="container2" style="padding-left: 20%">
                        <h2>Enter Amount to Pay</h2>
                        <input id="amtpd" class="amtpd" type="textfield" name="amtpd" style="width: 400px; height: 80px; text-align: center;" required>
                    <div>

                    <button onclick="" id="cancel-btn">Cancel</button>

                    <input type="submit" value="Save" id="save-btn" name="save"></input>
                        
                        
                    </form>
        
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
                        <input type="xcharges" name="edit-xc" required>
                        </div>
                        
                        <div class="input-box3">
                        <span class="details">Price</span>
                        <input type="price" name="edit-opr" required>
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

                var card = document.createElement("div");
                card.className += "input-box1";

                var s = document.createElement("select");
                s.className += "dropdown";
                s.setAttribute('id','dropdown');
                s.setAttribute('name','procedure-dd');
                s.style.width("250px");

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
                document.getElementById("in-div-section").append(card);
            }

            function addAdditionalOtherProcedure() {
                var card = document.createElement("div");
                card.className += "input-box3";

                var i = document.createElement("input");
                i.innerHTML("Other Charges");
                card.append(i);

                var j = document.createElement("input");
                card.append(j);

                document.getElementById("in-div2").append(card); 
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
    
