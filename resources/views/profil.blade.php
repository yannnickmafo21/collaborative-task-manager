@extends("index")

@section('content')
    <!--div de gestion du profil -->
            <div class="profil_management changed div_profil_management">
                <div class="profile_container">
                    <div class="profile_header">
                        <h2>Profile Management</h2>
                        <p>Manage your account settings and preferences</p>
                    </div>

                    <div class="profile_sections">
                        <div class="profile_section">
                            <div class="section_header">
                                <h3>Personal Information</h3>
                            </div>
                            <div class="profile_form">
                                <div class="form_group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" value="John" readonly>
                                </div>
                                <div class="form_group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" value="Doe" readonly>
                                </div>
                                <div class="form_group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" value="john.doe@example.com" readonly>
                                </div>
                                <div class="form_group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" id="phone" value="+1 (555) 123-4567" readonly>
                                </div>
                                <button class="edit_btn">Edit Information</button>
                            </div>
                        </div>

                        <div class="profile_section">
                            <div class="section_header">
                                <h3>Profile Picture</h3>
                            </div>
                            <div class="profile_picture_section">
                                <div class="current_picture">
                                    <img src="{{ auth()->user()->profil }}" alt="Current profile picture" class="profile_img_large">
                                </div>
                                <div class="picture_actions">
                                    <button class="upload_btn">
                                        <span class="material-symbols-outlined">cloud_upload</span>
                                        Upload New Picture
                                    </button>
                                    <button class="remove_btn">
                                        <span class="material-symbols-outlined">delete</span>
                                        Remove Picture
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="profile_section">
                            <div class="section_header">
                                <h3>Security Settings</h3>
                            </div>
                            <div class="security_options">
                                <div class="security_item">
                                    <div class="security_info">
                                        <h4>Change Password</h4>
                                        <p>Last changed 30 days ago</p>
                                    </div>
                                    <button class="security_btn">Change</button>
                                </div>

                                <div class="security_item">
                                    <div class="security_info">
                                        <h4>Two-Factor Authentication</h4>
                                        <p>Add an extra layer of security</p>
                                    </div>
                                    <label class="toggle">
                                        <input type="checkbox">
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>

                                <div class="security_item">
                                    <div class="security_info">
                                        <h4>Login Sessions</h4>
                                        <p>Manage your active sessions</p>
                                    </div>
                                    <button class="security_btn">View Sessions</button>
                                </div>
                            </div>
                        </div>

                        <div class="profile_section">
                            <div class="section_header">
                                <h3>Preferences</h3>
                            </div>
                            <div class="preferences_list">
                                <div class="preference_item">
                                    <div class="preference_info">
                                        <h4>Email Notifications</h4>
                                        <p>Receive email updates about tasks and projects</p>
                                    </div>
                                    <label class="toggle">
                                        <input type="checkbox" checked>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>

                                <div class="preference_item">
                                    <div class="preference_info">
                                        <h4>Task Reminders</h4>
                                        <p>Get reminded about upcoming deadlines</p>
                                    </div>
                                    <label class="toggle">
                                        <input type="checkbox" checked>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>

                                <div class="preference_item">
                                    <div class="preference_info">
                                        <h4>Theme</h4>
                                        <p>Choose your preferred theme</p>
                                    </div>
                                    <select class="theme_select">
                                        <option value="light">Light</option>
                                        <option value="dark">Dark</option>
                                        <option value="auto">Auto</option>
                                    </select>
                                </div>

                                <div class="preference_item">
                                    <div class="preference_info">
                                        <h4>Language</h4>
                                        <p>Select your language</p>
                                    </div>
                                    <select class="language_select">
                                        <option value="en">English</option>
                                        <option value="fr">Français</option>
                                        <option value="es">Español</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="profile_section danger_zone">
                            <div class="section_header">
                                <h3>Danger Zone</h3>
                            </div>
                            <div class="danger_actions">
                                <div class="danger_item">
                                    <div class="danger_info">
                                        <h4>Delete Account</h4>
                                        <p>Permanently delete your account and all associated data</p>
                                    </div>
                                    <button class="danger_btn">Delete Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection