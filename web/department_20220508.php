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
$func = $forestAPIprefix."organizations/".$id."?language=$lang"; // This is an example of "persons/[researcherID]&language=[language]". For other functions, see https://research.ku.ac.th/kurdi-api/api-spec/. 

$json = json_decode(file_get_contents($func, false, $context));

// Querying results
$profile = $json->results->entry[0];

// echo "<pre>";
// print_r($profile);
// echo "</pre>";

// echo $profile->organizationName."<br>";
// echo $profile->parentOrganizationName."<br>";

$imgUrl = "https://research.ku.ac.th/Forest/ForestImages/Avata/Person/";

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
    <title>ทดสอบระบบ</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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
<p>
  <h1>นักวิจัย คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเกษตรศาสตร์</h1>
  <h4>Faculty of engineering kasetsart university</h4>
</p>
  </div>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
       

    
      <div class="col-lg-4">
        <div class="text-center">
        <img src="<?php echo $imgUrl.$profile->person[0]->avatarImage;?>" class="bd-placeholder-img rounded-circle" width="140" height="140">

        <h4><?php echo $profile->person[0]->prefix.$profile->person[0]->firstname." ".$profile->person[0]->lastname;?></h4>
        <p><?php echo $profile->organizationName;?></p>
        <p><a class="btn btn-outline-primary btn-sm" href="detail.html">View details</a>
 <a class="btn btn-outline-danger btn-sm" href="detail.html">View details</a>
 <a class="btn btn-outline-info btn-sm" href="detail.html">View details</a></p>
      </div>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <div class="text-center">
        <img src="<?php echo $imgUrl.$profile->person[1]->avatarImage;?>" class="bd-placeholder-img rounded-circle" width="140" height="140">

        <h4><?php echo $profile->person[1]->prefix.$profile->person[1]->firstname." ".$profile->person[1]->lastname;?></h4>
        <p><?php echo $profile->organizationName;?></p>
        <p><a class="btn btn-outline-primary btn-sm" href="detail.html">View details</a>
 <a class="btn btn-outline-danger btn-sm" href="detail.html">View details</a>
 <a class="btn btn-outline-info btn-sm" href="detail.html">View details</a></p>
      </div>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <div class="text-center">
        <img src="<?php echo $imgUrl.$profile->person[2]->avatarImage;?>" class="bd-placeholder-img rounded-circle" width="140" height="140">

        <h4><?php echo $profile->person[2]->prefix.$profile->person[2]->firstname." ".$profile->person[2]->lastname;?></h4>
        <p><?php echo $profile->organizationName;?></p>
        <p><a class="btn btn-outline-primary btn-sm" href="detail.html">View details</a>
 <a class="btn btn-outline-danger btn-sm" href="detail.html">View details</a>
 <a class="btn btn-outline-info btn-sm" href="detail.html">View details</a></p>
      </div>
      </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
        <div class="text-center">
        <img src="<?php echo $imgUrl.$profile->person[3]->avatarImage;?>" class="bd-placeholder-img rounded-circle" width="140" height="140">

        <h4><?php echo $profile->person[3]->prefix.$profile->person[3]->firstname." ".$profile->person[3]->lastname;?></h4>
        <p><?php echo $profile->organizationName;?></p>
        <p><a class="btn btn-outline-primary btn-sm" href="detail.html">View details</a>
 <a class="btn btn-outline-danger btn-sm" href="detail.html">View details</a>
 <a class="btn btn-outline-info btn-sm" href="detail.html">View details</a></p>
      </div>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <div class="text-center">
        <img src="<?php echo $imgUrl.$profile->person[4]->avatarImage;?>" class="bd-placeholder-img rounded-circle" width="140" height="140">

        <h4><?php echo $profile->person[4]->prefix.$profile->person[4]->firstname." ".$profile->person[4]->lastname;?></h4>
        <p><?php echo $profile->organizationName;?></p>
        <p><a class="btn btn-outline-primary btn-sm" href="detail.html">View details</a>
 <a class="btn btn-outline-danger btn-sm" href="detail.html">View details</a>
 <a class="btn btn-outline-info btn-sm" href="detail.html">View details</a></p>
      </div>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <div class="text-center">
        <img src="<?php echo $imgUrl.$profile->person[5]->avatarImage;?>" class="bd-placeholder-img rounded-circle" width="140" height="140">

        <h4><?php echo $profile->person[5]->prefix.$profile->person[5]->firstname." ".$profile->person[5]->lastname;?></h4>
        <p><?php echo $profile->organizationName;?></p>
        <p><a class="btn btn-outline-primary btn-sm" href="detail.html">View details</a>
 <a class="btn btn-outline-danger btn-sm" href="detail.html">View details</a>
 <a class="btn btn-outline-info btn-sm" href="detail.html">View details</a></p>
      </div>
      </div><!-- /.col-lg-4 -->


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
