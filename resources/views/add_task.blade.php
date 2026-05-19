@extends("index")

@section("content")
    <!--div d'ajout de tâche-->
            <div class="add_task changed div_add_task">
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
                                    @if($user->id != auth()->user()->id)
                                        <li>
                                            <input type="checkbox" name="members[]" id="member_{{ $user->id }}" value="{{ $user->id }}">
                                            <label for="member_{{ $user->id }}">{{ $user->name }}</label>
                                            <img src="{{ $user->profil ? $user->profil : asset('account_circle.png') }}" alt="" class="img_profil">
                                        </li>
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
@endsection