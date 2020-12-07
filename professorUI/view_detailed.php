<!DOCTYPE html>
<html lang= "en" dir= "ltr">

<!-- header stuff goes here -->
  <head>
    <meta charset = "utf-8">
    <title>Rate My Lab (Professor) - Welcome!</title>
    <link href="/img/labrate_icon.png" type="image/png" rel="shortcut icon" />
    <link rel = "stylesheet" href = "bootstrap/css/bootstrap.css"> 
    <link rel = "stylesheet" href = "bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"><!-- specifies to use css file for stylesheet -->
    <link href="css/main.css" rel="stylesheet" type="text/css">
  </head>

  <!-- body stuff goes here -->
  <body class="banner-bg">
    <!-- <a class="btn btn-primary btn-outline-primary" href="/home">Back</a><br> should log user out -->
    
    <div class="container login-container">
        <h1 class="font-weight-bold text-white">View Lab Ratings</h1>
        <div class="row">
            <div class="col-12 login-form-1 bg-light">
                <form method="post" action="./view_detailed.php" class="col-12 col-lg-8 col-md-10">
                    <div class="form-group row">
                        <label class="col-5 ForgetPwd" >Questions </label>
                        <label class="col-3 ForgetPwd" >Raters </label>
                        <label class="col-3 ForgetPwd" >Ratings </label>

                    </div>
                    
                    <?php 
                    if(isset($_GET['lab_crn'])){
                        $lab = $_GET['lab_crn'];
                        $qry = $connections->query("sELECT * FROM RateMyLab_new.assignment;");
                        for($i = 1; $i<15; $i++){
                            $mean_rating = 0;
                            $total = 0;
                            $mean_diff = 0;
                            $total_diff = 0;
                            // echo "sELECT * FROM RateMyLab_new.rating WHERE `Assignment_no2`= $i AND `lab_crn3`=$lab;";
                            $qry = $connections->query("sELECT * FROM RateMyLab_new.rating WHERE `Assignment_no2`= $i AND `lab_crn3`=$lab;");
                            // echo $qry; 
                            $t_rows = $qry->rowCount();
                            foreach($qry as $value){
                                $total += $value['interest_rating'];
                                $total_diff += $value['difficulty_rating'];
                            }
                            if($t_rows>0 &&  $total !=0){
                            $mean_rating = $total/$t_rows;
                            $mean_diff = $total_diff/$t_rows;
                            

                    ?>
                    <div class="form-group row">
                        <h6 class="ForgetPwd font-weight-bold col-5">Question 1: </h6>
                        <label class="ForgetPwd font-weight-bold col-3">2</label>
                        <label class="ForgetPwd font-weight-bold col-3">5</label>
                    </div>
                    
                    <?php
                    }
                        }
                    }else{
                            header("Location: ./home.php");
                    }
                        ?>
                        
                    <input hidden name="lab" value="<?=$lab ?>">
                    <div class="form-group d-flex justify-content-center row">
                        <a class="btnSubmit col-4 text-center" href="./view_lab_ratings.php?lab_crn=<?=$lab ?>">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>