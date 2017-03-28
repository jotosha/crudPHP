$(document).ready(function(){
    $("#submit").click(function(){
        
        
        var email = $("#email").val();
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var password  = $("#password").val();
        
        var valid = true;
        
        if(firstname == "" || !isNameValid(firstname)){
            valid = false;
            $("#errorFirstname").html("Firstname Cannot Be Blank and Must Be Between 5 and 15 Characters");
        }else{
            $("#errorFirstname").html("");
        }
        
        if(lastname == "" || !isNameValid(firstname)){
            valid = false;
            $("#errorLastname").html("Lastname Cannot Be Blank and Must Be Between 5 and 15 Characters");
        }else{
            $("#errorLastname").html("");
        }
        
        if(email == "" || !isEmailVaild(email)){
            valid = false;
            $("#errorEmail").html("Enter a Valid Email and Email Cannot Be Blank.");
        }else{
            $("#errorEmail").html("");
        }
        
        if(password == "" || !isPasswordValid(password)){
            valid = false;
            $("#errorPassword").html("Password Must Be Between 5 and 15 Characters and Must Contain At Least One Lowercase Letter One Uppercase Letter and One Digit.");
        }else{
            $("#errorPassword").html("");
        }
        
        if(valid == true){
            var form_data = {
                firstname : firstname,
                lastname : lastname,
                email : email,
                password : password
            };
            
            $.ajax({
                url: "../scripts/insert.php",
                type: "POST",
                data: form_data,
                success : function(data){
                    
                }
            });
        }else{
            return false;
        }
        
    });
});

function isNameValid(name){
        return /[A-Z]+/i.test(name) && /[a-z]+/.test(name) && /\S{5,15}/.test(name);
    }

function isEmailVaild(emailAddress){
    var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return pattern.test(emailAddress);
}

function isPasswordValid(string){
    return /[A-Z]+/.test(string) && /[a-z]+/.test(string) &&
    /[\d\W]/.test(string) && /\S{5,15}/.test(string)
}
        
