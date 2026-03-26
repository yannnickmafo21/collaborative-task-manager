@if (session("profil"))
    <p>{{ auth()->user()->profil }}</p>
@endif

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <title>index</title>
    @vite(["/resources/js/index.js","/resources/css/index.css"])
</head>
<body>
    <div class="dashboard">
        <div class="div_dashboard" id="profil">
            <div class="show_profil">
                <img src="{{ auth()->user()->profil }}" alt="photo de profil" srcset="" class="img_profil">
                <p>{{ auth()->user()->name }}</p>
            </div>
            <div class="show_option">
                <button class="options_btn"><span class="material-symbols-outlined">dashboard</span>Dashboard</button>
                <button class="options_btn"><span class="material-symbols-outlined">shoppingmode</span>Tasks manager</button>
                <button class="options_btn"><span class="material-symbols-outlined">format_list_numbered</span>Priorities</button>
                <button class="options_btn"><span class="material-symbols-outlined">chat</span>Comment</button>
                <button class="options_btn"><span class="material-symbols-outlined">notifications</span>Notifications</button>
                <button class="options_btn"><span class="material-symbols-outlined">account_circle</span>Profil</button>
            </div>
            <div class="show_session">
                <button class="session_btn">close session</button>
            </div>
        </div>
        <div class="div_dashboard" id="container">
            <button class="btn_add_task"><span class="material-symbols-outlined">add</span>Add task</button>
            <div class="tasks">
                <div class="task_inside">
                    <h2>Task name</h2>
                </div>
                <div class="task_inside">
                    <h3>description</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ullam, velit omnis ex perferendis accusamus nemo voluptatibus dolore mollitia eius eveniet. Labore maxime, quae laudantium excepturi perferendis voluptas facilis numquam.</p>
                </div>
                <div class="task_inside">
                    <h3>members</h3>
                    <img src="{{ auth()->user()->profil ? auth()->user()->profil : asset('account_circle.png') }}" alt="" class="img_profil">
                    <p>{{ auth()->user()->name }}</p>
                </div>
                <div class="task_inside">
                    <h3>level priority</h3>
                </div>
            </div>
        </div>
    </div>
</body>
</html>