<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/tastetrack/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Recipe Search</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="process.php" method="post">
    <div class="container">
        <img src="logo.jpeg" alt="Your Logo" class="logo">
        <label for="searchBox"></label>
        <input type="text" id="searchBox" name="searchTerm" placeholder="Search...">

        <select name="searchType">
            <option value="recipe">Search by Recipe</option>
            <option value="servings">Search by Servings</option>
            <option value="time">Search by Total Time</option>
            <option value="cuisine">Search by Cuisine</option>
        </select>
        <input type="submit" value="Search">
        <div class="results-list"></div>
    </div>
</form>
</body>
</html>
