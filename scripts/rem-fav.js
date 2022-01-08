$(".fav-btn").click(() => {
    const foodId = $("button[name=\"food-id\"]").val();
    // console.log(starClass);
    // console.log(foodId);

    $(".fav-btn").load("../includes/add-fav.inc.php", {
            foodId: foodId
    });
});