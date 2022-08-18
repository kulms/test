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
    $id = 360009; // KURDI Researcher ID.
}
$lang="th"; // lang ::= [ en | th ]
$func = $forestAPIprefix."persons/".$id."?language=$lang"; // This is an example of "persons/[researcherID]&language=[language]". For other functions, see https://research.ku.ac.th/kurdi-api/api-spec/. 

$json = json_decode(file_get_contents($func, false, $context));

// Querying results
$profile = $json->results->entry[0];

$func = $forestAPIprefix."projects?researcherID=".$id; 

$json = json_decode(file_get_contents($func, false, $context));

// Querying results
$projects = $json->results->entry;
  


// echo "<pre>";
// print_r($profile);
// echo "</pre>";

// echo "<pre>";
// print_r($projects);
// echo "</pre>";

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
        <a class="nav-link" href="#"><b>เมนู1</b></a>
        <a class="nav-link" href="#"><b>เมนู2</b></a>
      </div>
    </div>

    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="ค้นหา" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">ค้นหา</button>
    </form>
  </div>

</nav>

<p>
  <h1>นักวิจัย คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเกษตรศาสตร์</h1>
  <h4>Faculty of engineering kasetsart university</h4>
</p>
  </div>


  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <div class="col">
       
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-auto d-none d-lg-block">
                
                <img src="<?php echo $profile->imageUrl?>" class="bd-placeholder-img" width="200" height="280">

                </div>
                <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0"><?php echo $profile->academicPosition.$profile->firstname." ".$profile->lastname;?></h3>
                <div class="mb-1 text-muted"><?php echo $profile->alternateName->firstname." ".$profile->alternateName->lastname;?></div>
                <p class="card-text mb-auto"><?php echo $profile->department?><br><b>E-mail</b> : <?php echo $profile->email?><br><b>Contact Number</b> <?php echo $profile->telephone?></p>
                </div>
            </div>

        </div>
      </div>
      <div class="row">
      	<div class="col">
      		
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        ประวัติการศึกษา
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <ol>
                        <?php
                        foreach ($profile->educations as $education){ 
                        ?>
                        <!-- <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. -->
                        <li><?php echo $education->education;?></li>
                        <?php
                        } 
                        ?>
                        </ol>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        ผลงานทางวิชาการ
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <!-- <ol>
                        <?php
                        foreach ($profile->educations as $education){ 
                        ?>                        
                        <li><?php echo $education->education;?></li>
                        <?php
                        } 
                        ?>
                        </ol> -->
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        interest
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <ol>
                        <?php
                        foreach ($profile->interests as $interest){ 
                        ?>                        
                        <li><?php echo $interest;?></li>
                        <?php
                        } 
                        ?>
                        </ol>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        Projects
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <ol>
                        <?php
                        // foreach ($projects->projects as $project){ 
                        // ?>                        
                        <li><?php// echo $project;?></li>
                        <?php
                        // } 
                        // ?>
                        </ol>
                    </div>
                    </div>
                </div>
            </div>
      	</div>
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
