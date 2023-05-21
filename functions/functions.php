<?php
$db = mysqli_connect("localhost","root","","ambulance");


function getRealIpUser(){
    switch(true){    
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
    }
}


function getCat(){
    global $db;
    
    $get_cats = "select * from category";
    $run_cats = mysqli_query($db,$get_cats);

    while($row_cats=mysqli_fetch_array($run_cats)){
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];

        echo "
        <li class='nav-item'>
            <a class='nav-link active ms-2 me-2 mb-2 ps-3' aria-current='page' href='drivers.php?cat=$cat_id'>$cat_title</a>
        </li>
        ";

    }
}


function getCatCon(){
    global $db;


    if(isset($_GET['con_id'])){
        $ambulance_id = $_GET['con_id'];

                
        $get_driver = "select * from driver where con_id = '$ambulance_id'";
        $run_driver = mysqli_query($db, $get_driver);
        while ($row_driver = mysqli_fetch_array($run_driver)){
            $driver_ambulance  = $row_driver['con_id'];
            $driver_cat = $row_driver['cat_id'];

            $get_cats = "select * from category where cat_id = '$driver_cat'";
            $run_cats = mysqli_query($db,$get_cats);

            while($row_cats=mysqli_fetch_array($run_cats)){
                $cat_id = $row_cats['cat_id'];
                $cat_title = $row_cats['cat_title'];

                echo "
                <li class='nav-item'>
                    <a class='nav-link active ms-2 me-2 mb-2 ps-3' aria-current='page' href='team_details.php?cat_id=$cat_id'>$cat_title</a>
                </li>
                ";

        }
    }
    }
}


function button(){
    global $db;
    
    $per_page=15;

    $query = "select * from driver";
    $result = mysqli_query($db,$query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records / $per_page);

    echo"<a class='btn btn-secondary' href='drivers.php?page=1'>".'First Page'."</a>";
    for($i=1; $i<=$total_pages; $i++){
        echo "
            <a class='btn btn-secondary' href='drivers.php?page=".$i."'>".$i."</a>
        ";
        }
    echo"<a class='btn btn-secondary' href='drivers.php?page=$total_pages'>".'Last Page'."</a>";
}


function driverCategory(){
    global $db;
    if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        $get_cat = "select * from category where cat_id='$cat_id'";
        $run_cat = mysqli_query($db,$get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_title = $row_cat['cat_title'];
        
        
        $get_cats = "select * from driver where cat_id='$cat_id'";
        $run_driver = mysqli_query($db,$get_cats);
        $count = mysqli_num_rows($run_driver);
        if($count==0){
            echo "
            <div class='sDetails bg-dark'>
                <h3 class='bg-dark text-center'>$cat_title</h3>
                <p class='text-center'>No Driver Found In This category. </p>
            </div>
            ";
        }
        else{
            echo "
                <div class='sDetails bg-dark'>
                    <h3 class='text-center'>$cat_title</h3>
                </div>
            ";
        }
        while($row_driver=mysqli_fetch_array($run_driver)){
            $p_id = $row_driver['driver_id'];
            $p_name = $row_driver['driver_name'];
            $p_age = $row_driver['driver_age'];
            $p_con = $row_driver['con_id'];
            $p_rating = $row_driver['driver_rating'];
            $p_img = $row_driver['driver_img'];


            $get_con = "select * from ambulance where con_id='$p_con'";
            $run_con = mysqli_query($db,$get_con);
            $row_con = mysqli_fetch_array($run_con);
            $con_title = $row_con['con_name'];


            
            echo "
            <div class='col'>
                <div class='card bg-dark text-light h-100'>
                    <a href='driver_profile.php?p_id=$p_id'><img src='admin_area/driver_img/$p_img' class='card-img-top p-3'></a>
                    <div class='card-body'>
                        <h5 class='card-title text-center fw-bolder'>$p_name</h5>
                    </div>
                </div>
            </div>
            ";
        }
    }   
}












function driverambulanceCategory(){
    global $db;
    if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        $get_cat = "select * from category where cat_id='$cat_id'";
        $run_cat = mysqli_query($db,$get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_title = $row_cat['cat_title'];
        
        
        $get_cats = "select * from driver where cat_id='$cat_id'";
        $run_driver = mysqli_query($db,$get_cats);
        $count = mysqli_num_rows($run_driver);
        if($count==0){
            echo "
            <div class='sDetails'>
                <h3 class='text-center'>$cat_title</h3>
                <p class='text-center'>No driver Found In This category. </p>
            </div>
            ";
        }
        else{
            echo "
                <div class='sDetails'>
                    <h3 class='text-center'>$cat_title</h3>
                </div>
            ";
        }
        while($row_driver=mysqli_fetch_array($run_driver)){
            $p_id = $row_driver['driver_id'];
            $p_name = $row_driver['driver_name'];
            $p_age = $row_driver['driver_age'];
            $p_con = $row_driver['con_id'];
            $p_rating = $row_driver['driver_rating'];
            $p_img = $row_driver['driver_img'];


            $get_con = "select * from ambulance where con_id='$p_con'";
            $run_con = mysqli_query($db,$get_con);
            $row_con = mysqli_fetch_array($run_con);
            $con_title = $row_con['con_name'];


            
            echo "
            <div class='col'>
                <div class='card h-100'>
                    <a href='details.php?p_id=$p_id'><img src='admin_area/driver_img/$p_img' class='card-img-top p-3'></a>
                    <div class='card-body'>
                        <h5 class='card-title text-center fw-bolder'>$p_name</h5>
                        <h6 class='card-title text-center fw-bolder'>Position: $cat_title</h6>
                        <h6 class='card-title text-center fw-bolder'>Age: $p_age</h6>
                        <h6 class='card-title text-center fw-bolder'>ambulance: $con_title</h6>
                        <h6 class='card-title text-center fw-bolder'>Rating: $p_rating/10</h6>
                    </div>
                </div>
            </div>
            ";
        }
    }   
}


function get_blog(){
    global $db;
    $get_blog = "select * from blogs";
    $run_blog = mysqli_query($db,$get_blog);
    while($row_blog = mysqli_fetch_array($run_blog)){
        $blog_id = $row_blog['blog_id'];
        $blog_title = $row_blog['blog_title'];
        $blog_img = $row_blog['blog_img'];

        echo "
            <div class='item'>
                <div class='card h-100'><a href='blog.php?blog_id=$blog_id'><img src='admin_area/blog_img/$blog_img' class='card-img-top' height='175px'></a></div>
                <h5 class='text-light'>$blog_title</h5>
            </div>
        ";
    }
}


function get_news(){
    global $db;
    $get_news = "select * from news";
    $run_news = mysqli_query($db,$get_news);
    while($row_news = mysqli_fetch_array($run_news)){
        $news_id = $row_news['news_id'];
        $news_title = $row_news['news_title'];
        $news_desc = $row_news['news_desc'];
        $news_img = $row_news['news_img'];

        echo "
        <div class='item'>
            <div class='card h-100'><a href='news.php?news_id=$news_id'><img src='admin_area/news_img/$news_img' class='card-img-top' height='175px'></a></div>
            <h5 class='text-light'>$news_title</h5>
        </div>
        ";
    }
}























function teamambulance(){
    global $db;

    $get_con = "select * from ambulance";
    $run_con = mysqli_query($db,$get_con);
    $row_con = mysqli_fetch_array($run_con);
    $con_id = $row_con['con_id'];
    $con_title = $row_con['con_name'];



    $get_driver = "select * from driver where con_id='$con_id'";
    $run_driver = mysqli_query($db,$get_driver);
    
    
    while($row_driver=mysqli_fetch_array($run_driver)){
        $p_id = $row_driver['driver_id'];
        $p_name = $row_driver['driver_name'];
        $p_age = $row_driver['driver_age'];
        $p_rating = $row_driver['driver_rating'];
        $p_img = $row_driver['driver_img'];


        $get_cat = "select * from category where cat_id='$p_id'";
        $run_cat = mysqli_query($db,$get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_title = $row_cat['cat_title'];


        
        echo "
        <div class='col'>
            <div class='card h-100'>
                <a href='details.php?p_id=$p_id'><img src='admin_area/driver_img/$p_img' class='card-img-top p-3'></a>
                <div class='card-body'>
                    <h5 class='card-title text-center fw-bolder'>$p_name</h5>
                    <h6 class='card-title text-center fw-bolder'>Position: $cat_title</h6>
                    <h6 class='card-title text-center fw-bolder'>Age: $p_age</h6>
                    <h6 class='card-title text-center fw-bolder'>ambulance: $con_title</h6>
                    <h6 class='card-title text-center fw-bolder'>Rating: $p_rating/10</h6>
                </div>
            </div>
        </div>
        ";
    }




}


?>