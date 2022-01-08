const urlString = location.href;
const url = new URL(urlString);
const params = url.searchParams.get("search")

let rname;
let ring;
let rarea;
let rcath;

Promise.all([
    $.getJSON(`https://www.themealdb.com/api/json/v1/1/search.php?s=${params}`, (data) => {
        displayIcons(data, "Results by name", "results-name");
        if(data.meals !== null){
            rname = true;
        }
    }),
    
    $.getJSON(`https://www.themealdb.com/api/json/v1/1/filter.php?i=${params}`, (data) => {
        displayIcons(data, "Results by ingredients", "results-ing");
        if(data.meals !== null){
            ring = true;
        }        
    }),
    
    $.getJSON(`https://www.themealdb.com/api/json/v1/1/filter.php?a=${params}`, (data) => {
        displayIcons(data, "Results by area", "results-area");
        if(data.meals !== null){
            rarea = true;
        }        
    }),
    
    $.getJSON(`https://www.themealdb.com/api/json/v1/1/filter.php?c=${params}`, (data) => {
        displayIcons(data, "Results by cathegory", "results-cat");
        if(data.meals !== null){
            rcath = true; 
        }
    })
]).then(() => {
    if(!(rname || ring || rarea || rcath)){
        // If none of them return any result:
        $(".items-container").html(`<h2 id="error">Sorry but we couldn\'t find anything for <span class="error-msg">${params}</span>, try again with a different search!</h2>`);
    }else{
        $(".items-container").before(`<p>Results for "${params}"</p>`);
    }
})


    
function displayIcons(data, titleText, id){
    if(data.meals !== null){
        const title = $("<p>", {class: "title"});
        title.html(titleText);

        const meals = data.meals;

        const container = $('<div>', {id: id, class: "results"});

        $.post("../includes/fav-obj.inc.php").done((row) => {
            row = JSON.parse(row);
            // console.log(row[0]);
            // console.log($.isEmptyObject(row[0]));
    
            meals.forEach((recipe) => {
            // Create each item;
                const item = $("<div>", {class: "item"});
                const img = $("<img>", {src: recipe.strMealThumb});
                let starFav;

                // console.log(row[0].notlogged);
                
            // If not empty, loop through every fav to set if its added or not;
                if(!$.isEmptyObject(row[0]) && row[0].notlogged !== true){
                    let i = $("<i>");
                    row.forEach((row) => {
                        if(row['idRecipe'] == recipe.idMeal){
                            starFav = 'fas fa-star';
                            i.addClass(starFav);
                        }else{
                            starFav = 'far fa-star';
                            i.addClass(starFav);
                        }
                    })
                    const btn = $(`<button class="fav-btn" type="button" value=${recipe.idMeal}></button>`);
                    btn.append(i);
                    item.append(btn);

                // Add star btn to add or remove favs;
                    btn.on("click", () => {
                        const starClass = $(i).attr("class");
                        const foodId = $(btn).val();
    
                        $.post("../includes/fav-list.inc.php", {
                            starClass: starClass,
                            foodId: foodId
                        }).done((star) => {
                            if(star == '<i class=\"far fa-star\"></i>' || star == '<i class=\"fas fa-star\"></i>'){
                                btn.html(star);
                                i = star;
                                console.log('star');
                            }else{
                                console.log('alert');
                                $("body").append(star);
                            }
                            
                        })
                    })
                }

                const a = $("<a>", {href: `../views/recipe.php?mealID=${recipe.idMeal}`});
                const p = $("<p>");
                
                p.html(recipe.strMeal);
                a.append(img);
                item.append(a);
                item.append(p);
                
                // item.on("click", () => {
                //     location.href = `../views/recipe.php?mealID=${recipe.idMeal}`;
                // })
                
                
        
                container.append(item);
            })
        });

        $(".items-container").append(title);
        $(".items-container").append(container);
    }
};    
