<?php
// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost', 'root', '', 'sakila', 3306);

// Get the total number of records from our table "students".
$total_pages = $mysqli->query('SELECT * FROM film')->num_rows;

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 5;

if ($stmt = $mysqli->prepare('SELECT * FROM film ORDER BY film_id LIMIT ?,?')) {
    // Calculate the page to get the results we need from our table.
    $calc_page = ($page - 1) * $num_results_on_page;
    $stmt->bind_param('ii', $calc_page, $num_results_on_page);
    $stmt->execute();
    // Get the results...
    $result = $stmt->get_result();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>PHP & MySQL Pagination</title>
        <meta charset="utf-8">
        <style>
            html {
                font-family: Tahoma, Geneva, sans-serif;
                padding: 20px;
                background-color: #F8F9F9;
            }

            table {
                border-collapse: collapse;
                width: 500px;
            }

            td, th {
                padding: 10px;
            }

            th {
                background-color: #54585d;
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
        </style>
    </head>
    <body>
    <table>
        <tr>
            <th>film_id</th>
            <th>title</th>
            <th>description</th>
            <th>release_year</th>
            <th>language_id</th>
            <th>original_language_id</th>
            <th>rental_duration</th>
            <th>rental_rate</th>
            <th>length</th>
            <th>replacement_cost</th>
            <th>rating</th>
            <th>special_features</th>
            <th>last_update</th>

        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['film_id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['release_year']; ?></td>
                <td><?php echo $row['language_id']; ?></td>
                <td><?php echo $row['original_language_id']; ?></td>
                <td><?php echo $row['rental_duration']; ?></td>
                <td><?php echo $row['rental_rate']; ?></td>
                <td><?php echo $row['length']; ?></td>
                <td><?php echo $row['replacement_cost']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td><?php echo $row['special_features']; ?></td>
                <td><?php echo $row['last_update']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php
    if (ceil($total_pages / $num_results_on_page) > 0):
        //print($total_pages);
        try {
            if (mysqli_num_rows($result) > $num_results_on_page) {
                print("Displaying " . ($num_results_on_page * ($page - 1) + 1) . " - " . $num_results_on_page * $page . " of " . $total_pages . ".<br>");
            } else {
                print("Displaying " . ($num_results_on_page * ($page - 1) + 1) . " - " . mysqli_num_rows($result) * $page . " of " . $total_pages . ".<br>");
            }
        } catch (Exception $e) {
            print($e->getMessage());
        }
        ?>
        <ul class="pagination">
            <?php if ($page > 1): ?>
                <li class="prev"><a href="recs.php?page=<?php echo $page - 1 ?>">Prev</a></li>
            <?php endif; ?>

            <?php if ($page > 3): ?>
                <li class="start"><a href="recs.php?page=1">1</a></li>
                <li class="dots">...</li>
            <?php endif; ?>

            <?php if ($page - 2 > 0): ?>
                <li class="page"><a href="recs.php?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a>
                </li><?php endif; ?>
            <?php if ($page - 1 > 0): ?>
                <li class="page"><a href="recs.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a>
                </li><?php endif; ?>

            <li class="currentpage"><a href="recs.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

            <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1): ?>
                <li class="page"><a href="recs.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a>
                </li><?php endif; ?>
            <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1): ?>
                <li class="page"><a href="recs.php?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a>
                </li><?php endif; ?>

            <?php if ($page < ceil($total_pages / $num_results_on_page) - 2): ?>
                <li class="dots">...</li>
                <li class="end"><a
                            href="recs.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a>
                </li>
            <?php endif; ?>

            <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
                <li class="next"><a href="recs.php?page=<?php echo $page + 1 ?>">Next</a></li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
    </body>
    </html>
    <?php
    $stmt->close();
}
?>