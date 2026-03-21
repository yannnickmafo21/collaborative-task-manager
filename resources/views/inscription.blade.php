<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incription</title>
    @vite("/resources/css/inscription.css")
    @vite("/resources/js/inscription.js")
</head>
<body>
    <h1>MyTasks</h1>
    <div class="container">
        <h2>inscription</h2>
        <form action="">
            <div class="preview_profil">
                <img src={{ asset("account_circle.png") }} alt="" srcset="" class="img_profil">
            </div>
            <div class="div_input">
                <label for="profil" class="label-file">Choose a profil image</label>
                <input type="file" name="profil" id="profil" accept="image/*">
                
                <label for="name" class="label-text">Name</label>
                <input type="text" name="name" id="name" placeholder="your username" class="input-text">
                
                <label for="email" class="label-text">Email</label>
                <input type="email" name="email" id="email" placeholder="abcd@gmail.com" class="input-text">
                
                <label for="password" class="label-text">Password</label>
                <input type="password" name="password" id="password" placeholder="your password" class="input-text">
                
                <a href="login">login</a>
            </div>
            <div class="div_button">
                <button type="reset">reset</button>
                <button type="button">submit</button>
            </div>

        </form>
    </div>
</body>
</html>