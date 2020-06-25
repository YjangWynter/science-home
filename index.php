<?php 
/*

*/

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
$sql = "SELECT `date`,`title` FROM `science-home` ORDER BY `date` DESC ";
$result = $conn->query($sql);
if ($result->num_rows <= 0) {
    // output data of each row
    echo "0 results";
  } else {
      $ctr = 0; //counter
   
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grid</title>
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
        font-size: 1rem
    }

    .event-info,a {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;

    }
    .bg-img{
        background-image: url("https://welcome.topuertorico.org/img/th-arecibo-tele.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 250px;
    }
    .science-img{
        width:100%;
        height:150px;
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
<script src=""></script>

<body class="bg-white">

    <div class="col-sm-2"></div>
    <div class="main container-fluid bg-white ">
        <div class="col-sm-12 card   m-0 bg-white mt-4">
            <div class="row  card-top  ">
                <div class=" col-sm-6 card bg-img p-0 m-0 border-0  ">
                    <div class="card-top h-100"></div>
                    <div class="card-body h-100"></div>
                    <div class="card-footer  mb-0 p-4 text-white h-0   bg-info border-0 alert alert-warning alert-dismissible fade show"
                        role="alert">
                        This is a section to alert users of important updates
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
                        <div class="card-body event-info   ">
                            <ul class="list-group row ">
                                <?php 
                                 while($row = $result->fetch_assoc()) {
                                    if ($ctr < 2){ //restricts to show the newest four results
                                                    //
                                        echo "<a href='#' class='list-group-item px-4 list-group-item-action  '><img src='./astro.png' alt='' class='col-4 img-fluid'><span class='badge'>". $row["date"]."</span><br>".$row["title"]."</a>";
                                        $ctr++;
                                    }
                                }
                              }
                              ?>
                            
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12 row mx-0 px-0">
        <div class="col-3">
        <h2>Common Links</h2>
        <ul class="list-group row "></ul>
        </div>
        <div class="col-9 ">
            <div class=" card m-0 p-0">
                <div class="row card-top">
                    <div class=" col-sm-12  mx-0 py-4 text">

                        <h4 class="px-0 text-center py-2">Astronomy</h4>
                        <a href=""><img class=" img-fluid science-img "
                                src="astronomy-banner_lowres.jpeg" alt="" srcset=""></a>


                    </div>
                    <div class="card-body col-sm-12 py-2  px-0 mx-4 ">
                        <p class=" px-0 text-center lead">Quick Links</p>

                        <ul class="list-group d-flex text-center justify-content-center">
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 1</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 2</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 0</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 4</a>


                        </ul>
                    </div>

                </div>
                <div class="row card-body  ">
                    <p class="py-2 px-2">Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint veniam occaecat. Id reprehenderit qui ea occaecat velit reprehenderit
                        occaecat enim ullamco duis duis sit. </p>
                </div>
            </div>
            <div class="card m-0 p-0">
                <div class="row card-top">
                    <div class=" col-sm-12  mx-0 py-4">

                        <h4 class="  col-12 px-0 text-center py-2">Atmospheric Sciences</h4>
                        <a href=""><img class=" img-fluid  science-img"
                                src="atmosphere_lowres.jpeg" alt="" srcset=""></a>


                    </div>
                    <div class="card-body col-sm-12 py-2  px-0 mx-4 ">
                        <p class=" px-0 text-center lead">Quick Links</p>

                        <ul class="list-group text-center ">
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 1</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 2</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 3</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 4</a>

                        </ul>
                    </div>

                </div>
                <div class="row card-body  ">
                    <p class="py-2 px-2">Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint veniam occaecat. Id reprehenderit qui ea occaecat velit reprehenderit
                        occaecat enim ullamco duis duis sit. </p>
                </div>
            </div>
        
            <div class="card m-0 p-0">
                <div class="row card-top">
                    <div class=" col-sm-12  mx-0 py-4">

                        <h4 class="  col-12 px-0 text-center py-2">Planetary Sciences</h4>
                        <a href=""><img class=" img-fluid science-img"
                                src="planetary_lowres.jpeg" alt="" srcset=""></a>


                    </div>
                    <div class="card-body col-sm-12 py-2  px-0 mx-4 ">
                        <p class=" px-0 text-center lead">Quick Links</p>

                        <ul class="list-group text-center   ">
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 1</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 2</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 3</a>
                            <a href="#" class="list-group-item list-group-item-action px-0 mx-0">Link 4</a>

                        </ul>
                    </div>

                </div>
                <div class="row card-body  ">
                    <p class="py-2 px-2">Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt voluptate
                        consectetur proident et culpa
                        qui. Fugiat deserunt sint veniam occaecat. Id reprehenderit qui ea occaecat velit reprehenderit
                        occaecat enim ullamco duis duis sit. </p>
                </div>
            </div>
            </div>
        </div>
           
        <div class="col-sm-12 row mx-0 px-0">
            
            <div class="col-sm-6 card m-0 p-0">
                <h4 class="text-center py-4">Proposals</h4>

                <div class="row card-top">

                    <a href=""><img class="card-img col-sm-12  img-fluid "
                            src="http://www.naic.edu/ao/sites/default/files/apr271961.jpg" alt="" srcset=""></a>
                </div>

                <div class="row card-body  ">
                    <div class=" col-sm-6 py-2  px-0 mx-0 ">
                        <p class=" px-0 text-center lead">Quick Links</p>

                        <ul class="list-group text-center  px-3">
                            <a href="#" class="list-group-item list-group-item-action">Call for Proposals</a>
                            <a href="#" class="list-group-item list-group-item-action">HF Proposals</a>
                            <a href="#" class="list-group-item list-group-item-action">Astronomy 2020
                                Whitepapers</a>
                        </ul>
                    </div>
                    <p class="mt-4 col-sm-6 p-2">Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt
                        voluptate consectetur proident et culpa
                        qui. Fugiat deserunt sint veniam occaecat. Id reprehenderit qui ea occaecat velit
                        reprehenderit
                        occaecat enim ullamco duis duis sit. </p>
                </div>

            </div>
            <div class="col-sm-6 card m-0 p-0">
                <h4 class=" text-center py-4">Telescope</h4>

                <div class="row card-top">

                    <a href=""><img class="card-img col-sm-12  img-fluid "
                            src="http://www.naic.edu/ao/sites/default/files/ao020.jpg" alt="" srcset=""></a>
                </div>

                <div class="row card-body  ">
                    <div class=" col-sm-6 py-2  px-0 mx-0 ">
                        <p class=" px-0 text-center lead">Quick Links</p>

                        <ul class="list-group text-center  px-3">
                            <a href="#" class="list-group-item list-group-item-action ">Schedule</a>
                            <a href="#" class="list-group-item list-group-item-action">Operations</a>
                            <a href="#" class="list-group-item list-group-item-action">Remote Observation</a>
                            <a href="#" class="list-group-item list-group-item-action">Phil's Home Page</a>
                            <a href="#" class="list-group-item list-group-item-action ">Puerto Rico Coordination
                                Zone</a>

                        </ul>
                    </div>
                    <p class="mt-4 col-sm-6 p-2">Culpa esse officia reprehenderit aute eiusmod Lorem ut sunt
                        voluptate consectetur proident et culpa
                        qui. Fugiat deserunt sint veniam occaecat. Id reprehenderit qui ea occaecat velit
                        reprehenderit
                        occaecat enim ullamco duis duis sit. </p>
                </div>

            </div>

        </div>
        </div>
        <div class=" bg-white my-0 p-4  card-footer mx-1 row">
                        
                        <img class="col-xs-12 col-sm-10 col-md-10 col-lg-6 " alt="" src="astro.png">
                        
                        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 my-4 text-center">

                            <h4 class="my-4 p-0">Intranet User?</h4>
                        
                            <button class="btn btn-primary text-white col-8 py-2">Login</button>
                        </div>
                    </div>

    </div>

</body>

</html>
<?php

$conn->close();
?>