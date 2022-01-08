getRandomMeal();

async function getRandomMeal(){
    const random1 = await fetch('https://www.themealdb.com/api/json/v1/1/random.php');
    const mealData1 = await random1.json();

    const meal1 = mealData1.meals[0];

    const img1 = document.getElementById('img');

    img1.style.backgroundImage = `url(${meal1.strMealThumb})`;

    // console.log(meal1.strMealThumb);
}