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
if (isset($_POST['keyword'])) {
    $keyword2 = $_POST['keyword']; 
} else {
    $keyword2 = ""; // KURDI Researcher ID.
}
$lang="th"; // lang ::= [ en | th ]
$func = $forestAPIprefix."search?keyword=".urlencode($keyword2)."&language=$lang"; // This is an example of "persons/[researcherID]&language=[language]". For other functions, see https://research.ku.ac.th/kurdi-api/api-spec/. 

// echo $func;

$json = json_decode(file_get_contents($func, false, $context));

// Querying results
// $profiles = $json->entry;
// $profiles = $json->results->entry[0];
$profiles = $json->results->entry;

// echo "<pre>";
// print_r($profiles);
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
    <title>ทำเนียบนักวิจัย คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเกษตรศาสตร์</title>

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
    
    <!-- <nav class="navbar navbar-expand-sm bg-dark-green navbar-dark fixed-top" style="z-index: 10000000;">
    <a class="navbar-brand" href="/forest2/"><img src="/forest2/images/forestLogo2.png" alt="KU Forest Logo" /></a>    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <div id="search-box" class="form-inline">
            <input id="keywordTextbox" class="form-control mr-sm-2 my-sm-0 my-2" type="text" placeholder="Search">
            <button id="searchButton" class="btn btn-success" type="button" onclick="search()">Search</button>
            <script>
                function search(){
                    var kw = $('#keywordTextbox').val()
                    if (kw != '') {
                        window.location = '/forest2/search?keyword=' + kw
                    }
                }
            </script>
        </div>
    </div>
    </nav> -->

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
            <div class="text-center mb-5">
                <h1 class="text-dark-green">Search Result</h1>
                <!-- <div class="form-inline text-center">
                    <input id="keywordTextbox2" class="form-control mr-sm-2 my-sm-0 my-2 col-sm-5" type="text" placeholder="Search">
                    <button id="searchButton2" class="btn btn-success" type="button" onclick="search2()">Search</button>
                    <script>
                        function search2(){
                            var kw = $('#keywordTextbox2').val()
                            if (kw != '') {
                                window.location = '/forest2/search?keyword=' + kw
                            }
                        }
                    </script>
                </div> -->
            </div>
            <div class="mb-4">
                <h5 class="text-dark-green">Search result of "<?php echo $keyword2;?>"</h5>
                <!-- <div>About <?php echo count($profiles);?> results</div> -->
            </div>
            <?php
            // $i=0;
            foreach ($profiles as $profile){ 
            // print_r($profile);
            $lang="th"; // lang ::= [ en | th ]
            $func = $forestAPIprefix."persons/".$profile->dataID."?language=$lang"; // This is an example of "persons/[researcherID]&language=[language]". For other functions, see https://research.ku.ac.th/kurdi-api/api-spec/. 

            $json2 = json_decode(file_get_contents($func, false, $context));

            // Querying results
            $profile2 = $json2->results->entry[0];

            // echo $profile2->faculty;

                if($profile2->faculty == "คณะวิศวกรรมศาสตร์" && $profile2->campus == "วิทยาเขตบางเขน"){

            ?>
                <div class="row g-3 border rounded overflow-hidden flex-md-row mb-3 shadow-sm h-md-250 position-relative">
                    <div class="col-sm-12 mb-3">                    
                        <!-- <h5><a href="person/<?php echo $profile->dataID;?>"><?php echo $profile->header;?></a></h5>          -->
                        <h5><a href="detail.php?id=<?php echo $profile->dataID;?>"><?php echo $profile->header;?></a></h5>                    
                        <div>                            
                        </div>
                        <div>
                            <!-- <div class="search-psn-box"><div class="search-psn-img"><img src="https://research.ku.ac.th/forest/ForestImages/Avata/Person/400031.jpg"></div><div class="search-psn-org">Office: Dept. of Computer Engineering Faculty of Engineering  Bangkhen Campus </div><div class="search-psn-interest">Interest: Innovation & Knowledge Management,Technology Management</div></div> -->
                            <?php echo $profile->html;?>
                        </div>
                        <h6 class="text-secondary"><?php echo $profile->type;?></h6>
                    </div>
                </div>            
                <div style="height: 20px;"></div>             
                
            <?php
                }                    
            }
            ?>
            <!-- <div class="row g-3 border rounded overflow-hidden flex-md-row mb-3 shadow-sm h-md-250 position-relative">            
                <div class="row">
                    <div class="col-sm-12 mb-3">
                    
                    <h5><a href="person/400031">สมชาย นำประเสริฐชัย</a></h5>
                    
                    <div>
                        
                    </div>
                    <div>
                        <div class="search-psn-box"><div class="search-psn-img"><img src="https://research.ku.ac.th/forest/ForestImages/Avata/Person/400031.jpg"></div><div class="search-psn-org">ที่ทำงาน: ภาควิชาวิศวกรรมคอมพิวเตอร์ คณะวิศวกรรมศาสตร์ วิทยาเขตบางเขน</div><div class="search-psn-interest">สาขาที่สนใจ: Innovation & Knowledge Management,Technology Management</div></div>
                    </div>
                    <h6 class="text-secondary">Person</h6>
                </div>
            </div>                                     -->
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
