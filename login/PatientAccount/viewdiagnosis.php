<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="viewdiagnosis-style.css?v=<?php echo time(); ?>">
    </head>


    <body>
        <?php
        include 'dbcon.php';

        if(isset($_POST['userid'])){

         

        
            $userid = $_POST['userid'];
            
            
            $sql = "select * from diagnosis where diagnosis_id=".$userid;
            $result = mysqli_query($connection,$sql);

            if($result){
                while( $row = mysqli_fetch_array($result) ){
                    $new_date_format = (new DateTime($row['date_added']))->format(' M d, Y  ');
        ?>
                    <div class="diagnosis-info">
                        <p><?php echo $row['findings'];  ?></p>
                        <p><?php echo $row['description'];  ?></p>
                        <p><?php echo $row['description'];  ?></p>
                        <p>Added on: <?php echo $new_date_format  ?></p>
                    </div>

                    <div class="teeth-top">
                        <div class="vtop-ind">
                            <p>Top</p>
                        </div>

                        <div class="vtop">
                            <div class="vt18">
                
                         
                                        <img src="tooth-numbering-images/18.png">
                                
                                    <p>18</p>

                            </div>
                            <div class="vt17">
               
                               
                                        <img src="tooth-numbering-images/17.png">
                             
                                    <p>17</p>
               
                            </div>
                            <div class="vt16">
               
                                  
                                        <img src="tooth-numbering-images/16.png">
                           
                                    <p>16</p>
        

                            </div>
                            <div class="vt15">
                      
                                  
                                        <img src="tooth-numbering-images/15.png">
                                
                                    <p>15</p>
                     

                            </div>
                            <div class="vt14">
                  
                              
                                        <img src="tooth-numbering-images/14.png">
                              
                                    <p>14</p>
                       

                            </div>
                            <div class="vt13">
               
                                   
                                        <img src="tooth-numbering-images/13.png">
                        
                                    <p>13</p>
                            

                            </div>
                            <div class="vt12">
                             
                           
                                        <img src="tooth-numbering-images/12.png">
                    
                                    <p>12</p>
                          

                            </div>
                            <div class="vt11">
                          
                              
                                        <img src="tooth-numbering-images/11.png">
                     
                                    <p>11</p>
                       
                            </div>
                            <div class="t21">
                     
                                        <img src="tooth-numbering-images/21.png">
                                 
                                    <p>21</p>
                           

                            </div>
                            <div class="t22">
                       
                                        <img src="tooth-numbering-images/22.png">
                                  
                                    <p>22</p>
                     

                            </div>
                            <div class="t23">
                                
                                    <img src="tooth-numbering-images/23.png">
                            
                                    <p>23</p>
                      

                            </div>
                            <div class="t24">
                         
                                        <img src="tooth-numbering-images/24.png">
                              
                                    <p>24</p>
                          

                            </div>
                            <div class="t25">
                                
                                        <img src="tooth-numbering-images/25.png">
                               
                                    <p>25</p>
                           
                            </div>
                            <div class="t26">
                                
                                        <img src="tooth-numbering-images/26.png">
                                  
                                    <p>26</p>
                         

                            </div>
                            <div class="t27">
                                
                                        <img src="tooth-numbering-images/27.png">
                                  
                                    <p>27</p>
                         

                            </div>
                            <div class="t28">
                                
                                        <img src="tooth-numbering-images/28.png">
                        
                                    <p>28</p>
                              

                            </div>
                        </div>
                    </div>


                    <div class="bottom-teeth">
                        <div class="bottom-ind">
                            <p>Bottom</p>
                        </div>

                        <div class="bottom">
                            <div class="b48">
                               
                                        <img src="tooth-numbering-images/48.png">
                              
                                    <p>48</p>
                            
                            </div>
                            <div class="b47">
                                
                                        <img src="tooth-numbering-images/47.png">
                                  
                                    <p>47</p>
                                
                            </div>
                            <div class="b46">
                               
                                        <img src="tooth-numbering-images/46.png">
                                   
                                    <p>46</p>
                        

                            </div>
                            <div class="b45">
                          
                                        <img src="tooth-numbering-images/45.png">
                               
                                    <p>45</p>
                            

                            </div>
                            <div class="b44">
                                
                                        <img src="tooth-numbering-images/44.png">
                                  
                                    <p>44</p>
                          

                            </div>
                            <div class="b43">
                            
                                        <img src="tooth-numbering-images/43.png">
                                    
                                    <p>43</p>
                                

                            </div>
                            <div class="b42">
                                
                                        <img src="tooth-numbering-images/42.png">
                     
                                    <p>42</p>
                               

                            </div>
                            <div class="b41">
                               
                                        <img src="tooth-numbering-images/41.png">
                       
                                    <p>41</p>
                              

                            </div>
                            <div class="b31">
                               
                                        <img src="tooth-numbering-images/31.png">
                                    
                                    <p>31</p>
                               

                            </div>
                            <div class="b32">
                                
                                        <img src="tooth-numbering-images/32.png">
                                  
                                    <p>32</p>
                                

                            </div>
                            <div class="b33">
                               
                                        <img src="tooth-numbering-images/33.png">
                                
                                    <p>33</p>
                             

                            </div>
                            <div class="b34">
                                
                                        <img src="tooth-numbering-images/34.png">
                                   
                                    <p>34</p>
                               

                            </div>
                            <div class="b35">
                                
                                        <img src="tooth-numbering-images/35.png">
                                   
                                    <p>35</p>
                                

                            </div>
                            <div class="b36">
                               
                                        <img src="tooth-numbering-images/36.png">
                                    
                                    <p>36</p>
                                

                            </div>
                            <div class="b37">
                               
                                        <img src="tooth-numbering-images/37.png">
                                    
                                    <p>37</p>
                                

                            </div>
                            <div class="b38">
                                
                                        <img src="tooth-numbering-images/38.png">
                                    
                                    <p>38</p>
                                

                            </div>
                        </div>
                    </div>

                <?php
                    
                  
                    
                    
                    
                ?>


        <?php 
                }
                

            }
            

        }
        ?>

    </body>
</html>