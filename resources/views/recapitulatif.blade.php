@extends("index")

@section("content")
            <div class="dashboard changed div_dashboard">
                <div class="dashboard_overview">
                    <div class="dashboard_header">
                        <h2 class="dashboard_title">Dashboard Overview</h2>
                        <p class="dashboard_subtitle">Welcome back! Here's your project summary</p>
                    </div>

                    <div class="stats_grid">
                        <div class="stat_card">
                            <div class="stat_icon">
                                <span class="material-symbols-outlined">task_alt</span>
                            </div>
                            <div class="stat_info">
                                <h3>{{ session("num_task") }}</h3>
                                <p>Total Tasks</p>
                            </div>
                        </div>

                        <div class="stat_card">
                            <div class="stat_icon">
                                <span class="material-symbols-outlined">flag</span>
                            </div>
                            <div class="stat_info">
                                <h3>{{ session("hight_priority") }}</h3>
                                <p>High Priority</p>
                            </div>
                        </div>

                        <div class="stat_card">
                            <div class="stat_icon">
                                <span class="material-symbols-outlined">check_circle</span>
                            </div>
                            <div class="stat_info">
                                <h3>{{ session("completed_tasks") }}</h3>
                                <p>Completed</p>
                            </div>
                        </div>

                        <div class="stat_card">
                            <div class="stat_icon">
                                <span class="material-symbols-outlined">group</span>
                            </div>
                            <div class="stat_info">
                                <h3>6</h3>
                                <p>Team Members</p>
                            </div>
                        </div>
                    </div>

                    <div class="recent_activity">
                        <h3>Recent Activity</h3>
                        <div class="activity_list">
                            <div class="activity_item">
                                <div class="activity_icon">
                                    <span class="material-symbols-outlined">add_task</span>
                                </div>
                                <div class="activity_content">
                                    <p><strong>Alice Johnson</strong> created a new task "Update API Documentation"</p>
                                    <span class="activity_time">2 hours ago</span>
                                </div>
                            </div>
                            
                            <div class="activity_item">
                                <div class="activity_icon">
                                    <span class="material-symbols-outlined">check_circle</span>
                                </div>
                                <div class="activity_content">
                                    <p><strong>Bob Smith</strong> completed "Fix login bug"</p>
                                    <span class="activity_time">4 hours ago</span>
                                </div>
                            </div>

                            <div class="activity_item">
                                <div class="activity_icon">
                                    <span class="material-symbols-outlined">chat</span>
                                </div>
                                <div class="activity_content">
                                    <p><strong>Sophie Martin</strong> commented on "Database optimization"</p>
                                    <span class="activity_time">6 hours ago</span>
                                </div>
                            </div>

                            <div class="activity_item">
                                <div class="activity_icon">
                                    <span class="material-symbols-outlined">person_add</span>
                                </div>
                                <div class="activity_content">
                                    <p><strong>Marco Garcia</strong> joined the project</p>
                                    <span class="activity_time">1 day ago</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="upcoming_deadlines">
                        <h3>Upcoming Deadlines</h3>
                        <div class="deadline_list">
                            <div class="deadline_item urgent">
                                <div class="deadline_info">
                                    <h4>Client Presentation</h4>
                                    <p>Prepare slides and demo</p>
                                </div>
                                <div class="deadline_date">
                                    <span class="date">April 15</span>
                                    <span class="days_left">3 days left</span>
                                </div>
                            </div>

                            <div class="deadline_item">
                                <div class="deadline_info">
                                    <h4>Code Review</h4>
                                    <p>Review pull requests</p>
                                </div>
                                <div class="deadline_date">
                                    <span class="date">April 18</span>
                                    <span class="days_left">6 days left</span>
                                </div>
                            </div>

                            <div class="deadline_item">
                                <div class="deadline_info">
                                    <h4>Testing Phase</h4>
                                    <p>Complete unit tests</p>
                                </div>
                                <div class="deadline_date">
                                    <span class="date">April 22</span>
                                    <span class="days_left">10 days left</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
