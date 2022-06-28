<html>
<?php
session_id("session2");
session_start();
$username = $_SESSION['username'];

?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Update record | Rental House Management System</title>
    <link rel="icon" href="icon.svg">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            font: 14px Lato sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
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
        <div id="text" style="font-family: sans-serif">You don't have javascript enabled. Good luck with that.</div>
    </div>
</noscript>
<div id="blurred">
    <div class="wraps">
        <div class="multi_color_border"></div>
        <div class="top_nav">
            <div class="left">
                <div class="logo"><p><span><a href="welcomesignedin.php" style="text-decoration: none" id="log">Rental House Management System</a> </span>
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

                .validator {
                    display: none;
                    color: white;
                    background: #c03030;
                    text-align: center;
                    padding: 1.2em;
                    width: 100%;
                }

                .authenticator {
                    display: none;
                    color: white;
                    background: #06D85F;
                    text-align: center;
                    padding-top: 1.2em;
                    padding-bottom: 1.2em;
                    width: 100%;
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
            </ul>
        </div>
    </div>
    <div class="authenticator"></div>
    <div class="validator"></div>
    <br>
    <div style="padding-left: 20px; display: flex; flex-direction: column;align-items: center;text-align: center;min-height: 100vh;">
        <form method="post" action="update.php" onsubmit="return valid()" style="margin-left: -180px">
            <p style="padding-left: 150px; font-size: 22pt;margin-left: -120px">Update Records</p>
            <p style="padding-left: 5mm; font-size: 12pt">Enter the state of sale and rent of your house then the<br>house
                number of the record</p>
            <p style="padding-left: 5mm;margin-top: -20px">
            <table width="400" border=" 0" cellspacing="1"
                   cellpadding="1">

                <tr>
                    <td width="100"><b>State of sale</b><span style="color: #ce3002"> ⁕</span></td>
                </tr>
                <tr>
                    <td style="height:10mm;">

                        <select name="state" id="state">
                            <option value="">---Select State--</option>
                            <option value="Open">Open</option>
                            <option value="Sold">Sold</option>
                            <option value="Processing">Processing</option>
                        </select>
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

                            // Include this in <head> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
                            const str = "States indicate the stages of the house's rental procedure. Open state means that the house is currently unoccupied and ready for renting. Processing state means that the house has a potential renter and processes are taking place for the house to be fully occupied. Sold means that the rental procedure is complete and the house already has an occupant. These records of occupied houses are not publicly displayed."
                            $("#state").tooltip({
                                placement: 'bottom',
                                trigger: 'hover',
                                container: 'body',
                                title: str,
                                width: 'auto',
                                display: 'table'
                            });
                        </script>
                    </td>
                    <br>

                <tr>
                    <td style="padding-top: 3mm" width="150"><b>Rent</b><span style="color: #ce3002"> ⁕</span></td>
                </tr>
                <tr>
                    <td><input class="form-control" name="rent" type="number" style="width: 400px"
                               id="rentprice" min=0 oninput="validity.valid||(value='');">
                    </td>
                </tr>

                <tr>
                    <td style="padding-top: 3mm" width="150"><b>House Number</b><span style="color: #ce3002"> ⁕</span>
                    </td>
                </tr>
                <tr>
                    <td><input class="form-control" name="houseno" type="text" style="width: 400px"
                               id="houseno"></td>
                </tr>

                <?php if (strcasecmp(trim($username), "admin") == 0 || strcasecmp(trim($username), "administrator") == 0) {
                    ?>
                    <tr>
                        <td><label style="float: left;display: table;margin-top: 15px"><b>Modify record as</b>
                                <span style="display: inline;color: #c03030"> ⁕</span></label></td>
                    <tr>
                        <td><input class="form-control" style="resize: none;width: 415px" size="55" name="addas"
                                   id="updas"
                                   placeholder="User to update record as."></td>
                    </tr>
                <?php } ?>
            </table>
            <div style="padding-left: 5mm" class="form-group">
                <input type="submit" name="update" class="btn btn-primary" id="update" value="Update"
                       style="margin-top:20px;margin-left: 250px">
            </div>

        </form>
        <script>
            function valid() {
                var state = document.getElementById("state").value;
                var rent = document.getElementById("rentprice").value;
                var houseno = document.getElementById("houseno").value;
                var updas = document.getElementById("updas");
                if (state.trim() === "") {
                    alert("Fields must be filled out.");
                    document.getElementById("state").style.borderColor = "#c03030";
                    document.getElementById("state").style.borderWidth = "3px";
                    document.getElementById("state").focus();
                    return false;
                }
                if (rent.trim() === "" || isNaN(rent.trim())) {
                    alert("Fields must be filled out.");
                    document.getElementById("rentprice").style.borderColor = "#c03030";
                    document.getElementById("rentprice").style.borderWidth = "3px";
                    document.getElementById("rentprice").focus();
                    return false;
                }
                if (houseno.trim() === "") {
                    alert("Fields must be filled out.");
                    document.getElementById("houseno").style.borderColor = "#c03030";
                    document.getElementById("houseno").style.borderWidth = "3px";
                    document.getElementById("houseno").focus();
                    return false;
                }
                if (document.body.contains(updas)) {
                    if (updas.value.trim() === "") {
                        alert("Fields must be filled out.");
                        updas.style.borderColor = "#eb4034";
                        updas.style.borderWidth = "3px";
                        updas.focus();
                        return false;
                    }
                }
            }
        </script>
        <?php

        if (isset($_POST['update'])) {
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $database = "sakila";

            $rec_limit = 10;
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $database);

            if (!$conn) {
                die('Could not connect: ' . mysqli_error($conn));
            }
            $state = $_POST['state'];
            $houseno = $_POST['houseno'];

            if (empty($_POST["rent"])) {
                $rent = '';
            } else {
                $rent = $_POST['rent'];
            }

            $sql = "UPDATE houses SET state = ?,rent=? WHERE username=? and houseno = ?";
            mysqli_select_db($conn, 'sakila');
            try {
                $stmt = $conn->prepare($sql);
                if (strcasecmp(trim($username), "admin") == 0 || strcasecmp(trim($username), "administrator") == 0) {
                    $updas = $_POST['addas'];
                    $stmt->bind_param("ssss", $state, $rent, $updas, $houseno);
                } else {
                    $stmt->bind_param("ssss", $state, $rent, $username, $houseno);
                }
                $stmt->execute();
            if (mysqli_affected_rows($conn) > 0) {
                ?>
                <script>
                    document.getElementsByClassName("authenticator")[0].innerHTML = "Successful data modification.";
                    document.getElementsByClassName("authenticator")[0].style.display = "block";
                </script>
            <?php
            echo "Operation successful \n";
            } elseif (mysqli_affected_rows($conn) < 1){
            ?>
                <script>
                    document.getElementsByClassName("validator")[0].innerHTML = "No such records exist to be updated.";
                    document.getElementsByClassName("validator")[0].style.display = "block";
                    document.getElementsByClassName("authenticator")[0].style.display = "none";
                </script>
            <?php
            }
            } catch (Exception $e) {
            ?>
                <script>
                    document.getElementsByClassName("validator")[0].innerHTML = "An error has occurred.";
                    document.getElementsByClassName("validator")[0].style.display = "block";
                    document.getElementsByClassName("authenticator")[0].style.display = "none";
                </script>
                <?php
                die('Could not perform operation: ' . mysqli_error($conn));
            }

            mysqli_close($conn);
        }
        ?>

        <p style="font-size: 22pt;margin-left: -150px">Delete Records</p>

        <form method="post" action="update.php" onsubmit="return validation()" style="margin-left: -150px">
            <p style="font-size: 12pt;margin-left: -50px">Enter House Number of record you want to delete</p>
            <table width="400" border="0" cellspacing="1"
                   cellpadding="2">

                <tr>
                    <td style="height: 10mm" width="100"><b>House Number</b><span style="color: #ce3002"> ⁕</span></td>
                </tr>
                <tr>
                    <td><input class="form-control" name="_house" type="text"
                               id="house_"></td>
                </tr>
                <?php if (strcasecmp(trim($username), "admin") == 0 || strcasecmp(trim($username), "administrator") == 0) {
                    ?>
                    <tr>
                        <td><label style="float: left;display: table;margin-top: 15px"><b>Delete record as</b>
                                <span style="display: inline;color: #c03030"> ⁕</span></label></td>
                    <tr>
                        <td><input class="form-control" style="resize: none;width: 415px" size="55" name="delas"
                                   id="delas"
                                   placeholder="User to delete record as."></td>
                    </tr>
                <?php } ?>
            </table>
            <br>
            <div class="form-group">
                <input class="btn btn-primary" name="delete" type="submit"
                       id="delete" value="Delete" style="margin-top:20px;margin-left: 250px">

            </div>
        </form>
        <?php if (strcasecmp(trim($username), "admin") == 0 || strcasecmp(trim($username), "administrator") == 0) {
            ?>
            <form id="deluser" method="post" action="update.php" name="deluser" onsubmit="return value3()"
                  style="margin-left: -150px">
                <table>
                    <tr>
                        <td><h2>Fill the form to delete user.</h2></td>
                    </tr>
                    <tr>
                        <td><label style="float: left"><b>Username</b>
                                <p style="display: inline;color: #c03030"> ⁕</p></label></td>
                    </tr>
                    <tr>
                        <td><textarea class="form-control" style="resize: none;width: 400px" rows="2" cols="55"
                                      name="username" id="usernm"
                                      placeholder="Enter username to delete."></textarea></td>
                    </tr>

                    <tr>
                        <td>
                            <input class="btn btn-primary" name="deluser" type="submit"
                                   id="delusera" value="Delete" style="margin-top:20px;float:right;margin-right: 35px">
                        </td>
                    </tr>
            </form></table>
        <?php } ?>
        <span style="color: #ce3002; font-size: 11pt"><br>⁕ Required fields</span>
        <script>
            function validation() {
                var del = document.getElementById("house_");
                let delas = document.getElementById("delas");
                if (del.value.trim() === "") {
                    alert("Fields must be filled out.");
                    del.style.borderColor = "#c03030";
                    del.style.borderWidth = "3px";
                    del.focus();
                    return false;
                }
                if (document.body.contains(delas)) {
                    if (delas.value.trim() === "") {
                        alert("Fields must be filled out.");
                        delas.style.borderColor = "#eb4034";
                        delas.style.borderWidth = "3px";
                        delas.focus();
                        return false;
                    }
                }
                return confirm('Are you sure you want to delete this record?');
            }

            function value3() {
                var username = document.forms["deluser"]["username"];

                if (username.value.trim() === "") {
                    alert("Fields must be filled out.");
                    document.forms["deluser"].elements["username"].style.borderColor = "#eb4034";
                    document.forms["deluser"].elements["username"].style.borderWidth = "3px";
                    document.forms["deluser"].elements["username"].focus();
                    return false;
                }
                return confirm('Are you sure you want to delete this user?');
            }
        </script>
        <?php
        if (isset($_POST['delete'])) {
            if (isset($_POST['_house']) && trim($_POST['_house']) != "" && !empty($_POST['_house'])) {
                $dbhost = 'localhost:3306';
                $dbuser = 'root';
                $dbpass = '';
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

                if (!$conn) {
                    die('Could not connect: ' . mysqli_error($conn));
                }

                $emp_id = $_POST['_house'];

                $sql = "DELETE FROM houses WHERE houseno = ? and username=?";
                mysqli_select_db($conn, 'sakila');
                try {
                    $stmt = $conn->prepare($sql);
                    if (strcasecmp(trim($username), "admin") == 0 || strcasecmp(trim($username), "administrator") == 0) {
                        $delas = $_POST['delas'];
                        $stmt->bind_param("ss", $emp_id, $delas);
                    } else {
                        $stmt->bind_param("ss", $emp_id, $username);
                    }
                    $stmt->execute();
                if (mysqli_affected_rows($conn) > 0) {
                    ?>
                    <script>
                        document.getElementsByClassName("authenticator")[0].innerHTML = "Successful data deletion.";
                        document.getElementsByClassName("authenticator")[0].style.display = "block";
                    </script>
                <?php
                echo "Deleted data successfully\n";
                }else if (mysqli_affected_rows($conn) < 1){
                ?>
                    <script>
                        document.getElementsByClassName("validator")[0].innerHTML = "No such records exist to be deleted.";
                        document.getElementsByClassName("validator")[0].style.display = "block";
                        document.getElementsByClassName("authenticator")[0].style.display = "none";
                    </script>
                <?php
                }
                } catch (Exception $e) {
                ?>
                    <script>
                        document.getElementsByClassName("validator")[0].innerHTML = "An error has occurred.";
                        document.getElementsByClassName("validator")[0].style.display = "block";
                        document.getElementsByClassName("authenticator")[0].style.display = "block";
                    </script>
                    <?php
                    die('Could not delete data: ' . mysqli_error($conn));
                }
                mysqli_close($conn);
            }
            /* else {
                echo("<span style='color: #ce3002'>Fields must be filled out.</span>");
            }*/
        }
        try {
        if (isset($_POST['deluser'])) {
            $del = $_POST['username'];
        if (isset($del) && trim($del) != "" && !empty($del)) {
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
            $sql = "DELETE houses,houseusers FROM houses INNER JOIN houseusers WHERE houses.username=? AND houseusers.username=?;";
            mysqli_select_db($conn, 'sakila');
            $stmt2 = $conn->prepare($sql);
            $stmt2->bind_param("ss", $del, $del);
            $stmt2->execute();
        if (mysqli_affected_rows($conn) > 0) {
            ?>
            <script>
                document.getElementsByClassName("authenticator")[0].innerHTML = "Successful user deletion.";
                document.getElementsByClassName("authenticator")[0].style.display = "block";
            </script>
        <?php
        echo "Deleted user successfully\n";
        } else if (mysqli_affected_rows($conn) < 1){
        ?>
            <script>
                document.getElementsByClassName("validator")[0].innerHTML = "No such user exists to be deleted.";
                document.getElementsByClassName("validator")[0].style.display = "block";
                document.getElementsByClassName("authenticator")[0].style.display = "none";
            </script>
        <?php
        }
        mysqli_close($conn);
        } else {
            echo "not catching input";
        }
        } else {
            if (isset($_POST['deluser']))
                echo "not catching form";
        }
        } catch (Exception $e) {
        ?>
            <script>
                document.getElementsByClassName("validator")[0].innerHTML = "An error has occurred.";
                document.getElementsByClassName("validator")[0].style.display = "block";
                document.getElementsByClassName("authenticator")[0].style.display = "block";
            </script>
            <?php
            die('Could not delete data: ' . mysqli_error($conn));
        }
        ?>
    </div>
</body>
</html>