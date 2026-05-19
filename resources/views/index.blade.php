<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }} " id="token">
    <link rel="stylesheet" href="/resources/css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <title>index</title>
    @vite("/resources/js/index.js")
    @vite("/resources/css/index.css")
</head>
<body>
    <div class="dashboard">
        <div class="div_dashboard" id="profil">
            <div class="show_profil">
                <img src="{{ auth()->user()->profil }}" alt="photo de profil" srcset="" class="img_profil">
                <p>{{ auth()->user()->name }}</p>
            </div>
            <div class="show_option">
                <a class="options_btn" href="{{ url('change_view/recapitulatif') }}"><span class="material-symbols-outlined">dashboard</span>Dashboard</a>
                <a class="options_btn" href="{{ url('change_view/task_gest') }}"><span class="material-symbols-outlined">shoppingmode</span>Tasks manager</a>
                <a class="options_btn" href="{{ url('change_view/task_priority') }}"><span class="material-symbols-outlined">format_list_numbered</span>Priorities</a>
                <a class="options_btn" href="{{ url('change_view/comments') }}"><span class="material-symbols-outlined">chat</span>Comment</a>
                <a class="options_btn" href="{{ url('change_view/notifications') }}"><span class="material-symbols-outlined">notifications</span>Notifications</a>
                <a class="options_btn" href="{{ url('change_view/profil') }}"><span class="material-symbols-outlined">account_circle</span>Profil</a>
            </div>
            <div class="show_session">
                <button class="session_btn">close session</button>
            </div>
        </div>

        <!--div centrale de changement de fonction-->
        <div class="div_dashboard" id="container">
            @yield('content')
        </div>
    </div>
</body>
</html>