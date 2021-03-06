<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<style>
    div.main {
        min-height: 100vh;
        background-color: black;
    }

    img {
        width: 100%;
    }

    p,
    ul>a {
        font-size: 1rem;
        line-height: 2;
    }

    .event-info,
    a {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;

    }

    .bg-img {
        background-image: url("https://welcome.topuertorico.org/img/th-arecibo-tele.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 250px;
    }

    .science-img {
        width: 100%;
        height: 150px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<script>
    $('.alert').alert();
</script>

<body class="bg-white">
    <?php 
/*

*/
// localhost config
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fsi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `science-home` ORDER BY `date` DESC ";
$result = $conn->query($sql);
if ($result->num_rows <= 0) {
    // output data of each row
    echo "0 results";
  } else {
      echo "Results found";

   //while PHP pulls results
  ?>

    <div class="col-sm-2"></div>
    <div class="main container-fluid bg-white ">
        <div class="col-sm-12 card   m-0 bg-white mt-4">
            <div class="row  card-top  ">
                <div class=" col-sm-6 card bg-img p-0 m-0 border-0  ">
                    <div class="card-top h-100"></div>
                    <div class="card-body h-100"></div>
                    <div class="card-footer  mb-0 p-4 text-white h-0   bg-info border-0 alert alert-warning alert-dismissible fade show"
                        role="alert">

                        <div id="alert" class="carousel slide  bg-alert h-100   w-100 " data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php  
                                          $ctr = 0; //counter

                                          while($row = $result->fetch_assoc()) {
                                            if ($ctr == 0){ //add active class to the first element of the events  
                                            
                                                echo "<li data-target='#alert' data-slide-to='". $ctr. "'class='active'></li>";
                                            }else{ //create a list item under carousel and number by number placement of element 
                                            
                                                echo "<li data-target='#alert' data-slide-to='". $ctr. "'></li>";
                                            } 
                                            $ctr++;    
                                            }   
                                                                                //go back to beginning of mysql
                                        $result->data_seek(0);
                    
                                 ?>
                                </ol>
                                <div id="inner"class="carousel-inner bg-a mb-4 h-100 bg-alert w-100 text-center">
                                    <?php 
                                    $ctr = 0;
                                        while($row = $result->fetch_assoc()){
                                            if ($ctr == 0){//restricts to show the newest four results   ?>

                                                <div class="carousel-item mb-4 <?php echo "active";?>">
                                                    
                                                    <div class=" d-none d-md-block text-center d-flex">
                                                        <h5 class="event-info"> <?php echo $row["title"]?></h5>
                                                    </div>
                                                </div>
                                            <?php   }else{           ?>
                                                <div class="carousel-item mb-4">
                                                    <div class=" d-none d-md-block d-flex">
                                                        <h5 class="w-100 event-info"><?php  echo $row["title"] ?></h5>
                                                    </div>
                                                </div>
                                            <?php  }  
                                            //add to the counter          
                                                $ctr++;
                                                }   
                                            ?>
                                </div>
                            </div>

                        <button type="button" class="close my-2" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                </div>
                <div class="col-sm-6 px-4 bg-white card-footer ">
                    <div class="card my-0 p-4">
                        <div class="card-top">
                            <h4 class=" m-0 px-0 py-1 text-center">Upcoming Events</h4>
                        </div>
                        <div class="card-body">

                            <div id="carousel" class="carousel slide bg-dark w-100 " data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php  
                                          $ctr = 0; //counter

                                          while($row = $result->fetch_assoc()) {
                                            if ($ctr == 0){ //add active class to the first element of the events  
                                            
                                                echo "<li data-target='#carousel' data-slide-to='". $ctr. "'class='active'></li>";
                                            }else{ //create a list item under carousel and number by number placement of element 
                                            
                                                echo "<li data-target='#carousel' data-slide-to='". $ctr. "'></li>";
                                            } 
                                            $ctr++;    
                                            }   
                                                                                //go back to beginning of mysql
                                        $result->data_seek(0);
                    
                                 ?>
                                </ol>
                                <div id="inner"class="carousel-inner   w-100">
                                    <?php 
                                    $ctr = 0;
                                        while($row = $result->fetch_assoc()){
                                            if ($ctr == 0){//restricts to show the newest four results   ?>

                                                <div class="carousel-item <?php echo "active";?>">
                                                    </a><img class="img-fluid" src="https://via.placeholder.com/1200x600.png "
                                                        alt="..."></a>
                                                    <div class="carousel-caption d-none d-md-block text-center d-flex">
                                                        <h5 class="event-info"> <?php echo $row["title"]?></h5>
                                                    </div>
                                                </div>
                                            <?php   }else{           ?>
                                                <div class="carousel-item">
                                                    <a href="http://"><img class="img-fluid" src="https://via.placeholder.com/1200x600.png "
                                                        alt="..."></a>
                                                    <div class="carousel-caption d-none d-md-block d-flex">
                                                        <h5 class="w-100 event-info"><?php  echo $row["title"] ?></h5>
                                                    </div>
                                                </div>
                                            <?php  }  
                                            //add to the counter          
                                                $ctr++;
                                                }   
                                            ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
  
    <div class="row mx-0 px-0 d-flex">
        <div class="col-sm-12 col-md-3">
            <h2 class="mt-4">Common Links</h2>
            <hr>
            <ul class="list-group row  text-left  my-3 px-3 ">
                <a href="#" class="list-group-item list-group-item-action">Newsletter</a>
                <a href="#" class="list-group-item list-group-item-action">Postal Service Address</a>
                <a href="#" class="list-group-item list-group-item-action">Web Content Search</a>

                <h3>Telescope</h3>
                <a href="#" class="list-group-item list-group-item-action">Telescope Operations</a>
                <a href="#" class="list-group-item list-group-item-action">Phil's Home Page</a>
                <a href="#" class="list-group-item list-group-item-action ">Puerto Rico Coordination Zone</a>
                <a href="#" class="list-group-item list-group-item-action">Remote Observation</a>
                <a href="#" class="list-group-item list-group-item-action ">Telescope Schedule</a>

                <h3>Proposals</h3>
                <a href="#" class="list-group-item list-group-item-action">Astronomy 2020 Whitepapers</a>
                <a href="#" class="list-group-item list-group-item-action">Call for Proposals</a>
                <a href="#" class="list-group-item list-group-item-action">HF Proposals</a>
            </ul>
            <h3>Facilities, Lodging, & Dining</h3>
            <a href="#" class="list-group-item list-group-item-action">Dining Services</a>
            <a href="#" class="list-group-item list-group-item-action">Lodging Facilities</a>
            <a href="#" class="list-group-item list-group-item-action">Lodging Request Form</a>
            <a href="#" class="list-group-item list-group-item-action">Facilities Request Form</a>
            <a href="#" class="list-group-item list-group-item-action">Work-Order Request Form</a>

            <h3>Staff</h3>
            <a href="#" class="list-group-item list-group-item-action">Job Openings</a>
            <a href="#" class="list-group-item list-group-item-action">Scientific Staff Calendar</a>
            <a href="#" class="list-group-item list-group-item-action">Staff Finder</a>
            </ul>

            <div class="col-12 my-4 mx-0 text-center">
                <img class="img-fluid " alt="" src="astro.png">

                <h4 class="my-4 p-0">Intranet User?</h4>

                <button class="btn btn-primary text-white col-8 py-2">Login</button>
            </div>
        </div>

        <div class="col-sm-12 col-md-9">
            <div class=" card m-0 p-0">
                <div class="row card-top row">
                    <div class=" col-sm-6  mx-0 py-4 text">

                        <h4 class="px-0 text-center py-2">Astronomy</h4>
                        <a href=""><img class=" img-fluid science-img mx-0" src="astronomy-banner_lowres.jpeg" alt=""
                                srcset=""></a>


                    </div>
                    <div class="card-body col-sm-6 py-2 mt-4 px-0 mx-0 ">
                        <p class=" px-0 text-center lead">Quick Links</p>

                        <ul class="list-group d-flex text-center justify-content-center px-4 mx-4">
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 1</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 2</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 3</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 4</a>
                        </ul>
                    </div>

                </div>
                <div class="row card-body  ">
                    <p class="py-2 px-2">
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint veniam occaecat. Id reprehenderit qui ea occaecat velit
                        reprehenderit
                        occaecat enim ullamco duis duis sit.
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint ve
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint

                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint veniam occaecat. Id reprehenderit qui ea occaecat velit
                        reprehenderit
                        occaecat enim ullamco duis duis sit.
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint ve
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint ve
                    </p>
                </div>
            </div>
            <div class=" card m-0 p-0">
                <div class="row card-top row">
                    <div class=" col-sm-6  mx-0 py-4 text">

                        <h4 class="px-0 text-center py-2">Atmospheric Sciences</h4>
                        <a href=""><img class=" img-fluid science-img mx-0" src="astronomy-banner_lowres.jpeg" alt=""
                                srcset=""></a>


                    </div>
                    <div class="card-body col-sm-6 py-2 mt-4 px-0 mx-0 ">
                        <p class=" px-0 text-center lead">Quick Links</p>

                        <ul class="list-group d-flex text-center justify-content-center px-4 mx-4">
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 1</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 2</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 3</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 4</a>
                        </ul>
                    </div>

                </div>
                <div class="row card-body  ">
                    <p class="py-2 px-2">
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint veniam occaecat. Id reprehenderit qui ea occaecat velit
                        reprehenderit
                        occaecat enim ullamco duis duis sit.
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint ve
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint

                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint veniam occaecat. Id reprehenderit qui ea occaecat velit
                        reprehenderit
                        occaecat enim ullamco duis duis sit.
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint ve
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint ve
                    </p>
                </div>
            </div>
            <div class=" card m-0 p-0">
                <div class="row card-top row">
                    <div class=" col-sm-6  mx-auto py-4 text">

                        <h4 class="px-0 text-center py-2">Planetary Sciences</h4>
                        <a href=""><img class=" img-fluid science-img mx-0" src="astronomy-banner_lowres.jpeg" alt=""
                                srcset=""></a>


                    </div>
                    <div class="card-body col-sm-6 py-2 mt-4 px-0 mx-0 ">
                        <p class=" px-0 text-center lead ">Quick Links</p>

                        <ul class="list-group d-flex text-center justify-content-center px-4 mx-4">
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 1</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 2</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 3</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 4</a>


                        </ul>
                    </div>

                </div>
                <div class="row card-body  ">
                    <p class="py-2 px-2">
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint veniam occaecat. Id reprehenderit qui ea occaecat velit
                        reprehenderit
                        occaecat enim ullamco duis duis sit.
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint ve
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint ve

                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint veniam occaecat. Id reprehenderit qui ea occaecat velit
                        reprehenderit
                        occaecat enim ullamco duis duis sit.
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint ve
                        Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint ve
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
><?php
                    }
                    ?>
</body>

</html>
<?php

$result -> free_result();
$conn->close();
?>