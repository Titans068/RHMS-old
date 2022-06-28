<?php
session_id("session2");
session_start();
if (isset($_SESSION['username'])){
    header("Location: welcomesignedin.php");
} else {
?>
<html style="background-color: #fff8d2">

<head>
    <title>Available Houses | Rental House Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.svg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
</head>

<body style="background-color:#fff8d2">
<noscript>
    <style>
        #overlay {
            position: fixed;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2;
        }

        #text {
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 50px;
            color: #FFFFFF;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        #blurred:not(#text) {
            filter: blur(5px);
        }
    </style>

    <div id="overlay">
        <div id="text">You don't have javascript enabled. Good luck with that.</div>
    </div>
</noscript>
<div id="blurred">
    <div class="wraps">
        <div class="multi_color_border"></div>
        <div class="top_nav">
            <div class="left">
                <div class="logo"><p><span><a href="welcomesignedin.php" style="text-decoration: none" id="log">Rental House Management System </a></span>
                    </p></div>
            </div>
            <style>
                /* Style The Dropdown Button */
                .dropbtn {
                    background-color: #337ab7;
                    color: white;
                    padding: 16px;
                    font-size: 16px;
                    border: none;
                    cursor: pointer;
                }

                /* The container <div> - needed to position the dropdown content */
                .dropdown {
                    position: relative;
                    display: inline-block;
                }

                /* Dropdown Content (Hidden by Default) */
                .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                    z-index: 1;
                }

                /* Links inside the dropdown */
                .dropdown-content a {
                    color: black;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                }

                /* Change color of dropdown links on hover */
                .dropdown-content a:hover {
                    background-color: #f1f1f1
                }

                /* Show the dropdown menu on hover */
                .dropdown:hover .dropdown-content {
                    display: block;
                }

                /* Change the background color of the dropdown button when the dropdown content is shown */
                .dropdown:hover .dropbtn {
                    background-color: #1e486d;
                }
            </style>

            <div class="dropdown">
                <button class="dropbtn"
                        style="font-family: Activ Grotesk Corp,sans-serif">SIGN IN
                </button>
                <div class="dropdown-content">
                    <!--<a href="welcomesignedin.php">Home</a>-->
                    <!--<a href="login.php">Log In</a>-->
                    <a href="signout.php">Log Out</a>
                    <a href="help.php">Help</a>
                </div>
            </div>
        </div>
        <div class="bottom_nav">
            <ul>
                <li><a href="welcomesignedin.php" class="link">HOME</a></li>
                <li><a href="myhouses.php" class="link">MY HOUSE(S)</a></li>
                <li><a href="addhouse.php" class="link">ADD HOUSE(S) TO LET</a></li>
                <li><a href="update.php" class="link">UPDATE RECORD(S)</a></li>
            </ul>
        </div>
    </div>

    <div class="framecenter">
        <!-- Trigger/Open The Modal -->
        <button id="myframeBtn"><i class="fa fa-search"></i></button>
    </div>
    <!-- The Modal -->
    <div id="myframeModal" class="framemodal">

        <!-- Modal content -->
        <div class="framemodal-content">
            <span class="frameclose">&times;</span>
            <iframe src="search.php" width=100% height=80% frameBorder="0"></iframe>
        </div>

    </div>
    <style>
        /* The Modal (background) */
        .framemodal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.7); /* Black w/ opacity */
        }

        /* Modal Content */
        .framemodal-content {
            background-color: #fff8d2;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            height: 80%;
        }

        /* The Close Button */
        .frameclose {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .frameclose:hover,
        .frameclose:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        #myframeBtn {
            background-color: #337ab7;
            color: white;
            padding: 16px;
            font-size: 16px;
            font-family: Activ Grotesk Corp, sans-serif;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 30px;
        }

        #myframeBtn:hover {
            background-color: #5f5f5f;
            color: white;
        }

        .framecenter {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <script>
        let sel = document.getElementsByClassName("link");
        let linking = [];
        linking.length = 4;
        for (let k = 0; k < linking.length; k++) {
            linking[k] = sel[k].innerText;
        }
        let loghtml = document.getElementById("log").innerHTML;

        function resizer() {
            try {
                if (parseInt(window.innerWidth) <= 587) {
                    document.getElementById("log").innerHTML = "<p><span><a href='welcomesignedin.php' style='text-decoration:none;color: #337ab7' id='log'>RHMS</a> </span> </p>";
                } else {
                    document.getElementById("log").innerHTML = loghtml;
                }
                for (let i in sel) {
                    if (parseInt(window.innerWidth) <= 680) {
                        if (sel[i].innerText.length >= 5) {
                            sel[i].innerText = sel[i].innerText.substring(0, 4) + "...";
                        }
                    } else if (parseInt(window.innerWidth) > 680) {
                        sel[i].innerText = linking[i];
                    }
                }
            } catch (e) {
            }
        }

        window.addEventListener('resize', resizer, true);
        window.onload = resizer;

        document.getElementById("myframeBtn").addEventListener("click", function () {
            if (!event.detail || event.detail === 1) {
                // Get the modal
                var modal = document.getElementById("myframeModal");

                // Get the button that opens the modal
                var btn = document.getElementById("myframeBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("frameclose")[0];

                // When the user clicks the button, open the modal
                modal.style.display = "block";

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            }
        });
    </script>


    <p style="text-align: center; font-size: 22pt">All houses</p>
    <div style="padding-left: 20px;padding-right: 20px">
        <?php
        // Below is optional, remove if you have already connected to your database.
        $mysqli = mysqli_connect('localhost:3306', 'root', '', 'sakila');

        // Get the total number of records from our table "students".
        $total_pages = $mysqli->query("SELECT * FROM houses WHERE state <> 'sold'")->num_rows;

        // Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

        // Number of results to show on each page.
        $num_results_on_page = 15;

        if ($stmt = $mysqli->prepare("SELECT * FROM houses WHERE state <> 'sold' ORDER BY building LIMIT ?,?")) {
        // Calculate the page to get the results we need from our table.
        $calc_page = ($page - 1) * $num_results_on_page;
        $stmt->bind_param('ii', $calc_page, $num_results_on_page);
        $stmt->execute();
        // Get the results...
        $result = $stmt->get_result();
        ?>
        <style>
            html {
                font-family: Tahoma, Geneva, sans-serif;
                background-color: #F8F9F9;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                table-layout: auto;
                margin-bottom: 10px;
            }

            td, th {
                padding: 10px;
            }

            th {
                background-color: #337ab7;
                color: #ffffff;
                font-weight: bold;
                font-size: 13px;
                border: 1px solid #54585d;
            }

            td {
                color: #636363;
                border: 1px solid #dddfe1;
            }

            tr {
                background-color: #f9fafb;
            }

            tr:nth-child(odd) {
                background-color: #ffffff;
            }

            .pagination {
                list-style-type: none;
                padding: 10px 0;
                display: inline-flex;
                justify-content: space-between;
                box-sizing: border-box;
            }

            .pagination li {
                box-sizing: border-box;
                padding-right: 10px;
            }

            .pagination li a {
                box-sizing: border-box;
                background-color: #e2e6e6;
                padding: 8px;
                text-decoration: none;
                font-size: 12px;
                font-weight: bold;
                color: #616872;
                border-radius: 4px;
            }

            .pagination li a:hover {
                background-color: #d4dada;
            }

            .pagination .next a, .pagination .prev a {
                text-transform: uppercase;
                font-size: 12px;
            }

            .pagination .currentpage a {
                background-color: #518acb;
                color: #fff;
            }

            .pagination .currentpage a:hover {
                background-color: #518acb;
            }

            img {
                /*float: left;
                margin: 5px;*/
                width: 300px;
                height: 140px;
                margin: 20px;
            }

            .box {
                padding: 15px;
                /*background: #d9e6ee;
                border-bottom: 2px solid #7C7C7C;
                border-right: 2px solid #DADADA;
                border-left: 2px solid #DADADA;
                border-top: 2px solid #DADADA;*/
                width: fit-content;
                border-radius: 7px;
                line-height: 1.6;
            }

            .column1 {
                float: left;
                margin-left: 120px;
                margin-bottom: 30px;
            }

            @media screen and (max-width: 600px) {
                .column1 {
                    width: 100%;
                }
            }

            .preview {
                display: none;
                width: 100%;
            }

            .image {
                width: 300px;
                min-height: 100px;
                border: 2px solid lightgray;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                color: #cccccc;
                margin: auto auto 20px;
            }

            .footer {
                position: relative;
                clear: both;
                width: 100%;
                padding-bottom: 20px;
                justify-items: center;
            }

            #myImg {
                border-radius: 5px;
                cursor: pointer;
                transition: 0.3s;
            }

            #myImg:hover {
                opacity: 0.7;
            }

            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                padding-top: 100px;
                /* Location of the box */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.9);
                /* Black w/ opacity */
            }

            .modal-content ,.framemodal-content{
                margin: auto;
                display: block;
                height: 80%;
                width: 70%;
                max-width: 700px;
            }

            #caption {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
                text-align: center;
                color: #ccc;
                padding: 10px 0;
                height: 150px;
            }

            .modal-content,.framemodal-content,
            #caption {
                animation-name: zoom;
                animation-duration: 0.6s;
            }

            @keyframes zoom {
                from {
                    transform: scale(0)
                }
                to {
                    transform: scale(1)
                }
            }

            .close {
                position: absolute;
                top: 15px;
                right: 5em;
                color: #f1f1f1;
                font-size: 40px;
                font-weight: bold;
                transition: 0.3s;
            }

            .close:hover,
            .close:focus {
                color: #bbb;
                text-decoration: none;
                cursor: pointer;
            }

            @media only screen and (max-width: 700px) {
                .modal-content ,.framemodal-content{
                    width: 100%;
                }
            }
        </style>
        <!--<table>
            <tr>
                <th>Agent</th>
                <th>Building</th>
                <th>Location</th>
                <th>Rent</th>
                <th>Description</th>
                <th>House Number</th>
                <th>Phone Number</th>
                <th>Link</th>
                <th>State</th>
            </tr>-->
        <?php $i = 1;
        while ($row = $result->fetch_assoc()):
            echo "<div class='column1'><div class='box' style='background: #e3e3e3;padding-bottom: 5em;box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;'>" ?>
            <a href="#" id="pop">
                <img src="<?php
                if((string)$row['image']==""){
                    echo "images/home(2).png";
                } else {
                    echo "image/" . $row['image'];
                }
                ?>" style="margin-bottom: 30px;cursor: zoom-in"
                     class="myImages" id="myImg"
                     alt="<?php echo $row['building'] . "<br>" . $row['descr'] ?>">
            </a>

            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
            <script>
                // create references to the modal...
                var modal = document.getElementById('myModal');
                // to all images -- note I'm using a class!
                var images = document.getElementsByClassName('myImages');
                // the image in the modal
                var modalImg = document.getElementById("img01");
                // and the caption in the modal
                var captionText = document.getElementById("caption");

                // Go through all of the images with our custom class
                for (var i = 0; i < images.length; i++) {
                    var img = images[i];
                    // and attach our click listener for this image.
                    img.onclick = function (evt) {
                        modal.style.display = "block";
                        modalImg.src = this.src;
                        captionText.innerHTML = this.alt;
                    }
                }

                var span = document.getElementsByClassName("close")[0];

                span.onclick = function () {
                    modal.style.display = "none";
                }
            </script>


        <?php echo "<br>" . $row['username'] . "<br>" . $row['building'] . "<br>" . $row['location'] . "<br>" . $row['rent'] . "<br>";
        if (strlen($row['descr']) > 50):
            echo trim(substr($row['descr'], 0, 46)) . "...";
        else:
            echo $row['descr'];
        endif;
        echo "<br>" . $row['houseno'] . "<br>" . $row['phonenumber'] . "<br>" . $row['state'];
        if (substr($row['link'], 0, 7) == "http://" || substr($row['link'], 0, 3) == "www" || substr($row['link'], 0, 8) == "https://") {
        //echo "<a href=" . $row['link'] . "> Visit </a>";
        ?>
            <div class="center">
                <!-- Trigger/Open The Modal -->
                <?php echo '<a href=' . $row["link"] . ' onmouseover="this.style.background=\'#5f5f5f\'" onmouseleave="this.style.background=\'#518acb\'" style="background: #518acb;float: left; padding: 15px; border-radius: 3px;color: #FFFFFF;text-decoration: none;/*margin:0 0 0 -20em*/" target="_blank" > Visit </a>'; ?>
            </div>
            <?php
        } else {
            echo "<br>" . $row['link'] . "<br>";
        }
            ?>
<script>
                if (document.getElementsByClassName("center")) {
                    let centered = document.getElementsByClassName("center");
                    for (let i = 0; i < centered.length; i++) {
                        centered[i].style.paddingBottom = "1.8em";
                    }
                }
            </script>
            <?php echo "</div></div>";
            if ($i % 3 == 0):echo "<div style='visibility: hidden'>Jul 16 2021<br><br></div>";endif;
            $i++;endwhile; ?>
        <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
            <div class="footer">
                <div class="box" style="margin: auto;background: none;border: none;width: fit-content">
                    <ul class="pagination" style="margin-bottom: 2px">
                        <?php if ($page > 1): ?>
                            <li class="prev"><a href="allhouses.php?page=<?php echo $page - 1 ?>">Prev</a></li>
                        <?php endif; ?>

                        <?php if ($page > 3): ?>
                            <li class="start"><a href="allhouses.php?page=1">1</a></li>
                            <li class="dots">...</li>
                        <?php endif; ?>

                        <?php if ($page - 2 > 0): ?>
                            <li class="page"><a
                                    href="allhouses.php?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a>
                            </li><?php endif; ?>
                        <?php if ($page - 1 > 0): ?>
                            <li class="page"><a
                                    href="allhouses.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a>
                            </li><?php endif; ?>

                        <li class="currentpage"><a href="allhouses.php?page=<?php echo $page ?>"><?php echo $page ?></a>
                        </li>

                        <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1): ?>
                            <li class="page"><a
                                    href="allhouses.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a>
                            </li><?php endif; ?>
                        <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1): ?>
                            <li class="page"><a
                                    href="allhouses.php?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a>
                            </li><?php endif; ?>

                        <?php if ($page < ceil($total_pages / $num_results_on_page) - 2): ?>
                            <li class="dots">...</li>
                            <li class="end"><a
                                        href="allhouses.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
                            <li class="next"><a href="allhouses.php?page=<?php echo $page + 1 ?>">Next</a></li>
                        <?php endif; ?>
                    </ul>
                    <?php try {
                        if (mysqli_num_rows($result) > $num_results_on_page) {
                            print("<div>Displaying " . ($num_results_on_page * ($page - 1) + 1) . " - " . $num_results_on_page * $page . " of " . $total_pages . ".</div>");
                        } else {
                            print("<div>Displaying " . ($num_results_on_page * ($page - 1) + 1) . " - " . mysqli_num_rows($result) * $page . " of " . $total_pages . ".</div>");
                        }
                    } catch (Exception $e) {
                        print($e->getMessage());
                    } ?>
                </div>
            </div>
        <?php endif; ?>
</body>
</html>
<?php
$stmt->close();
}
        }
?>