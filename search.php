<?php
error_reporting(E_ALL ^ E_WARNING & E_ALL ^ E_NOTICE);
session_id("session2");
session_start();
?>
<html style="background-color: #fff8d2">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.svg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Search Records</title>
    <script>
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
        }
    </script>
</head>

<body style="padding-left: 5mm; background-color:#fff8d2">
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
<p class="animtxt" style="font-size:17pt;font-family: 'Courier New',monospace">Enter search term</p>

<form method="post" action="search.php" onsubmit="return valid()">
    <table style="margin-bottom: 20px">
        <tr style="width: 40%">
            <td style="width: 25%; background-color: #fff8d2">
                <input class="form-control" name="searches" type="text" id="searches">
            </td>
            <td style="width: 10%;background-color: #fff8d2">
                <button class="btn btn-primary" name="searcher" type="submit" id="searcher" style="font-size: 20px"><i
                            class="fa fa-search"></i></button>
            </td>
        </tr>
    </table>


</form>
<script>
    function valid(){
        var searches=document.getElementById("searches");
        if (searches.trim() === "") {
            alert("Fields must be filled out.");
            searches.borderColor = "#c03030";
            searches.borderWidth = "3px";
            searches.focus();
            return false;
        }
    }
    var input = document.getElementById("searcher");
    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function (event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("searcher").click();
        }
    });
</script>
<?php

function validateinput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['searcher'])){
$searches = validateinput($_POST['searches']);
//$query = "SELECT * FROM houses WHERE CONCAT (building, location, rent,descr,houseno,phonenumber,link,username) like '%$searches%'";
if (!empty($searches)){
// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost:3306', 'root', '', 'sakila');

//Not a good prepared statement.
$quer="SELECT * FROM houses WHERE CONCAT (building, location, rent,descr,houseno,phonenumber,link,username) like ? and state <> 'sold'";
$prep_query=mysqli_prepare($mysqli,$quer);
$search0="%".$searches."%";
$prep_query->bind_param("s",$search0);

// Get the total number of records from our table.
$total_pages = $mysqli->query($prep_query)->num_rows;

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 15;

if ($stmt = $mysqli->prepare("SELECT * FROM houses WHERE CONCAT (building, location, rent,descr,houseno,phonenumber,link,username) like ? and state <> 'sold' ORDER BY building LIMIT ?,?")) {
// Calculate the page to get the results we need from our table.
$calc_page = ($page - 1) * $num_results_on_page;
$search="%".$searches."%";
$stmt->bind_param('sii', $search,$calc_page, $num_results_on_page);
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
        border-right: 1px solid #DADADA;
        border-left: 1px solid #DADADA;*/
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

    .modal-content {
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

    .modal-content,
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
        .modal-content {
            width: 100%;
        }
    }
</style>

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
                ?>" style="margin-bottom: 30px;cursor: zoom-in" class="myImages" id="myImg"
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
        img.onclick = function(evt) {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
    }

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        modal.style.display = "none";
    }
</script>


        <?php echo "<br>" . $row['username'] . "<br>" . $row['building'] . "<br>" . $row['location'] . "<br>" . $row['rent'] . "<br>";
        if (strlen($row['descr']) > 50):
            echo trim(substr($row['descr'], 0, 46)) . "...";
        else:
            echo $row['descr'];
        endif;
        echo "<br>" . $row['houseno'] . "<br>" . $row['phonenumber']."<br>".$row['state'];
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
        <?php if (ceil($total_pages / $num_results_on_page) > 0):?>
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
                            <li class="page"><a href="allhouses.php?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a>
                            </li><?php endif; ?>
                        <?php if ($page - 1 > 0): ?>
                            <li class="page"><a href="allhouses.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a>
                            </li><?php endif; ?>

                        <li class="currentpage"><a href="allhouses.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                        <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1): ?>
                            <li class="page"><a href="allhouses.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a>
                            </li><?php endif; ?>
                        <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1): ?>
                            <li class="page"><a href="allhouses.php?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a>
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
                    }?>
                </div>
            </div>
        <?php endif; ?>
</body>
</html>
<?php
$stmt->close();
}
} elseif (empty($searches)) {
    print("<p style='color:#eb4034'>Enter search term.</p>");
}
} else {
}
?>
