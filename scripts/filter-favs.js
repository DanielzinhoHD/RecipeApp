filterFavs();

$("#filter").keyup(() => {
    filterFavs();
})

function filterFavs(){
    const filter = $("#filter").val();
    // console.log(filter);

        $.post("../includes/fav-obj.inc.php").done((row) => {
            row = JSON.parse(row);
            // console.log(row);
            // console.log(Object.keys(row).length)

        // Checks if user has any favorite;
            if(Object.keys(row).length > 0){
                const container = $('.favs');
    
                row.forEach((row) => {
        
                    $.getJSON(`https://www.themealdb.com/api/json/v1/1/lookup.php?i=${row['idRecipe']}`, (data) => {
                        // console.log(data);
                        const meal = data.meals[0];
                        const mealName = meal.strMeal;
        
                        const mealNameLC = mealName.toLowerCase();
                        const filterLC = filter.toLowerCase();
                    
                    // Comparing the lowercase versions of recipes name and the user input,
                    // if they match, it's shown on screen;
                        if(mealNameLC.includes(filterLC) !== false){
                        // Creates item div and stores it inside .fav;
                            const item = $("<div>", {class: "item"});
                            const a = $("<a>", {href: `../views/recipe.php?mealID=${meal['idMeal']}`});
                            let i = $("<i>", {class: "fas fa-star"});
                            const img = $("<img>", {src: meal['strMealThumb']});
                            const p = $("<p>");
                            const btn = $(`<button class="fav-btn" type="button" value=${meal['idMeal']}></button>`);
                    
                            p.html(mealName);
                            btn.append(i);
                            item.append(btn);
                            a.append(img);
                            item.append(a);
                            item.append(p);
                        
                        // Changes star icon when clicked;
                            btn.on("click", () => {
                                const starClass = $(i).attr("class");
                                const foodId = $(btn).val();
        
                                // console.log(foodId);
        
                                $.post("../includes/fav-list.inc.php", {
                                    starClass: starClass,
                                    foodId: foodId
                                }).done((star) => {
                                    btn.html(star);
                                    i = star;
                                })
                            })
                            
                            container.append(item);
                        }  
                    })
                })
            $(".favs").html(container);
            }
        });   
}