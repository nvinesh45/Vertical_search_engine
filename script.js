document.addEventListener('DOMContentLoaded', (event) => {
    fetch('/all_recipes')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            displayResults(data);
        })
        .catch(error => {
            console.error('There was an error fetching data:', error);
        });
});

/*function changePlaceholder(type) {
    let placeholderText = '';

    switch (type) {
        case 'recipe':
            placeholderText = 'Enter a recipe';
            break;
        case 'servings':
            placeholderText = 'Enter number of servings...';
            break;
        case 'time':
            placeholderText = 'Enter total time...';
            break;
        case 'cuisine':
            placeholderText = 'Enter cuisine...';
            break;
        default:
            placeholderText = 'Search for a recipe...';
    }

    document.getElementById("searchBox").placeholder = placeholderText;
}*/

/*function searchRecipes(type) {
    let apiUrl = '/all_recipes';
    const searchTerm = encodeURIComponent(document.getElementById("searchBox").value.trim());

    switch (type) {
        case 'recipe':
            apiUrl = `/recipes/search_by_title?title=${searchTerm}`;
            break;
        case 'servings':
            apiUrl = `/recipes/search_by_servings?servings=${searchTerm}`;
            break;
        case 'time':
            apiUrl = `/recipes/search_by_time?total_time=${searchTerm}`;
            break;
        case 'cuisine':
            apiUrl = `/recipes/search_by_cuisine?cuisines=${searchTerm}`;
            break;
    }

    if (searchTerm) {
        fetchFromAPI(apiUrl);
    }
}*/

/*function fetchFromAPI(apiUrl) {
    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            displayResults(data);
        })
        .catch(error => {
            console.error('Error fetching recipes:', error);
        });
}*/

function displayResults(data) {
    const resultsList = document.querySelector('.results-list');
    resultsList.innerHTML = "";

    if (data && data.length) {
        data.forEach(recipe => {
            resultsList.innerHTML += `
                <div class="recipe-card">
                  <h3>${recipe.title}</h3>
                  <a href="${recipe.url}">
                      <img src="${recipe.image_url}" alt="${recipe.title}">
                  </a>
                  <p>Servings: ${recipe.servings}</p>
                  <p>Total Time: ${recipe.total_time} mins</p>
                  <p>Cuisine: ${recipe.cuisines}</p>
                </div>`;
        });
    } else {
        resultsList.innerHTML = '<p>No recipes found.</p>';
    }
}
