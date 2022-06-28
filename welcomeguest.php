<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_id("session2");
session_start();
if (isset($_SESSION['username'])){
    header("Location: welcomesignedin.php");
} else {
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" href="icon.svg">
    <title>
        Welcome | Rental House Management System
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all"/>

    <!--[if IE 6]>
    <link href="default_ie6.css" rel="stylesheet" type="text/css"/><![endif]-->

</head>
<body style="background-color:#fff8d2;font-family: Activ Grotesk Corp,sans-serif">
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
                <div class="logo"><p><span><a href="welcomeguest.php"
                                              style="color: #337ab7" id="log">Rental House Management System</a> </span>
                    </p>
                </div>
            </div>
            <script>
                document.getElementById("log").onmouseover = function mouse() {
                    document.getElementById("log").style.color = "#1e486d";
                }
                document.getElementById("log").onmouseleave = function mouseleave() {
                    document.getElementById("log").style.color = "#337ab7";
                }
            </script>
            <style>
                /* Style The Dropdown Button */
                .dropbtn {
                    font-family: Activ Grotesk Corp, sans-serif;
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
                    font-family: Activ Grotesk Corp, sans-serif;
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
                <button class="dropbtn" style="font-family: Activ Grotesk Corp,sans-serif">SIGN IN</button>
                <div class="dropdown-content">
                    <!--<a href="#">Home</a>-->
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                </div>
            </div>
        </div>
        <div class="bottom_nav">
            <ul>
                <!--<li><a href="welcomeguest.php">HOME</a></li>-->
            </ul>
        </div>
    </div>


    <div id="page" class="container">
        <div id="content" style="margin-left: 20px">
            <div class="title">
                <h2>Find Your New Home.</h2>
                <span class="byline">Your new home is just a click away.</span>
            </div>
            <p>Welcome to the <strong>Rental House Management System</strong>, a new, free hub where fully established
                rental agencies or individual agents can freely advertise their houses. Potential clients can then
                choose
                their new house according to their needs, tastes, budget and convenience. Renters and agencies are free
                to
                list as many houses as they want so long as they are registered.</p>
        </div>
        <div id="sidebar" style="margin-right: 20px"><a href="#" class="image image-full"><img src="images/pic05.jpg"
                                                                                               alt=""/></a></div>
    </div>
    <style type="text/css">
        #my_centered_buttons {
            display: flex;
            justify-content: center;
        }
    </style>

    <div id="my_centered_buttons">
        <a href="login.php">
            <button id="rent">I want to rent out a house</button>
        </a>
        <a href="allhousesguest.php">
            <button id="find">I want to find a house</button>
        </a>
        <style type="text/css">
            #rent {
                font-family: Activ Grotesk Corp, sans-serif;
                background-color: #337ab7;
                border: none;
                color: white;
                padding: 10px 15px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 1px 2px;
                cursor: pointer;
                border-radius: 6px;
            }

            #rent:hover {
                border: #000000;
                color: #ffffff;
                background: #225a80;
                box-shadow: 0px 0px 1px #777;
            }

            #find {
                font-family: Activ Grotesk Corp, sans-serif;
                background-color: #337ab7;
                border: none;
                color: white;
                padding: 10px 15px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 1px 2px;
                cursor: pointer;
                border-radius: 6px;
            }

            #find:hover {
                border: #000000;
                color: #ffffff;
                background: #225a80;
                box-shadow: 0px 0px 1px #777;
            }
        </style>
    </div>
    <style>
        /* The Modal (background) */
        .modal {
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
        .modal-content {
            background-color: #fff8d2;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            height: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        #myBtn {
            background-color: #337ab7;
            color: white;
            padding: 16px;
            font-size: 16px;
            font-family: Activ Grotesk Corp, sans-serif;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-bottom: 30px;
            margin-top: 30px;
        }

        #myBtn:hover {
            background-color: #5f5f5f;
            color: white;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="center">
        <!-- Trigger/Open The Modal -->
        <button id="myBtn"><i class="fa fa-search"></i></button>
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <iframe src="search.php" width=100% height=80% frameBorder="0"></iframe>
        </div>

    </div>

    <script>
        let loghtml = document.getElementById("log").innerHTML;

        function resizer() {
            if (parseInt(window.innerWidth) <= 595) {
                document.getElementById("log").innerHTML = "<p><span><a href='welcomesignedin.php' style='text-decoration:none;color: #337ab7' id='log'>RHMS</a> </span> </p>";
            } else {
                document.getElementById("log").innerHTML = loghtml;
            }
        }

        window.addEventListener('resize', resizer, true);
        window.onload = resizer;

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function () {
            modal.style.display = "block";
        }

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
    </script>


    <div style="overflow: auto" id="featured-wrapper">
        <div id="featured" class="container">
            <div class="major">
                <h2>The Struggle is over.</h2>
                <span class="byline">Finally, you can find a new home stress-free.</span>
            </div>
            <div class="column1">
                <span class="icon icon-bar-chart"></span>
                <div class="title">
                    <h2>Easy Search</h2>
                    <span class="byline">You only need to ask.</span>
                </div>
            </div>
            <div class="column1">
                <span class="icon icon-qrcode"></span>
                <div class="title">
                    <h2>Convenience</h2>
                    <span class="byline">Find your home from wherever you are.</span>
                </div>
            </div>
            <div class="column1">
                <span class="icon icon-building"></span>
                <div class="title">
                    <h2>EFFICIENCY</h2>
                    <span class="byline">Listing your house has never been easier.</span>
                </div>
            </div>
            <div class="column1">
                <span class="icon icon-picture"></span>
                <div class="title">
                    <h2 style="font-size: 19pt;margin-bottom: 15px;padding-top: 2px">You're Covered</h2>
                    <span class="byline">Whatever you want, we've got you covered.</span>
                </div>
            </div>
        </div>
    </div>
    <div id="portfolio-wrapper">
        <div id="portfolio" class="container">
            <div class="major">
                <h2>The leading site for renters.</h2>
                <span class="byline">A hub for both agencies and clients alike.</span>
            </div>
            <div class="column1">
                <a href="#" class="image image-full"><img src="images/pic01.jpg" height="150" alt=""/></a>
                <div class="box">
                    <p>Finding a home is easier. Just search to explore the variety in housing at your
                        convenience. </p>
                </div>
            </div>
            <div class="column1">
                <a href="#" class="image image-full"><img src="images/pic06.jpg" height="150" alt=""/></a>
                <div class="box">
                    <p>Renting your house is now cheap and easy. Why spend fortunes on marketing expenses?</p>
                </div>
            </div>
            <div class="column1">
                <a href="#" class="image image-full"><img src="images/pic02.jpg" height="150" alt=""/></a>
                <div class="box">
                    <p>There's something for everyone. Find the house that's perfect for you. No need to make
                        compromises.</p>

                </div>
            </div>
            <div class="column1">
                <a href="#" class="image image-full"><img src="images/pic04.jpg" height="150" alt=""/></a>
                <div class="box">
                    <p>Let's get started. Your comfort, security and happiness are in your
                        hands.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="contact" class="container">
        <div class="major">
            <h2>FIND YOUR HOME TODAY.</h2>
            <span class="byline">Why waste time and money just to find a home? Inefficiency is now a thing of the past.</span>
        </div>

        <div id="my_centered_buttons">
            <a href="login.php">
                <button id="rent">I want to rent out a house</button>
            </a>
            <a href="allhousesguest.php">
                <button id="find">I want to find a house</button>
            </a>
            <style type="text/css">
                #rent {
                    background-color: #337ab7;
                    border: none;
                    color: white;
                    padding: 10px 15px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 1px 2px;
                    cursor: pointer;
                    border-radius: 6px;
                }

                #rent:hover {
                    border: #000000;
                    color: #ffffff;
                    background: #225a80;
                    box-shadow: 0px 0px 1px #777;
                }

                #find {
                    background-color: #337ab7;
                    border: none;
                    color: white;
                    padding: 10px 15px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 1px 2px;
                    cursor: pointer;
                    border-radius: 6px;
                }

                #find:hover {
                    border: #000000;
                    color: #ffffff;
                    background: #225a80;
                    box-shadow: 0px 0px 1px #777;
                }
            </style>
        </div>
    </div>
    <div id="copyright" class="container">
        <p>&copy; 2019-2022. All rights reserved. | MARK MWIRIGI.</p>
    </div>
</body>
</html>
<?php
}
?>