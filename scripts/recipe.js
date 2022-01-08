$(".fav").click(() => {
    const starClass = $(".fav > i").attr("class");
    const foodId = $(".fav").val();

    // console.log(starClass);
    // console.log(foodId);

    $(".fav").load("../includes/add-fav.inc.php", {
            starClass: starClass,
            foodId: foodId
    });
});