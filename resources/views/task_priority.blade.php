@extends("index")

@section("content")
    <!--div d'affichage des taches selon leur prioritées -->
            <div class="priorities changed div_priorities">
                <div class="priorities_container">
                    <h2 class="priorities_title">Tasks by Priority</h2>
                    
                    <div class="priority_section high_priority">
                        <div class="priority_header">
                            <span class="priority_badge high">High</span>
                            <span class="priority_count">3 tasks</span>
                        </div>
                        <div class="priority_tasks">
                            <div class="priority_task_item">
                                <div class="task_info">
                                    <h4>Finalize Project Report</h4>
                                    <p class="task_date">Due: April 10, 2026</p>
                                </div>
                                <span class="material-symbols-outlined">flag</span>
                            </div>
                            <div class="priority_task_item">
                                <div class="task_info">
                                    <h4>Fix Critical Bugs</h4>
                                    <p class="task_date">Due: April 8, 2026</p>
                                </div>
                                <span class="material-symbols-outlined">flag</span>
                            </div>
                            <div class="priority_task_item">
                                <div class="task_info">
                                    <h4>Client Meeting Preparation</h4>
                                    <p class="task_date">Due: April 12, 2026</p>
                                </div>
                                <span class="material-symbols-outlined">flag</span>
                            </div>
                        </div>
                    </div>

                    <div class="priority_section medium_priority">
                        <div class="priority_header">
                            <span class="priority_badge medium">Medium</span>
                            <span class="priority_count">5 tasks</span>
                        </div>
                        <div class="priority_tasks">
                            <div class="priority_task_item">
                                <div class="task_info">
                                    <h4>Update Documentation</h4>
                                    <p class="task_date">Due: April 15, 2026</p>
                                </div>
                                <span class="material-symbols-outlined">assistant</span>
                            </div>
                            <div class="priority_task_item">
                                <div class="task_info">
                                    <h4>Code Review</h4>
                                    <p class="task_date">Due: April 14, 2026</p>
                                </div>
                                <span class="material-symbols-outlined">assistant</span>
                            </div>
                            <div class="priority_task_item">
                                <div class="task_info">
                                    <h4>Team Standup Notes</h4>
                                    <p class="task_date">Due: April 13, 2026</p>
                                </div>
                                <span class="material-symbols-outlined">assistant</span>
                            </div>
                        </div>
                    </div>

                    <div class="priority_section low_priority">
                        <div class="priority_header">
                            <span class="priority_badge low">Low</span>
                            <span class="priority_count">2 tasks</span>
                        </div>
                        <div class="priority_tasks">
                            <div class="priority_task_item">
                                <div class="task_info">
                                    <h4>Organize File Structure</h4>
                                    <p class="task_date">Due: April 20, 2026</p>
                                </div>
                                <span class="material-symbols-outlined">visibility</span>
                            </div>
                            <div class="priority_task_item">
                                <div class="task_info">
                                    <h4>Update Dependencies</h4>
                                    <p class="task_date">Due: April 25, 2026</p>
                                </div>
                                <span class="material-symbols-outlined">visibility</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection