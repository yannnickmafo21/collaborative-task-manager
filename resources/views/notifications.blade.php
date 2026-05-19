@extends("index")

@section("content")
    <!--div d'affichage des notifications-->
            <div class="notification changed div_notification">
                <div class="notifications_container">
                    <div class="notifications_header">
                        <h2>Notifications</h2>
                        <div class="notification_actions">
                            <button class="mark_all_read">Mark all as read</button>
                            <button class="clear_all">Clear all</button>
                        </div>
                    </div>

                    <div class="notifications_list">
                        <div class="notification_item unread">
                            <div class="notification_icon">
                                <span class="material-symbols-outlined">task_alt</span>
                            </div>
                            <div class="notification_content">
                                <h4>New task assigned</h4>
                                <p>You have been assigned to "Update user authentication"</p>
                                <span class="notification_time">5 minutes ago</span>
                            </div>
                            <div class="notification_actions">
                                <button class="notification_action_btn">View</button>
                            </div>
                        </div>

                        <div class="notification_item unread">
                            <div class="notification_icon">
                                <span class="material-symbols-outlined">chat</span>
                            </div>
                            <div class="notification_content">
                                <h4>New comment</h4>
                                <p>Alice Johnson commented on your task "API Documentation"</p>
                                <span class="notification_time">1 hour ago</span>
                            </div>
                            <div class="notification_actions">
                                <button class="notification_action_btn">Reply</button>
                            </div>
                        </div>

                        <div class="notification_item">
                            <div class="notification_icon">
                                <span class="material-symbols-outlined">person_add</span>
                            </div>
                            <div class="notification_content">
                                <h4>New team member</h4>
                                <p>Sophie Martin has joined the project</p>
                                <span class="notification_time">2 hours ago</span>
                            </div>
                            <div class="notification_actions">
                                <button class="notification_action_btn">Welcome</button>
                            </div>
                        </div>

                        <div class="notification_item">
                            <div class="notification_icon">
                                <span class="material-symbols-outlined">check_circle</span>
                            </div>
                            <div class="notification_content">
                                <h4>Task completed</h4>
                                <p>Bob Smith completed "Fix database connection"</p>
                                <span class="notification_time">4 hours ago</span>
                            </div>
                            <div class="notification_actions">
                                <button class="notification_action_btn">Review</button>
                            </div>
                        </div>

                        <div class="notification_item">
                            <div class="notification_icon">
                                <span class="material-symbols-outlined">schedule</span>
                            </div>
                            <div class="notification_content">
                                <h4>Deadline approaching</h4>
                                <p>"Client presentation" is due in 3 days</p>
                                <span class="notification_time">6 hours ago</span>
                            </div>
                            <div class="notification_actions">
                                <button class="notification_action_btn urgent">View</button>
                            </div>
                        </div>

                        <div class="notification_item">
                            <div class="notification_icon">
                                <span class="material-symbols-outlined">group</span>
                            </div>
                            <div class="notification_content">
                                <h4>Team meeting</h4>
                                <p>Weekly standup scheduled for tomorrow at 10 AM</p>
                                <span class="notification_time">1 day ago</span>
                            </div>
                            <div class="notification_actions">
                                <button class="notification_action_btn">Add to calendar</button>
                            </div>
                        </div>
                    </div>

                    <div class="notification_settings">
                        <h3>Notification Settings</h3>
                        <div class="settings_list">
                            <div class="setting_item">
                                <div class="setting_info">
                                    <h4>Email notifications</h4>
                                    <p>Receive notifications via email</p>
                                </div>
                                <label class="toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>

                            <div class="setting_item">
                                <div class="setting_info">
                                    <h4>Task assignments</h4>
                                    <p>Get notified when tasks are assigned to you</p>
                                </div>
                                <label class="toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>

                            <div class="setting_item">
                                <div class="setting_info">
                                    <h4>Comments</h4>
                                    <p>Get notified when someone comments on your tasks</p>
                                </div>
                                <label class="toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>

                            <div class="setting_item">
                                <div class="setting_info">
                                    <h4>Deadlines</h4>
                                    <p>Get reminded about upcoming deadlines</p>
                                </div>
                                <label class="toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection