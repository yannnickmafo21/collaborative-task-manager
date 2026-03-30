@if (session("name"))
    <p>hello</p>
@endif

@if (session("tasks"))
    <p>{{session('tasks')}}</p>
@endif

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <button class="options_btn" id="dashbord"><span class="material-symbols-outlined">dashboard</span>Dashboard</button>
                <button class="options_btn" id="task_manager"><span class="material-symbols-outlined">shoppingmode</span>Tasks manager</button>
                <button class="options_btn" id="priorities"><span class="material-symbols-outlined">format_list_numbered</span>Priorities</button>
                <button class="options_btn" id="comment"><span class="material-symbols-outlined">chat</span>Comment</button>
                <button class="options_btn" id="notification"><span class="material-symbols-outlined">notifications</span>Notifications</button>
                <button class="options_btn" id="profil_management"><span class="material-symbols-outlined">account_circle</span>Profil</button>
            </div>
            <div class="show_session">
                <button class="session_btn">close session</button>
            </div>
        </div>

<!--div centrale de changement de fonction-->
        <div class="div_dashboard" id="container">
            <button class="btn_add_task" id="add_task"><span class="material-symbols-outlined">add</span>Add task</button>

<!--div d'ajout de tâche-->
            <div class="add_task disabled_div changed div_add_task">
                <form action="/create_task" method="post" class="form_add_task">
                    @csrf
                        <h2>Create task</h2>
                        <label for="task_name">Task name</label>
                        <input type="text" name="task_name" id="task_name">
                        <label for="task_description">description</label>
                        <textarea name="task_description" id="task_description" cols="30" rows="10"></textarea>
                        
                        <div class="others">
                            <label for="task_date">Date</label>
                            <input type="date" name="task_date" id="task_date">

                            <label for="task_priority">Priority</label>
                            <select name="priority" id="task_priority">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select> 
                        </div>

                    <div class="div_select_members">
                        <p>Members</p>
                        <ul>
                            @if(session("users"))
                                @foreach (session('users') as $user)
                                    @if($user->id != auth()->user()->id){
                                        <li>
                                            <input type="checkbox" name="members[]" id="member_{{ $user->id }}" value="{{ $user->id }}">
                                            <label for="member_{{ $user->id }}">{{ $user->name }}</label>
                                            <img src="{{ $user->profil ? $user->profil : asset('account_circle.png') }}" alt="" class="img_profil">
                                        </li>
                                    }
                                    @endif
                                @endforeach
                            @else
                                <p>Aucun autre membre pour l'instant</p>
                            @endif
                        </ul>
                    </div>
                    <div class="div_btn">
                        <button type="reset" class="btn_cancel">Cancel</button>
                        <button type="submit" class="btn_submit">Add task</button>
                    </div>
                    </form>
            </div>


<!--div d'affichage de toutes les tâches-->
            <div class="tasks  disabled_div changed div_task_manager">
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