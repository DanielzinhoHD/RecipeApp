$(".form-signup").submit((event) => {
    event.preventDefault();
    $('input[name="signup"]').css('cursor', 'wait');
    $('html').css('cursor', 'wait');
    
    const name = $('input[name="r-name"]').val();
    const email = $('input[name="r-email"]').val();
    const pwd = $('input[name="r-pwd"]').val();
    const pwd2 = $('input[name="r-pwd2"]').val();
    const submit = $('input[name="signup"]').val();

    $.post("../includes/register.inc.php", {
        name: name,
        email: email,
        pwd: pwd,
        pwd2: pwd2,
        submit: submit
    }).done((error) => {
        if(!error){
            location.href = "../views/signup-successful.php";
        }
        // console.log(error);
        const span = $("#error-msg-signup");
        span.html(error);
    })
})