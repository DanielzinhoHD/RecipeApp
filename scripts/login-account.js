$(".form-login").submit((event) => {
    event.preventDefault();
    
    const email = $('input[name="l-email"]').val();
    const pwd = $('input[name="l-pwd"]').val();
    const submit = $('input[name="login"]').val();

    $.post("../includes/login.inc.php", {
        email: email,
        pwd: pwd,
        submit: submit
    }).done((error) => {
        if(!error){
            // mudar cursor pra loading;
            location.href = "./index.php";
        }
        console.log(error);
        const span = $("#error-msg-login");
        span.html(error);
    })
})