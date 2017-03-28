$(document).ready(function(){
    $("#log_in").click(function(){
        
        
        var email = $("#email_login").val();
        var password  = $("#password_login").val();
        
        var valid = true;
        
        if(email == "" || !isEmailVaild(email)){
            valid = false;
            $("#errorEmail").html("Enter a Valid Email and Email Cannot Be Blank.");
        }else{
            $("#error_Email").html("");
        }
        
        if(password == "" || !isPasswordValid(password)){
            valid = false;
            $("#errorPassword").html("Password Must Be Between 5 and 15 Characters and Must Contain At Least One Lowercase Letter One Uppercase Letter and One Digit.");
        }else{
            $("#error_Password").html("");
        }
        
         if(valid == true){
            var login_data = {
                email : email,
                password : password
            };
            
            $.ajax({
                url: "../scripts/login.php",
                type: "POST",
                data: login_data,
                success : function(data){
                    
                }
            });
        }else{
            return false;
        }
    });
});

function isEmailVaild(emailAddress){
    var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return pattern.test(emailAddress);
}

function isPasswordValid(string){
    return /[A-Z]+/.test(string) && /[a-z]+/.test(string) &&
    /[\d\W]/.test(string) && /\S{5,15}/.test(string)
}