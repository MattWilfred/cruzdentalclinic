<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="patientdiagnosis-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dental Clinic Web Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Patient Profile</title>


</head>

<body>
    <div class="side-menu">


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
        <a href="patientlist.php">
            <button>
                <i class="fa-solid fa-angle-left"></i>
                Back to Patient List
            </button>
        </a>
        <h1>Patient Profile</h1>
    </div>



    <div class="container">

    <?php
            include 'dbcon.php';
            $currentid = $_GET['id'];

            $sql = "SELECT * from users where id = $currentid";
            $result = mysqli_query($connection,$sql);
    

            if(mysqli_num_rows($result)>0){
                while ($row = $result->fetch_assoc()){
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['email'];
                    $username = $row['username'];
                    $gender = $row['gender'];
                    $phone = $row['phonenumber'];
                    $bday = $row['birthdate'];
                    $address = $row['paddress'];


                }
                ?>

                <div class="patient-info">
                    <div class="info-header">
                        <img src="user-logo.png" alt="user logo">
                        <h1><?php echo $fname ?> <?php echo $lname ?> </h1>
                        <p class="pemail"><?php echo $email ?> </p>

                    </div>
                    

                    <div class="username">
                        <span>Username</span>
                        <p><?php echo $username ?></p>
                    </div>
                    <div class="gender">
                        <span>Gender</span>
                        <p><?php echo $gender ?></p>
                    </div>
                    <div class="phone">
                        <span>Phone</span>
                        <p><?php echo $phone ?></p>
                    </div>
                    <div class="bday">
                        <span>Birthday</span>
                        <p><?php echo $bday ?></p>
                    </div>
                    <div class="address">
                        <span>Address</span>
                        <p><?php echo $address ?></p>
                    </div>

                
                </div>
            <?php

            }


        
    ?>


        <div class="navbar">
            <div class="topnav">
                    <a href="appthistory.php? id=<?= $currentid; ?>">Appointment History</a>
                    <a href="patientmbg.php? id=<?= $currentid; ?>">Medical Background</a>
                    <a class="active">Diagnosis</a>
                    <a href="patientdbg.php? id=<?= $currentid; ?>">Dental Background</a>
                    <a href="patientprescription.php? id=<?= $currentid; ?>">E-Prescription</a>
                    <a href="patientreferral.php? id=<?= $currentid; ?>">Referral</a>
            </div>



            

            <div class="diagnosis" id="diagnosis">
                <div class="diagnosis-header">
                    <h2>Diagnosis </h2>
                </div>


                <form action="add-diagnosis.php" method="post">
                    <div class="top-teeth">
                        <div class="top-ind">
                            <p>Top</p>
                        </div>

                        <div class="top">
                            <div class="t18">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct18" value="18" />
                                <div>
                                    <label for="ct18">
                                        <img src="tooth-numbering-images/18.png">
                                    </label>
                                    <p>18</p>
                                </div>

                            </div>
                            <div class="t17">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct17" value="17" />
                                <div>
                                    <label for="ct17">
                                        <img src="tooth-numbering-images/17.png">
                                    </label>
                                    <p>17</p>
                                </div>
                            </div>
                            <div class="t16">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct16" value="16" />
                                <div>
                                    <label for="ct16">
                                        <img src="tooth-numbering-images/16.png">
                                    </label>
                                    <p>16</p>
                                </div>

                            </div>
                            <div class="t15">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct15" value="15" />
                                <div>
                                    <label for="ct15">
                                        <img src="tooth-numbering-images/15.png">
                                    </label>
                                    <p>15</p>
                                </div>

                            </div>
                            <div class="t14">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct14" value="14" />
                                <div>
                                    <label for="ct14">
                                        <img src="tooth-numbering-images/14.png">
                                    </label>
                                    <p>14</p>
                                </div>

                            </div>
                            <div class="t13">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct13" value="13" />
                                <div>
                                    <label for="ct13">
                                        <img src="tooth-numbering-images/13.png">
                                    </label>
                                    <p>13</p>
                                </div>

                            </div>
                            <div class="t12">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct12" value="12" />
                                <div>
                                    <label for="ct12">
                                        <img src="tooth-numbering-images/12.png">
                                    </label>
                                    <p>12</p>
                                </div>

                            </div>
                            <div class="t11">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct11" value="11" />
                                <div>
                                    <label for="ct11">
                                        <img src="tooth-numbering-images/11.png">
                                    </label>
                                    <p>11</p>
                                </div>

                            </div>
                            <div class="t21">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct21" value="21-Central incisor" />
                                <div>
                                    <label for="ct21">
                                        <img src="tooth-numbering-images/21.png">
                                    </label>
                                    <p>21</p>
                                </div>

                            </div>
                            <div class="t22">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct22" value="22-Lateral incisor" />
                                <div>
                                    <label for="ct22">
                                        <img src="tooth-numbering-images/22.png">
                                    </label>
                                    <p>22</p>
                                </div>

                            </div>
                            <div class="t23">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct23" value="23-Canine" />
                                <div>
                                    <label for="ct23">
                                        <img src="tooth-numbering-images/23.png">
                                    </label>
                                    <p>23</p>
                                </div>

                            </div>
                            <div class="t24">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct24" value="24-1st premolar" />
                                <div>
                                    <label for="ct24">
                                        <img src="tooth-numbering-images/24.png">
                                    </label>
                                    <p>24</p>
                                </div>

                            </div>
                            <div class="t25">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct25" value="25-2st premolar" />
                                <div>
                                    <label for="ct25">
                                        <img src="tooth-numbering-images/25.png">
                                    </label>
                                    <p>25</p>
                                </div>

                            </div>
                            <div class="t26">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct26" value="26-1st molar" />
                                <div>
                                    <label for="ct26">
                                        <img src="tooth-numbering-images/26.png">
                                    </label>
                                    <p>26</p>
                                </div>

                            </div>
                            <div class="t27">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct27" value="27-2st molar" />
                                <div>
                                    <label for="ct27">
                                        <img src="tooth-numbering-images/27.png">
                                    </label>
                                    <p>27</p>
                                </div>

                            </div>
                            <div class="t28">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct28" value="28" />
                                <div>
                                    <label for="ct28">
                                        <img src="tooth-numbering-images/28.png">
                                    </label>
                                    <p>28</p>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="bottom-teeth">
                        <div class="bottom-ind">
                            <p>Bottom</p>
                        </div>

                        <div class="bottom">
                            <div class="b48">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb48" value="48" />
                                <div>
                                    <label for="cb48">
                                        <img src="tooth-numbering-images/48.png">
                                    </label>
                                    <p>48</p>
                                </div>
                            </div>
                            <div class="b47">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb47" value="47" />
                                <div>
                                    <label for="cb47">
                                        <img src="tooth-numbering-images/47.png">
                                    </label>
                                    <p>47</p>
                                </div>
                            </div>
                            <div class="b46">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb46" value="46" />
                                <div>
                                    <label for="cb46">
                                        <img src="tooth-numbering-images/46.png">
                                    </label>
                                    <p>46</p>
                                </div>

                            </div>
                            <div class="b45">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb45" value="45" />
                                <div>
                                    <label for="cb45">
                                        <img src="tooth-numbering-images/45.png">
                                    </label>
                                    <p>45</p>
                                </div>

                            </div>
                            <div class="b44">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb44" value="44" />
                                <div>
                                    <label for="cb44">
                                        <img src="tooth-numbering-images/44.png">
                                    </label>
                                    <p>44</p>
                                </div>

                            </div>
                            <div class="b43">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb43" value="43" />
                                <div>
                                    <label for="cb43">
                                        <img src="tooth-numbering-images/43.png">
                                    </label>
                                    <p>43</p>
                                </div>

                            </div>
                            <div class="b42">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb42" value="42" />
                                <div>
                                    <label for="cb42">
                                        <img src="tooth-numbering-images/42.png">
                                    </label>
                                    <p>42</p>
                                </div>

                            </div>
                            <div class="b41">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb41" value="41" />
                                <div>
                                    <label for="cb41">
                                        <img src="tooth-numbering-images/41.png">
                                    </label>
                                    <p>41</p>
                                </div>

                            </div>
                            <div class="b31">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb31" value="31 Central incisor" />
                                <div>
                                    <label for="cb31">
                                        <img src="tooth-numbering-images/31.png">
                                    </label>
                                    <p>31</p>
                                </div>

                            </div>
                            <div class="b32">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb32" value="32-Lateral incisor" />
                                <div>
                                    <label for="cb32">
                                        <img src="tooth-numbering-images/32.png">
                                    </label>
                                    <p>32</p>
                                </div>

                            </div>
                            <div class="b33">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb33" value="33-Canine" />
                                <div>
                                    <label for="cb33">
                                        <img src="tooth-numbering-images/33.png">
                                    </label>
                                    <p>33</p>
                                </div>

                            </div>
                            <div class="b34">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb34" value="34-1st premolar" />
                                <div>
                                    <label for="cb34">
                                        <img src="tooth-numbering-images/34.png">
                                    </label>
                                    <p>34</p>
                                </div>

                            </div>
                            <div class="b35">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb35" value="35-2st premolar" />
                                <div>
                                    <label for="cb35">
                                        <img src="tooth-numbering-images/35.png">
                                    </label>
                                    <p>35</p>
                                </div>

                            </div>
                            <div class="b36">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb36" value="36-1st molar" />
                                <div>
                                    <label for="cb36">
                                        <img src="tooth-numbering-images/36.png">
                                    </label>
                                    <p>36</p>
                                </div>

                            </div>
                            <div class="b37">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb37" value="37-2st molar" />
                                <div>
                                    <label for="cb37">
                                        <img src="tooth-numbering-images/37.png">
                                    </label>
                                    <p>37</p>
                                </div>

                            </div>
                            <div class="b38">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb38" value="38" />
                                <div>
                                    <label for="cb38">
                                        <img src="tooth-numbering-images/38.png">
                                    </label>
                                    <p>38</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="add-desc">
                        <div class="add-btn">
                            <button type="button" id="adddesc-btn" name="adddesc-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Add Description
                        </div>
                    </div>
                     <!-- Modal for add description in diagnosis tab-->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" >
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="add-diagnosis.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $currentid?>">
                                <input type="hidden" name="url" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="findings" class="col-form-label">Findings:</label>
                                    <select class="form-control" name="findings" id="findings" style=" border-color: blueviolet;" onchange="if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}" required>
                                        <option value="" selected disabled>Select</option>
                                        <option value="" disabled>Code Red</option>
                                        <option value="C - Carries">C - Carries</option>
                                        <option value="Abr - Abrasion">Abr - Abrasion</option>
                                        <option value="Fr - Fracture">Fr - Fracture</option>
                                        <option value="X - Indicted for Extraction">X - Indicted for Extraction</option>
                                        <option value="M - Missing">M - Missing</option>
                                        <option value="Rf - Root Fracment">Rf - Root Fracment</option>
                                        <option value="" disabled>Code Blue</option>
                                        <option value=" - Tooth present without carries">✔ - Tooth present without carries</option>
                                        <option value="Am - Am____can">Am - Am____can</option>
                                        <option value="Co - Composite">Co - Composite</option>
                                        <option value="FPD - Fixed Partial Denture">FPD - Fixed Partial Denture</option>
                                        <option value="Gi - Glass Ionomer">Gi - Glass Ionomer</option>
                                        <option value="I - INI24">I - INI24</option>
                                        <option value="L - 21">L - 21</option>
                                        <option value="Tf - Temporary Filling">Tf - Temporary Filling</option>
                                        <option value="Vn - Unfrupied">Vn - Unfrupied</option>
                                        <option value="Jc - Jacket">Jc - Jacket</option>
                                        <option disabled></option>
                                        <option value="customOption">---Other---</option>
                                        <input class="form-control" placeholder="Enter findings here.." name="findings" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}" required>
                                    </select>

    
                                    <label for="message-text" class="col-form-label">Description:</label>
                                    <textarea class="form-control" placeholder="Enter text here.." name="description" style="height: 200px; border-color: blueviolet;" id="message-text" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="closebtn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" id="savebtn" name="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>


                    </div>
            </div>
        </div>
        </form>


        <div class="diagnosis-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="date">Date</th>
                        <th class="tooth-no">Tooth No.</th>
                        <th class="tooth-no">Findings</th>
                        <th class="desc">Description/Procedure</th>
                    </tr>
                </thead>
                <tbody>

                    
                    <?php
                                require 'dbcon.php';

                                                                //check connection
                                                                if ($connection->connect_error){
                                                                    die("Connection failed: " . $connection->connect_error );
                                                                }
                                
                                                                if ($connection->connect_error){
                                                                    die("Connection failed: " . $connection->connect_error );
                                                                }
                                
                                                                //read rows from the database
                                                                $sql = "SELECT * FROM diagnosis where userid = $currentid ORDER BY date_added desc";
                                                                $query_run = mysqli_query($connection, $sql);
                                
                                                                
                                                                if(mysqli_num_rows($query_run) > 0)
                                                                {
                                                                foreach($query_run as $cruzdentalclinic)
                                                                {
                                                                    $new_date_format = (new DateTime($cruzdentalclinic['date_added']))->format(' M d, Y  ');
                                                                    ?>
                                                                    <tr>
                                                                        <td><?= $new_date_format?></td>
                                                                        <td><?= $cruzdentalclinic['tooth_number']; ?></td>
                                                                        <td><?= $cruzdentalclinic['findings']; ?></td>
                                                                        <td><?= $cruzdentalclinic['description']; ?></td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <?php
                                                                                                }
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                ?>
                                                                                                <tr>
                                                                                                <td colspan="4">No record found.</td>
                                                                                                    
                                                                                                    
                                                                                                </tr>
                                                                                                <?php
                                                                                            }
                    ?>

                            

                </tbody>


            </table>

        </div>
    </div>



    </div>














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


        //for disabled button
        var boxes = $('.tcheckbox');

        boxes.on('change', function() {
            $('#adddesc-btn').prop('disabled', !boxes.filter(':checked').length);
        }).trigger('change');

        //for select form
        function toggleField(hideObj,showObj){
            hideObj.disabled=true;		
            hideObj.style.display='none';
            showObj.disabled=false;	
            showObj.style.display='inline';
            showObj.focus();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>


</body>

</html>
