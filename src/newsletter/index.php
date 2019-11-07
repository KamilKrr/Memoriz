<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/src/newsletter/style.css">
    <title>Memoriz.it</title>

    <script>
        function init(){
            let button = document.querySelector(".subscribe");
            let inputField = document.querySelector(".inputMail");

            button.addEventListener("click", function(){
                let email = inputField.value;
                if(email != ""){
                    subscribeToNewsletter(email);
                }

                email.value = "";
            });
        }

        function subscribeToNewsletter(email) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.querySelector(".result").innerHTML = this.responseText;
                }
            };

            xhttp.open("POST", "/src/newsletter/register_newsletter.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("substribe=&email=" + email);
        }

        document.addEventListener("DOMContentLoaded", init);
    </script>
</head>

<body>
    <div>
        Want to get News about Memoriz? <br> Subscribe to our newsletter now!
    </div>
        
    <div class="inputContainer">
        <input class="inputMail" type="email" placeholder="beispiel@gmail.com">
        <button class="subscribe">Subscribe</button>
    </div>
    
    <div class="result">

    </div>
</body>

</html>