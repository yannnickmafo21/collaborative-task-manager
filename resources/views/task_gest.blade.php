@extends('index')

@section("content")
    <!--div d'affichage de toutes les tâches-->
            <div class="tasks changed div_task_manager">
                <a href="{{ url('/change_view/add_task') }}" class="btn_add_task" id="add_task" data-id="add_task"><span class="material-symbols-outlined">add</span>Add task</a>
                <div class="tasks_header">
                    <h2 class="tasks_title">All Tasks</h2>
                    <div class="tasks_filters">
                        <button class="filter_btn active" data-filter="all">All</button>
                        <button class="filter_btn" data-filter="high">High</button>
                        <button class="filter_btn" data-filter="medium">Medium</button>
                        <button class="filter_btn" data-filter="low">Low</button>
                    </div>
                </div>

                <div class="tasks_grid">
                    @if (session("tasks"))
                        @foreach (session('tasks') as $task )
                            <div class="task_card priority-{{ $task->priority }}">
                                <div class="task_header">
                                    <h3 class="task_title">{{ $task->task_name}}</h3>
                                </div>

                                <div class="task_description">
                                    <p>{{ $task->task_description }}</p>
                                </div>

                                <div class="task_members">
                                    <div class="member_list">
                                        <img src="{{ auth()->user()->profil ? auth()->user()->profil : asset('account_circle.png') }}" alt="" class="member_avatar">
                                        <span class="member_name">{{ auth()->user()->name }}</span>
                                        @foreach ($task->members as $t)
                                            <img src="{{ $t->profil ? $t->profil : asset('account_circle.png') }}" alt="" class="member_avatar">
                                            <span class="member_name">{{ $t->name }}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="task_actions">
                                    <button class="task_action_btn edit">
                                        <span class="material-symbols-outlined">edit</span>
                                        Edit
                                    </button>
                                    <button class="task_action_btn complete">
                                        <span class="material-symbols-outlined">check_circle</span>
                                        {{ $task->status }}
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="no_tasks">
                            <div class="no_tasks_icon">
                                <span class="material-symbols-outlined">task_alt</span>
                            </div>
                            <h3>No tasks yet</h3>
                            <p>Create your first task to get started!</p>
                        </div>
                    @endif
                </div>
            </div>
@endsection
