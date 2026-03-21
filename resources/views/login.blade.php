<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    @vite('resources/css/login.css')
</head>
<body>
    <div class="container">
        <div class="container_div div_image">
            <h1>MyTasks</h1>
            <img src={{asset("login_image.jpg")}} alt="" srcset="" class="image">
        </div>
        <div class="container_div div_form">
            <h2><u>login</u></h2>
            <form action="">
                <div class="div_input">
                    <label for="email">Email</label><input type="email" id="email" required placeholder="abcd@gmail.com">

                    <label for="pwrd">Password</label><input type="password" required id="pwrd" placeholder="Your password"><br>

                    <a href="inscription" target="_blank" rel="noopener noreferrer">Inscript yourself</a>
                </div>
                <div class="div_button">
                    <button type="reset" class="reset">
                        Reset
                    </button>
                    
                    <button type="submit" class="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>