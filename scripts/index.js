getRandomMeal();

async function getRandomMeal(){
    const random1 = await fetch('https://www.themealdb.com/api/json/v1/1/random.php');
    const random2 = await fetch('https://www.themealdb.com/api/json/v1/1/random.php');
    const random3 = await fetch('https://www.themealdb.com/api/json/v1/1/random.php');
    
    const mealData1 = await random1.json();
    const mealData2 = await random2.json();
    const mealData3 = await random3.json();

    const meal1 = mealData1.meals[0];
    const meal2 = mealData2.meals[0];
    const meal3 = mealData3.meals[0];

    const img1 = document.getElementById('first-img');
    const img2 = document.getElementById('second-img');
    const img3 = document.getElementById('third-img');

    img1.style.backgroundImage = `url(${meal1.strMealThumb})`;
    img2.style.backgroundImage = `url(${meal2.strMealThumb})`;
    img3.style.backgroundImage = `url(${meal3.strMealThumb})`;

    // console.log(meal1.strMealThumb);
    // console.log(meal2.strMealThumb);
    // console.log(meal3.strMealThumb);
}

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Navbar's search form;
const searchBtn = document.querySelector(".third-btn");

const body = document.querySelector("#body");

searchBtn.addEventListener("click", () => {
    const searchDiv = document.createElement("div");
    
    const searchBar = `
        <form action="../views/search.php" method="GET">
            <input name="search" type="text" placeholder="Search">
        </form>
    `;
    searchDiv.innerHTML = searchBar;
    
    searchDiv.addEventListener("focusout", () => {
        searchDiv.remove();
    });

    searchDiv.className = "searchbar";

    body.appendChild(searchDiv);

    const input = document.querySelector(".searchbar form input");
    input.focus();
    // console.log(input.autofocus);
});