<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '1234509876');
define('DB_DATABASE', 'PROJECT_DB');

// Create a database connection
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check for successful connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = mysqli_real_escape_string($db, $_POST['searchTerm']);
    $searchType = $_POST['searchType'];

    if (empty($searchTerm)) {
        echo "Please provide a search term.";
        exit;
    }

    switch ($searchType) {
        case 'recipe':
            $sql = "SELECT title, url, servings, total_time, cuisines FROM recipes WHERE title LIKE '%$searchTerm%'";
            break;
        case 'servings':
            $sql = "SELECT title, url, servings, total_time, cuisines FROM recipes WHERE servings = $searchTerm";
            break;
        case 'time':
            $sql = "SELECT title, url, servings, total_time, cuisines FROM recipes WHERE total_time = '$searchTerm'";
            break;
        case 'cuisine':
            $sql = "SELECT title, url, servings, total_time, cuisines FROM recipes WHERE cuisines LIKE '%$searchTerm%'";
            break;
        default:
            echo "Invalid search type.";
            exit;
    }

    $result = mysqli_query($db, $sql);

    if ($result) {
        // Check if there are any rows in the result
        if (mysqli_num_rows($result) > 0) {
            // Display the result
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Title: " . $row['title'] . "<br>";
                echo "URL: <a href=\"" . $row['url'] . "\">" . $row['url'] . "</a><br>";
                echo "Servings: " . $row['servings'] . "<br>";
                echo "Total time taken: " . $row['total_time'] . "<br>";
                echo "Cuisine type: " . $row['cuisines'] . "<br> <br>";
            }
        } else {
            // No results found
            echo "No results found for your search.";
        }
    } else {
        // Handle the query error
        echo "Error: " . mysqli_error($db);
    }
}

// Close the database connection when done
mysqli_close($db);
?>
