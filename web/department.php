<?php
// Intialization
$forestAPIprefix = "https://research.ku.ac.th/kurdi-api/api/v1/";  
$apikey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOjEsInN1YiI6IktVUkRJLUFQSSIsImlhdCI6MTY1MDYwNTAyOTU2OCwidG9rZW5JZCI6MTAxLCJyZXNlYXJjaGVyQ29kZSI6IiIsIm5hbWUiOiJmZW5nc3RqIiwicm9sZUlkIjowfQ.l_QybGHdB44YeKWf-pJg4adLwfUjoQ27dgCIgcGVUQ4"; // To create <<apikey>>, see https://research.ku.ac.th/kurdi-api/my-api/

$opts = [
    "http" => [
        "method" => "GET",
        "header" => "APIkey: " . $apikey . "\nContent-Type: text/html; charset=utf-8\n" .
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36 Edg/89.0.774.45"
    ]
];
$context = stream_context_create($opts);

// Querying
if (isset($_GET['id'])) {
    $id = $_GET['id']; 
} else {
    $id = 010602; // KURDI Researcher ID.
}
$lang="th"; // lang ::= [ en | th ]
// $lang="en"; // lang ::= [ en | th ]
$func = $forestAPIprefix."organizations/".$id."?language=$lang"; // This is an example of "persons/[researcherID]&language=[language]". For other functions, see https://research.ku.ac.th/kurdi-api/api-spec/. 

$json = json_decode(file_get_contents($func, false, $context));

// Querying results
$profiles = $json->results->entry[0];

// echo "<pre>";
// print_r($profiles);
// echo "</pre>";

// echo $profile->organizationName."<br>";
// echo $profile->parentOrganizationName."<br>";

// $imgUrl = "https://research.ku.ac.th/Forest/ForestImages/Avata/Person/";
$imgUrl = "https://research.ku.ac.th/Forest/ForestImages/Picture/Person/";

// echo $profile->person[0]->prefix."<br>";
// echo $profile->person[0]->firstname."<br>";
// echo $profile->person[0]->lastname."<br>";
// echo $profile->person[0]->academicPosition."<br>";
// echo $profile->person[0]->email."<br>";
// echo $imgUrl.$profile->person[0]->avatarImage."<br>";

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>ทำเนียบนักวิจัย คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเกษตรศาสตร์</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300&display=swap" rel="stylesheet">
    

    <!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
       body {
            font-family: 'Kanit', sans-serif;
           }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    


<main>
  <div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" href="index.php"><b>หน้าแรก</b></a>
            <!-- <a class="nav-link" href="#"><b>เมนู1</b></a>
            <a class="nav-link" href="#"><b>เมนู2</b></a> -->
          </div>
        </div>

        <form class="d-flex" action="search.php" method="post" enctype="multipart/form-data">
        <input class="form-control me-2" type="text" name="keyword" id="keyword" placeholder="ค้นหา" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">ค้นหา</button>
        </form>
      </div>

    </nav>

    <p>
      <h1>ทำเนียบนักวิจัย คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเกษตรศาสตร์</h1>
      <h4>Research Office Faculty of Engineering Kasetsart University</h4>
    </p>
  </div>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
       

      <?php
        $i=0;
        foreach ($profiles->executive as $profile){ 
          // print_r($profile);
          // echo $profile->firstname;
        ?>
        <div class="col-lg-4">
          <div class="text-center">
            <?php
            if($profile->avatarImage!="person_default.gif"){
              
              $file_pointer = "img/instructors/".$profile->researcherID.".jpg";              

              if (file_exists($file_pointer)) 
              {
              ?>
              <!-- <img src="<?php echo $file_pointer;?>" class="bd-placeholder-img rounded-circle" width="140" height="140"> -->
              <img src="<?php echo $file_pointer;?>" class="bd-placeholder-img" width="140" height="140">
              <?php               
              }
              else 
              {
              ?>
              <!-- <img src="<?php echo $imgUrl.$profile->personImage;?>" class="bd-placeholder-img rounded-circle" width="140" height="140"> -->
              <img src="<?php echo $imgUrl.$profile->personImage;?>" class="bd-placeholder-img" width="140" height="140">
              <?php
              }
            ?>      
            <?php
            }else{
              $file_pointer = "img/instructors/".$profile->researcherID.".jpg";              

              if (file_exists($file_pointer)) 
              {
              ?>
              <!-- <img src="<?php echo $file_pointer;?>" class="bd-placeholder-img rounded-circle" width="140" height="140"> -->
              <img src="<?php echo $file_pointer;?>" class="bd-placeholder-img" width="140" height="140">
              <?php
              }else{
            ?>
              <!-- <img src="img/no-user-image.gif" class="bd-placeholder-img rounded-circle" width="140" height="140"> -->
              <img src="img/no-user-image.gif" class="bd-placeholder-img" width="140" height="140">
            <?php
              }
            }
            ?>
            <h4><?php echo $profile->prefix.$profile->firstname." ".$profile->lastname;?></h4>
            <p><?php echo $profiles->organizationName;?></p>
            <p>
              <a class="btn btn-outline-primary btn-sm" href="detail.php?id=<?php echo $profile->researcherID;?>">KURDI</a>
              <!-- <a class="btn btn-outline-danger btn-sm" href="detail.html">View details</a>
              <a class="btn btn-outline-info btn-sm" href="detail.html">View details</a> -->
            </p>
          </div>
        </div>
        <!-- /.col-lg-4 -->
        <?php
          $i++; 
        }
        ?>
        <?php
        $i=0;
        foreach ($profiles->person as $profile){ 
          // print_r($profile);
          // echo $profile->firstname;
        ?>
        <div class="col-lg-4">
          <div class="text-center">
            <?php
            if($profile->avatarImage!="person_default.gif"){
              
              $file_pointer = "img/instructors/".$profile->researcherID.".jpg";              

              if (file_exists($file_pointer)) 
              {
              ?>
              <!-- <img src="<?php echo $file_pointer;?>" class="bd-placeholder-img rounded-circle" width="140" height="140"> -->
              <img src="<?php echo $file_pointer;?>" class="bd-placeholder-img" width="140" height="140">
              <?php               
              }
              else 
              {
              ?>
              <!-- <img src="<?php echo $imgUrl.$profile->avatarImage;?>" class="bd-placeholder-img rounded-circle" width="140" height="140"> -->
              <img src="<?php echo $imgUrl.$profile->avatarImage;?>" class="bd-placeholder-img" width="140" height="140">
              <?php
              }
            ?>      
            <?php
            }else{
              $file_pointer = "img/instructors/".$profile->researcherID.".jpg";              

              if (file_exists($file_pointer)) 
              {
              ?>
              <!-- <img src="<?php echo $file_pointer;?>" class="bd-placeholder-img rounded-circle" width="140" height="140"> -->
              <img src="<?php echo $file_pointer;?>" class="bd-placeholder-img" width="140" height="140">
              <?php
              }else{
            ?>
              <!-- <img src="img/no-user-image.gif" class="bd-placeholder-img rounded-circle" width="140" height="140"> -->
              <img src="img/no-user-image.gif" class="bd-placeholder-img" width="140" height="140">
            <?php
              }
            }
            ?>
            <h4><?php echo $profile->prefix.$profile->firstname." ".$profile->lastname;?></h4>
            <p><?php echo $profiles->organizationName;?></p>
            <p>
              <a class="btn btn-outline-primary btn-sm" href="detail.php?id=<?php echo $profile->researcherID;?>">KURDI</a>
              <!-- <a class="btn btn-outline-danger btn-sm" href="detail.html">View details</a>
              <a class="btn btn-outline-info btn-sm" href="detail.html">View details</a> -->
            </p>
          </div>
        </div>
        <!-- /.col-lg-4 -->
        <?php
          $i++; 
        }
        ?>
      


      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">จัดทำโดย</p>
    <p class="mb-0">คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเกษตรศาสตร์</p>
  </div>
</footer>


    <script src="dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
