<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
session_id("session2");
session_start();
$username = $_SESSION['username'];
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" href="icon.svg">
    <title>
        Welcome <?php print $username ?> | Rental House Management System
    </title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet"/>
    <link rel="stylesheet" href="styles.css">
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all"/>

    <!--[if IE 6]>
    <link href="default_ie6.css" rel="stylesheet" type="text/css"/><![endif]-->

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
                <div class="logo"><p><span><a href="welcomesignedin.php" style="color: #337ab7" id="log">Rental House Management System</a> </span>
                    </p></div>
            </div>
            <style>
                body {
                    line-height: 1.6;
                }

                #main {
                    margin: 50px;
                }

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
                        style="font-family: Activ Grotesk Corp,sans-serif"><?php
                    $u = strtoupper($username);
                    if (strlen($u) > 5) {
                        if (strpos($u, " ") !== false) {
                            if (strlen(substr($u, 0, strpos($u, " "))) > 5) {
                                print(substr(substr($u, 0, strpos($u, " ")), 0, 5) . "...");
                            } else {
                                print(substr($u, 0, strpos($u, " ")));
                            }
                        } else {
                            print(trim(substr($u, 0, 5)) . "...");
                        }
                    } else {
                        print($u);
                    }
                    ?></button>
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
                <li><a href="allhouses.php" class="link">SHOW AVAILABLE HOUSES</a></li>
                <li><a href="myhouses.php" class="link">MY HOUSE(S)</a></li>
                <li><a href="addhouse.php" class="link">ADD HOUSE(S) TO LET</a></li>
                <li><a href="update.php" class="link">UPDATE RECORD(S)</a></li>
            </ul>
        </div>
    </div>
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
    </script>
    <div id="main">
        <div class="title">
            <p style="font-size: 2.5em;font-weight: bold">FIND YOUR NEW HOME.</p>
            <p style="font-size: 1.75em;">Your new home is just a click away.</p>
        </div>
        <h2>Welcome to the Help section.</h2><br>
        <p style="line-height: 1.8">
            The Rental House Management System is a website where rental agencies or individuals can list houses they
            want to rent out so that visiting guests to the website can view them. It is very easy to use.<br>
            Once the agency or agent has registered using <b>a unique username</b> and <b>a password that they must
                remember or they may fail to gain access to the site</b>, they can add a house that they want to rent
            out by clicking on <b>Add House</b> on the <b>grey navigation bar at the top of the page</b> and then enter
            details of their house.<br> Required fields are distinguished by a red asterisk and must be filled so that
            data is securely submitted.<br>
            If an agent wants to view all houses available for renting plus their details regardless whether the houses
            are owned by the agent or not, they can click on <b>Show Available Houses</b> on the <b>grey navigation bar
                at the top of the page.</b><br>
            If an agent wants to view his/her house(s) available for renting, he/she can click on <b>My Houses</b> on
            the <b>grey navigation bar at the top of the page.</b><br>
        </p>
        <br>
        <img src="images/pic03.jpg" width="600" style="float: left;margin: 0 2em 2em;"/>
        <img src="images/pic01.jpg" height="340" style="float: left;margin: 0 6em 40px;"/>
        <div style="overflow: hidden;width: 100%">
            If an agent wants to update and/or the records of <b>only his/her house(s)</b>, he/she can click on <b>Update
                Records</b> and in order to update a record, the agent <b>must</b> enter the state of sale meaning:<br>
            <b>&emsp;FOR STATE OF SALE:</b>
            <ul>
                <li><b>● Open</b> - This means that their house is free of occupants and is ready for renting.</li>
                <li><b>● Processing</b> - This means that the house has been booked and/or is in the process of sale or
                    payment but is still ready for renting in case the client or the agent reneges/withdraws due to
                    various specified reasons.
                </li>
                <li><b>● Sold</b> - This means that the house has already undergone the process of sale and the agent
                    but the agent may choose to keep the record in case an unexpected event occurs and the house no
                    longer has an occupant.
                </li>
            </ul>
            <br>
            The agent <b>must</b> also enter the rent whether the same or new rent. This field <b>cannot be empty.</b>
            Then the agent <b>must</b> enter the house number of the record he/she wants to alter.<br>
            If the agent wants to delete a record, he/she <b>must</b> enter the house number of the record that is to be
            deleted.<br>
            If a logged in user wants to register a new account, he/she must <b>sign out</b> first then click on
            register where the new user will be prompted to enter their details.<br>
            With this knowledge at your fingertips, <b>happy house hunting/house listing.</b>
            <p style="line-height: 1.8">
                Contact the site administrator in case you:<br>
                ● Need to change your username or password.<br>
                ● Forget your password.<br>
                ● Encounter any error that prevents you from performing an operation on this site. For example if unable
                to enter data.
            </p>
        </div>
        <div id="contact" class="container">
            <div class="major">
                <p style="font-size: 2.5em;font-weight: bold">THE LEADING SITE FOR RENTERS.</p>
                <p style="font-size: 1.5em">Why waste time and money just to find a home? Inefficiency is now a thing of
                    the
                    past.</p>
            </div>
            <ul class="contact">
                <li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
                <li><a href="#" class="icon icon-facebook"><span></span></a></li>
                <li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>
                <li><a href="#" class="icon icon-tumblr"><span>Google+</span></a></li>
                <li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
            </ul>
        </div>
    </div>
    <div id="copyright" class="container">
        <p>&copy; 2019-2022. All rights reserved. | MARK MWIRIGI.</p>
    </div>
</div>
</body>
</html>
