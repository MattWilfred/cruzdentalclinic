<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="patientdbg-style.css?v=<?php echo time(); ?>">
    </head>


    <body>
        <?php
        include "dbcon.php";

        function fetchMedicalBG($uid){
            global $conn;

            $medicalBG = mysqli_query($conn, "SELECT * FROM medicalbackground WHERE user_id = $uid ORDER  BY date_added DESC
            LIMIT  1" );
            return $medicalBG;
          }

        if(isset($_POST['dbgid']) && isset($_POST['id'])){

            

        //mbg id
        $dbgid = $_POST['dbgid'];    


        //user id
        $userid= $_POST['id'];


       

        //fetch medical bg by user id
        $query = fetchMedicalBG($userid);

        $dBrow = mysqli_fetch_array($query);



        
        
        $sql = "select * from medicalbackground where medicalbackground_id=".$dbgid;
        $result = mysqli_query($connection,$sql);


        while( $dBrow = mysqli_fetch_array($result) ){
            ?>
                        <div>
                            <input type="checkbox" name="cb1" value="1"
                            <?php if ($dBrow['aids'] === '1') echo 'checked="checked"';?> >AIDS/HIV positive
                        </div>
                        <div>
                            <input type="checkbox" name="cb2" value="1"
                            <?php if ($dBrow['anemia'] === '1') echo 'checked="checked"';?> >Anemia
                        </div>
                        <div>
                            <input type="checkbox" name="cb3" value="1"
                            <?php if ($dBrow['arthritis'] === '1') echo 'checked="checked"';?> >Arthritis
                        </div>
                        <div>
                            <input type="checkbox" name="cb4" value="1"
                            <?php if ($dBrow['artificial_heart_valve'] === '1') echo 'checked="checked"';?> >Artificial heart valve/s
                        </div>
                        <div>
                            <input type="checkbox" name="cb5" value="1"
                            <?php if ($dBrow['artificial_joint'] === '1') echo 'checked="checked"';?> >Artificial joint/s
                        </div>
                        <div>
                            <input type="checkbox" name="cb6" value="1"
                            <?php if ($dBrow['asthma'] === '1') echo 'checked="checked"';?> >Asthma
                        </div>
                        <div>
                            <input type="checkbox" name="cb7" value="1"
                            <?php if ($dBrow['back_problems'] === '1') echo 'checked="checked"';?> >Back problems
                        </div>
                        <div>
                            <input type="checkbox" name="cb8" value="1"
                            <?php if ($dBrow['blood_disease'] === '1') echo 'checked="checked"';?> >Blood disease
                        </div>
                        <div>
                            <input type="checkbox" name="cb9" value="1"
                            <?php if ($dBrow['cancer'] === '1') echo 'checked="checked"';?> >Cancer
                            <div class="mbg-describe">
                                Describe:
                                <input type="text" name="cb51" 
                                value= " <?php echo $dBrow['cancer_type']; ?> " >
                            </div>
                        </div>
                        <div>
                            <input type="checkbox" name="cb10" value="1"
                            <?php if ($dBrow['chemo'] === '1') echo 'checked="checked"';?> >Chemo/radiation therapy
                        </div>
                        <div>
                            <input type="checkbox" name="cb11" value="1"
                            <?php if ($dBrow['circulation_problems'] === '1') echo 'checked="checked"';?> >Circulation problems
                        </div>
                        <div>
                            <input type="checkbox" name="cb12" value="1"
                            <?php if ($dBrow['cortisone'] === '1') echo 'checked="checked"';?> >Cortisone treatments
                        </div>
                        <div>
                            <input type="checkbox" name="cb13" value="1"
                            <?php if ($dBrow['cough'] === '1') echo 'checked="checked"';?> >Cough, persistent or bloody
                        </div>
                        <div>
                            <input type="checkbox" name="cb14" value="1"
                            <?php if ($dBrow['diabetes'] === '1') echo 'checked="checked"';?> >Diabetes
                        </div>
                        <div>
                            <input type="checkbox" name="cb15" value="1"
                            <?php if ($dBrow['emphysema'] === '1') echo 'checked="checked"';?>>Emphysema
                        </div>
                        <div>
                            <input type="checkbox" name="cb16" value="1"
                            <?php if ($dBrow['epilepsy'] === '1') echo 'checked="checked"';?>>Epilepsy
                        </div>
                        <div>
                            <input type="checkbox" name="cb17" value="1"
                            <?php if ($dBrow['fainting'] === '1') echo 'checked="checked"';?>>Fainting
                        </div>
                        <div>
                            <input type="checkbox" name="cb18" value="1"
                            <?php if ($dBrow['food_allergies'] === '1') echo 'checked="checked"';?> >Food allergies
                        </div>
                        <div>
                            <input type="checkbox" name="cb19" value="1"
                            <?php if ($dBrow['headaches'] === '1') echo 'checked="checked"';?> >Headaches, frequent/severe
                        </div>
                        <div>
                            <input type="checkbox" name="cb20" value="1"
                            <?php if ($dBrow['hearing_loss'] === '1') echo 'checked="checked"';?>>Hearing loss
                        </div>
                        <div>
                            <input type="checkbox" name="cb21" value="1"
                            <?php if ($dBrow['heart_murmur'] === '1') echo 'checked="checked"';?> >Heart murmur

                        </div>
                        <div>
                            <input type="checkbox" name="cb22" value="1"
                            <?php if ($dBrow['heart_problem'] === '1') echo 'checked="checked"';?>>Heart, any problems
                            <div class="mbg-describe">
                                Describe:
                                <input type="text" name="cb52" 
                                value=" <?php echo $dBrow['heart_problem_type']; ?> ">
                            </div>
                        </div>
                        <div>
                            <input type="checkbox" name="cb23" value="1"
                            <?php if ($dBrow['hemophilia'] === '1') echo 'checked="checked"';?>>Hemophilia
                        </div>
                        <div>
                            <input type="checkbox" name="cb24" value="1"
                            <?php if ($dBrow['herpes'] === '1') echo 'checked="checked"';?> >Herpes
                        </div>
                        <div>
                            <input type="checkbox" name="cb25" value="1"
                            <?php if ($dBrow['hepatitis'] === '1') echo 'checked="checked"';?> >Hepatitis A B C D
                        </div>
                        <div>
                            <input type="checkbox" name="cb26" value="1"
                            <?php if ($dBrow['high_blood'] === '1') echo 'checked="checked"';?>>High blood pressure
                        </div>
                        <div>
                            <input type="checkbox" name="cb27" value="1"
                            <?php if ($dBrow['jaundice'] === '1') echo 'checked="checked"';?> >Jaundice
                        </div>
                        <div>
                            <input type="checkbox" name="cb28" value="1"
                            <?php if ($dBrow['jaw_pain'] === '1') echo 'checked="checked"';?> >Jaw pain
                        </div>
                        <div>
                            <input type="checkbox" name="cb29" value="1"
                            <?php if ($dBrow['kidney_disease'] === '1') echo 'checked="checked"';?> >Kidney disease
                        </div>
                        <div>
                            <input type="checkbox" name="cb30" value="1"
                            <?php if ($dBrow['liver_disease'] === '1') echo 'checked="checked"';?> >Liver disease
                        </div>
                        <div>
                            <input type="checkbox" name="cb31" value="1"
                            <?php if ($dBrow['low_blood'] === '1') echo 'checked="checked"';?> >Low blood pressure
                        </div>
                        <div>
                            <input type="checkbox" name="cb32" value="1"
                            <?php if ($dBrow['mitral_valve'] === '1') echo 'checked="checked"';?> >Mitral valve prolapse
                        </div>
                        <div>
                            <input type="checkbox" name="cb33" value="1"
                            <?php if ($dBrow['nervous_prob'] === '1') echo 'checked="checked"';?> >Nervous problems
                        </div>
                        <div>
                            <input type="checkbox" name="cb34" value="1"
                            <?php if ($dBrow['pacemaker'] === '1') echo 'checked="checked"';?> >Pacemaker
                        </div>
                        <div>
                            <input type="checkbox" name="cb35" value="1"
                            <?php if ($dBrow['psychiatric_care'] === '1') echo 'checked="checked"';?> >Psychiatric care
                        </div>
                        <div>
                            <input type="checkbox" name="cb36" value="1"
                            <?php if ($dBrow['respiratory_disease'] === '1') echo 'checked="checked"';?> >Respiratory disease
                        </div>
                        <div>
                            <input type="checkbox" name="cb37" value="1"
                            <?php if ($dBrow['rheumatic_fever'] === '1') echo 'checked="checked"';?> >Rheumatic fever
                        </div>
                        <div>
                            <input type="checkbox" name="cb38" value="1"
                            <?php if ($dBrow['seizure'] === '1') echo 'checked="checked"';?> >Seizure disorders
                        </div>
                        <div>
                            <input type="checkbox" name="cb39" value="1"
                            <?php if ($dBrow['shingles'] === '1') echo 'checked="checked"';?> >Shingles
                        </div>
                        <div>
                            <input type="checkbox" name="cb40" value="1"
                            <?php if ($dBrow['shortness_breath'] === '1') echo 'checked="checked"';?> >Shortness of breath
                        </div>
                        <div>
                            <input type="checkbox" name="cb41" value="1"
                            <?php if ($dBrow['sinus_problems'] === '1') echo 'checked="checked"';?> >Sinus problems
                        </div>
                        <div>
                            <input type="checkbox" name="cb42" value="1"
                            <?php if ($dBrow['skin_rash'] === '1') echo 'checked="checked"';?> >Skin rash
                        </div>
                        <div>
                            <input type="checkbox" name="cb43" value="1"
                            <?php if ($dBrow['stroke'] === '1') echo 'checked="checked"';?> >Stroke
                        </div>
                        <div>
                            <input type="checkbox" name="cb44" value="1"
                            <?php if ($dBrow['surgical_implants'] === '1') echo 'checked="checked"';?> >Surgical implants
                        </div>
                        <div>
                            <input type="checkbox" name="cb45" value="1"
                            <?php if ($dBrow['swelling'] === '1') echo 'checked="checked"';?> >Swelling, feet or ankles
                        </div>
                        <div>
                            <input type="checkbox" name="cb46" value="1" 
                            <?php if ($dBrow['thyroid_problems'] === '1') echo 'checked="checked"';?> >Thyroid problems
                        </div>
                        <div>
                            <input type="checkbox" name="cb47" value="1"
                            <?php if ($dBrow['tuberculosis'] === '1') echo 'checked="checked"';?> >Tuberculosis
                        </div>
                        <div>
                            <input type="checkbox" name="cb48" value="1"
                            <?php if ($dBrow['ulcer'] === '1') echo 'checked="checked"';?> >Ulcer/colitics/acid reflux
                        </div>
                        <div>
                            <input type="checkbox" name="cb49" value="1"
                            <?php if ($dBrow['visual_impairment'] === '1') echo 'checked="checked"';?> >Visual impairment
                        </div>
                        <div>
                            <input type="checkbox" name="cb50" value="1"
                            <?php if ($dBrow['other'] === '1') echo 'checked="checked"';?> >Other
                            <div class="mbg-describe">
                                Describe:
                                <input type="text" name="cb53" 
                                value=" <?php echo $dBrow['other_type']; ?> ">
                            </div>
                        </div>
                        </div>
                        
            <?php 
            
        
        }


        }
        ?>

    </body>
</html>