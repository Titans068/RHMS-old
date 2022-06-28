<?php
session_id("session2");
session_start();
$username = $_SESSION['username'];

$building = $location = $rent = $descr = $houseno = $phonenumber = $link = $addas = "";
$host = "localhost:3306";
$user = "root";
$dbpassw = "";
$database = "sakila";

$conn = mysqli_connect($host, $user, $dbpassw, $database);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.svg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
        .error {
            color: #ff0000;
        }
    </style>
    <style>
        .whitespace {
            color: #ffffff;
        }
    </style>
    <title>
        Add record | Rental House Management System
    </title>
    <link rel="stylesheet" href="styles.css">
</head>
<font face='Activ Grotesk Corp'>
    <script>
        function valid() {
            var building = document.forms["frm"]["building"].value;
            var location = document.forms["frm"]["location"].value;
            var rent = document.forms["frm"]["rent"].value;
            var descr = document.forms["frm"]["descr"].value;
            var houseno = document.forms["frm"]["houseno"].value;
            var phonenumber = document.forms["frm"]["phonenumber"].value;
            var link = document.forms["frm"]["link"].value;
            var addas = document.forms["frm"]["addas"];
            var fileInput = document.getElementById('inpfile');

            if (building.trim() === "") {
                alert("Fields must be filled out.");
                document.forms["frm"]["building"].borderColor = "#c03030";
                document.forms["frm"]["building"].borderWidth = "3px";
                document.forms["frm"]["building"].focus();
                return false;
            }
            if (location.trim() === "") {
                alert("Fields must be filled out.");
                document.forms["frm"]["location"].borderColor = "#c03030";
                document.forms["frm"]["location"].borderWidth = "3px";
                document.forms["frm"]["location"].focus();
                return false;
            }
            if (rent.trim() === "" || isNaN(rent.trim())) {
                alert("Fields must be filled out or of correct value.");
                document.forms["frm"]["rent"].borderColor = "#c03030";
                document.forms["frm"]["rent"].borderWidth = "3px";
                document.forms["frm"]["rent"].focus();
                return false;
            }
            if (descr.trim() === "") {
                alert("Fields must be filled out ");
                document.forms["frm"]["descr"].borderColor = "#c03030";
                document.forms["frm"]["descr"].borderWidth = "3px";
                document.forms["frm"]["descr"].focus();
                return false;
            }
            if (houseno.trim() === "") {
                alert("Fields must be filled out or of correct value.");
                document.forms["frm"]["houseno"].borderColor = "#c03030";
                document.forms["frm"]["houseno"].borderWidth = "3px";
                document.forms["frm"]["houseno"].focus();
                return false;
            }
            if (phonenumber.trim() === "" || isNaN(phonenumber.trim())) {
                alert("Fields must be filled out or of correct value.");
                document.forms["frm"]["phonenumber"].borderColor = "#c03030";
                document.forms["frm"]["phonenumber"].borderWidth = "3px";
                document.forms["frm"]["phonenumber"].focus();
                return false;
            }
            if (link.trim() === "") {
                alert("Fields must be filled out ");
                document.forms["frm"]["link"].borderColor = "#c03030";
                document.forms["frm"]["link"].borderWidth = "3px";
                document.forms["frm"]["link"].focus();
                return false;
            }
            if (document.body.contains(addas)) {
                if (addas.value.trim() === "") {
                    document.forms["frm"]["addas"].style.borderColor = "#eb4034";
                    document.forms["frm"]["addas"].style.borderWidth = "3px";
                    document.forms["frm"]["addas"].focus();
                    return false;
                }
            }
            if (fileInput.value !== "") {
                var filePath = fileInput.value;
                // Allowing file type
                var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                if (!allowedExtensions.exec(filePath)) {
                    alert('Uploaded file is not an image.');
                    fileInput.value = '';
                    fileInput.style.borderColor = "#eb4034";
                    fileInput.style.borderWidth = "3px";
                    fileInput.focus();
                    return false;
                }
            }
        }
    </script>


    <!--Added load event-->
    <body style="background: rgba(81,138,203,0.23)" onload="load()">
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
        <script>
            function load() {
                document.getElementById("rent").clientWidth = document.getElementById("building").clientWidth;
                document.getElementById("phonenumber").clientWidth = document.getElementById("building").clientWidth;
            }
        </script>
        <div class="wraps" style="font-family: Activ Grotesk Corp, sans-serif;">
            <div class="multi_color_border"></div>
            <div class="top_nav">
                <div class="left">
                    <div class="logo"><p><span><a href="welcomesignedin.php" style="color: #337ab7" id="log"> Rental House Management System</a></span>
                        </p></div>
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
                    <li><a href="update.php" class="link">UPDATE RECORD(S)</a></li>
                </ul>
            </div>
        </div>
        <br>
        <style type="text/css">
            body {
                font-size: 14px
            }

            .wrapper {
                width: 350px;
                padding: 20px;
            }
        </style>

        <style type="text/css">
            form {
                margin: 5mm;
            }
        </style>
        <div style="background:#fff8d2; display: flex;margin-top:-20px; flex-direction: column;justify-content: center;align-items: center;text-align: center;min-height: 100vh;">
            <div class="authenticator"></div>
            <div class="validator"></div>
            <p style="font-size: 22.5pt;font-family: Activ Grotesk Corp, sans-serif;">Fill in the form to submit a
                record.</p>
            <form name="frm" method="post" style="font-family: Activ Grotesk Corp, sans-serif;" action="addhouse.php"
                  onsubmit="return valid()" enctype="multipart/form-data">
                <label style="justify-content: left;display: table" for="a"><b>Building name</b> <span
                            class="error"> ⁕</span></label>
                <textarea id="building" class="form-control" style="resize: none" rows="2" cols="55" name="building"
                          placeholder="Building name"></textarea>
                <label style="justify-content: left;display: table" for="a"><b>Location</b><span
                            class="error"> ⁕</span></label>
                <textarea class="form-control" style="resize: none" rows="2" cols="55" name="location"
                          placeholder="Location eg. estate with street and full address"></textarea>
                <label style="justify-content: left;display: table" for="a"><b>Rent </b><span
                            class="error"> ⁕</span></label>
                <input id="rent" style="resize: none;line-height:30px;width: 415px;border-width: 1px;" size="70" min="0"
                       class="form-control"
                       type="number" name="rent" onfocus="focus(this)" min=0 oninput="validity.valid||(value='');">

                <script>
                    function focus(x) {
                        x.borderWidth("3px");
                    }
                </script>

                <label style="justify-content: left;display: table" for="a"><b>Description</b> <span
                            class="error"> ⁕</span></label>
                <textarea class="form-control" style="resize: none" rows="15" cols="55" name="descr"
                          placeholder="Description of house you are renting"></textarea>

                <label style="justify-content: left;display: table" for="a"><b>House Number</b> <span
                            class="error"> ⁕</span></label>
                <textarea class="form-control" style="resize: none" rows="2" cols="55" name="houseno"
                          placeholder="House Number"></textarea>
                <label style="justify-content: left;display: table" for="a"><b>Phone Number</b> <span
                            class="error"> ⁕</span></label>
                <input id="phonenumber" class="form-control"
                       style="resize: none;line-height:30px;width: 415px;border-width: 1px;border-color: #aaaaaa"
                       size="70"
                       type="number" name="phonenumber" onfocus="focus(this)" min=0
                       oninput="validity.valid||(value='');">
                <label style="float: left;font-weight: bold;font-size: 1.3em" for="inpfile">Upload image&nbsp;&nbsp;&nbsp;</label>
                <input class="form-control" type="file" id="inpfile" name="uploadfile" value=""
                       style="background: #fff8d2;border: none"><br>
                <div class="image" id="image">
                    <span id="imagespan">Image Preview</span>
                    <img class="preview" id="preview">
                </div>

                <label style="justify-content: left;display: table" for="a"><b>Link</b> <span
                            class="error">&nbsp;⁕</span></label>
                <textarea class="form-control" style="resize: none" rows="7" cols="55" name="link"
                          placeholder="Link to image (building image) or Maps link of house location"></textarea>

                <?php
                if (strcasecmp(trim($username), "admin") == 0 || strcasecmp(trim($username), "administrator") == 0):?>
                    <label style="justify-content: left;display: table;font-size: 1.3em"><b>Add record as</b>
                        <span style="color: #c03030"> ⁕</span></label>
                    <input class="form-control" style="resize: none;width: 415px" size="55" name="addas"
                           placeholder="User to add record as.">
                    <br>
                <?php endif; ?>

                <p><span class="error" style="float: right;font-size: 12pt">⁕ required fields</span></p><br>
                <button class="submit" style="float: right;margin-top: 20px">Submit</button>
                <script>
                    var dropZone = document.getElementById('image');
                    const preview = document.getElementById("preview");
                    const inpfile = document.getElementById("inpfile");
                    var img = document.createElement('img');

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

                    // Optional.   Show the copy icon when dragging over.  Seems to only work for chrome.
                    dropZone.addEventListener('dragover', function (e) {
                        e.stopPropagation();
                        e.preventDefault();
                        e.dataTransfer.dropEffect = 'copy';
                        dropZone.classList.add('dragging');
                    });
                    dropZone.addEventListener('dragleave', () => {
                        dropZone.classList.remove('dragging');
                    });
                    // Get file data on drop
                    dropZone.addEventListener('drop', function (e) {
                        e.stopPropagation();
                        e.preventDefault();
                        dropZone.classList.remove('dragging');
                        inpfile.files = e.dataTransfer.files;
                        var files = e.dataTransfer.files; // Array of all files
                        for (var i = 0, file; file = files[i]; i++) {
                            if (file.type.match(/image.*/)) {
                                var reader = new FileReader();
                                reader.onload = function (e2) {
                                    img.src = e2.target.result;
                                    preview.setAttribute("src", img.src);
                                    document.getElementById("imagespan").style.display = "none";
                                }
                                reader.readAsDataURL(file);
                            }
                        }
                    });
                    inpfile.addEventListener("change", function () {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            preview.style.display = "block";
                            reader.addEventListener("load", function () {
                                console.log(this);
                                preview.removeAttribute("src");
                                preview.setAttribute("src", this.result);
                            })
                            reader.readAsDataURL(file);
                            console.log(file.size);
                            document.getElementById("imagespan").style.display = "none";
                            if (parseInt(file.size) > 8388608) {
                                alert("This image file is too big. The maximum file size is 8MB.");
                                inpfile.value = "";
                                document.getElementById("imagespan").style.display = "table-cell";
                                preview.style.display = "none";
                            }

                            var filePath = inpfile.value;
                            // Allowing file type
                            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                            if (!allowedExtensions.exec(filePath)) {
                                alert('Uploaded file is not an image.');
                                inpfile.value = '';
                                inpfile.style.borderColor = "#eb4034";
                                inpfile.style.borderWidth = "3px";
                                inpfile.focus();
                            }

                        } else {
                            document.getElementById("imagespan").style.display = "table-cell";
                            preview.style.display = "none";
                        }
                    })
                </script>
                <style type="text/css">
                    #imagespan {
                        display: table-cell;
                        vertical-align: middle;
                    }

                    #image.dragging::before {
                        content: "Drop the file(s) anywhere on this container";
                        position: fixed;
                        left: 0;
                        width: 100%;
                        top: 0;
                        height: 100%;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        font-size: 1.5em;
                        background-color: rgba(51, 122, 183, 0.3);
                        pointer-events: none;
                    }

                    .submit {
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

                    .submit:hover {
                        border: #000000;
                        color: #ffffff;
                        background: #225a80;
                        box-shadow: 0px 0px 1px #777;
                    }

                    .preview {
                        display: none;
                        width: 100%;

                    }

                    .image {
                        display: table;
                        width: 300px;
                        min-height: 100px;
                        border: 2px solid lightgray;
                        align-items: center;
                        justify-content: center;
                        font-weight: bold;
                        color: #cccccc;
                        margin: auto auto 20px;
                    }

                    label[for=a] {
                        font-weight: lighter;
                        font-size: 13pt;
                        color: #565555;
                    }

                    .validator {
                        font-family: sans-serif;
                        display: none;
                        color: white;
                        background: #c03030;
                        text-align: center;
                        padding: 1.2em;
                        width: 100%;
                    }

                    .authenticator {
                        font-family: sans-serif;
                        display: none;
                        color: white;
                        background: #06D85F;
                        text-align: center;
                        padding-top: 1.2em;
                        padding-bottom: 1.2em;
                        width: 100%;
                    }

                    .form-control {
                        border-color: #777777;
                        transition: 180ms box-shadow ease-in-out;
                        border-radius: 2px;
                    }

                    .form-control:focus {
                        border: 3px solid #337ab7;
                        border-radius: 3px;
                    }

                    .form-control::-webkit-input-placeholder {
                        font-family: /*'myFont', Arial,*/ Activ Grotesk Corp, sans-serif;
                    }

                    .form-control:-ms-input-placeholder {
                        font-family: /*'myFont', Arial,*/ Activ Grotesk Corp, sans-serif;
                    }

                    .form-control:-moz-placeholder {
                        font-family: /*'myFont', Arial,*/ Activ Grotesk Corp, sans-serif;
                    }

                    .form-control::-moz-placeholder {
                        font-family: /*'myFont', Arial,*/ Activ Grotesk Corp, sans-serif;
                    }
                </style>

            </form>
        </div>
        <p style="padding-left: 5mm;font-family: Activ Grotesk Corp, sans-serif;">
            <?php
            $sellerno = rand(1, 10000000);
            if (!empty($_POST)) {
                $status = "Open";
                $sellerno = rand(1, 10000000);

                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];
                $sql = $folder = $msg = "";

                if (!file_exists($tempname) || !is_uploaded_file($tempname)) {
                    $sql = "INSERT INTO houses (building,location,rent,descr,houseno,phonenumber,link,sellerno,state,username) VALUES (:building,:location,:rent,:descr,:houseno,:phonenumber,:link,:sellerno,:state,:username)";
                } else {
                    $sql = "INSERT INTO houses (building,location,rent,descr,houseno,phonenumber,link,sellerno,state,username,image) VALUES (:building,:location,:rent,:descr,:houseno,:phonenumber,:link,:sellerno,:state,:username,:image)";
                    $filename = preg_replace('/\s+/', '', $filename);
                    $tempname = preg_replace('/\s+/', '', $tempname);
                    $folder = "image/" . $filename;
                }
                try {
                    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $dbpassw);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // prepare sql and bind parameters
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':building', $building);
                    $stmt->bindParam(':location', $location);
                    $stmt->bindParam(':rent', $rent);
                    $stmt->bindParam(':descr', $descr);
                    $stmt->bindParam(':houseno', $houseno);
                    $stmt->bindParam(':phonenumber', $phonenumber);
                    $stmt->bindParam(':link', $link);
                    $stmt->bindParam(':sellerno', $sellerno);
                    $stmt->bindParam(':state', $status);

                    if (file_exists($tempname) || is_uploaded_file($tempname)) {
                        $stmt->bindParam(':image', $filename);
                    }
                    if (strcasecmp(trim($username), "admin") == 0 || strcasecmp(trim($username), "administrator") == 0) {
                        $addas = $_REQUEST['addas'];
                        $stmt->bindParam(':username', $addas);
                    } else {
                        $stmt->bindParam(':username', $username);
                    }

                    // insert a row
                    $building = $_REQUEST['building'];
                    $location = $_REQUEST['location'];
                    $rent = $_REQUEST['rent'];
                    $descr = $_REQUEST['descr'];
                    $houseno = $_REQUEST['houseno'];
                    $phonenumber = $_REQUEST['phonenumber'];
                    $link = $_REQUEST['link'];

                    $stmt->execute();
                    if (move_uploaded_file($tempname, $folder)) {
                        $msg = "Image uploaded successfully";
                    } else {
                        $msg = "Failed to upload image";
                    }
                    echo $msg;
                    //TODO: Comment out echo statements before presentation

                    echo "<br><strong>Your Input:</strong><br>";
                    echo "Building: " . $building;
                    echo "<br>";
                    echo "Location: " . $location;
                    echo "<br>";
                    echo "Rent: " . $rent;
                    echo "<br>";
                    echo "Description: " . $descr;
                    echo "<br>";
                    echo "House Number: " . $houseno;
                    echo "<br>";
                    echo "Phone Number: " . $phonenumber;
                    echo "<br>";
                    echo "Link: " . $link;
                    ?>
                    <script>
                        document.getElementsByClassName("authenticator")[0].innerHTML = "Successful data entry.";
                        document.getElementsByClassName("authenticator")[0].style.display = "block";
                    </script>
                <?php
                echo "<br><br>New records created successfully";
                } catch (Exception $e) {
                echo $e->getTraceAsString();
                if ($e instanceof PDOException){
                if ($e->errorInfo[1] == 1062) {
                ?>
                    <script>
                        document.getElementsByClassName("validator")[0].innerHTML = "An entry already exists.";
                        document.getElementsByClassName("validator")[0].style.display = "block";
                    </script>
                <?php }
                    die("Error: " . $e->getMessage());
                }
                }
            }
            ?>
        </p>

        <?php
        if (!$conn) {
            die("Unsuccessful connection 😭😭" . mysqli_connect_error());
        } else {
            print("<br>Successful connection<br>" . $sellerno);
        }
        $conn = null;
        ?>
        <br>
    </div>
