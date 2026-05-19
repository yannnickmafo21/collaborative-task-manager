let add_comment_btn = document.getElementById("send_comment_btn")
let task_comment_button = document.querySelectorAll(".task_comment_button")
let token = document.getElementById("token")
console.log(token.content)

console.log(task_comment_button)

task_comment_button.forEach(element => {
    element.addEventListener("click", ()=>{
        let selected_task_id = document.getElementById('selected_task_id')
        selected_task_id.value = element.getAttribute('data-task-id')
        let comment_list = document.getElementById("comments_list")
        comment_list.innerHTML=""

        fetch(`http://127.0.0.1:8000/get_comments/${selected_task_id.value}`, {
            method : 'GET',
            headers: {"Content-Type" : "application/json",
                "XSRF-TOKEN" : token.content,
            },
        }).then(response => response.json())
          .then(data => {
                console.log(data)

            data.forEach(el => {
                console.log(el)

                comment_list.innerHTML = `
                    <div class="comment_item">
                        <div class="comment_avatar">
                            <img src="${el.get_user.profil}" alt="User">
                        </div>
                        <div class="comment_content">
                            <div class="comment_header">
                                <h4>${el.get_user.name}</h4>
                                <span class="comment_time">4 hours ago</span>
                            </div>
                            <p class="comment_text">${el.contenu}</p>
                            <div class="comment_actions">
                                <button class="comment_btn">
                                    <span class="material-symbols-outlined">favorite</span> Like
                                </button>
                                <button class="comment_btn">
                                    <span class="material-symbols-outlined">reply</span> Reply
                                </button>
                            </div>
                        </div>
                    </div>`
            })
            })
    })
});


//fonction pour changer de vue en fonction des boutons du index

let changed = document.querySelectorAll(".changed");
console.log(changed)
document.querySelectorAll(".options_btn").forEach(btn =>{
    
    btn.addEventListener('click', ()=>{

        const view_name = btn.getAttribute("data-id");
        window.location.href = "/change_view/" + encodeURIComponent(view_name);
    })
})
let add_task = document.getElementById("add_task")

//ajouter une tâche & faire apparaitre le foemulaire de création de tâche
add_task.addEventListener("click", ()=>{
    changed.forEach(div => {
        div.className = "disabled_div" + " " + div.className;
        if (`${div.classList[div.classList.length-1]}` == `div_${add_task.id}`) {
            div.className = liste_classe.get(`div_${add_task.id}`) + " " + div.className;

            //sortir du formulaire au click du btn cancel
            let btn_cancel = document.querySelector(".btn_cancel");
            console.profileEnd(btn_cancel)
            btn_cancel.addEventListener("click",()=>{
                div.classList.remove(liste_classe.get(`div_${add_task.id}`))
            })
        }
    })
})

// ==================== TASK COMMENT BUTTONS ====================
function initTaskCommentButtons() {
    const taskButtons = document.querySelectorAll('.task_comment_button');
    let selectedTaskId = null;

    taskButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            taskButtons.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');

            selectedTaskId = this.getAttribute('data-task-id');
            document.getElementById('selected_task_id').value = selectedTaskId;

            // Load comments for this task
            loadCommentsForTask(selectedTaskId);
        });
    });
}


// ==================== COMMENTS INTERACTIVITY ====================
function initCommentsInteractivity() {
    // Like comment functionality
    const likeButtons = document.querySelectorAll(".comment_btn:first-child");
    
    likeButtons.forEach(btn => {
        btn.addEventListener("click", function(e) {
            e.preventDefault();
            const icon = this.querySelector(".material-symbols-outlined");
            const isLiked = this.classList.contains("liked");
            
            if (isLiked) {
                this.classList.remove("liked");
                icon.textContent = "favorite";
                this.style.color = "#4a7dff";
            } else {
                this.classList.add("liked");
                icon.textContent = "favorite";
                this.style.color = "#ff6b6b";
            }
        });
    });
}

// ==================== TASKS FILTERING ====================


// ==================== TASK ACTIONS ====================
function initTaskActions() {
    const taskCards = document.querySelectorAll('.task_card');

    taskCards.forEach(card => {
        const editBtn = card.querySelector('.task_action_btn.edit');
        const completeBtn = card.querySelector('.task_action_btn.complete');

        if (editBtn) {
            editBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const taskTitle = card.querySelector('.task_title').textContent;
                alert(`Edit task: ${taskTitle}`);
            });
        }

        if (completeBtn) {
            completeBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const taskTitle = card.querySelector('.task_title').textContent;
                if (confirm(`Mark "${taskTitle}" as completed?`)) {
                    card.style.opacity = '0.5';
                    card.style.pointerEvents = 'none';
                    this.textContent = 'Completed';
                    this.style.background = 'rgba(81, 207, 102, 0.2)';
                    this.style.color = '#51cf66';
                }
            });
        }

        // Click on card to expand/collapse
        card.addEventListener('click', function() {
            this.classList.toggle('expanded');
        });
    });
}

// ==================== NOTIFICATIONS INTERACTIVITY ====================
function initNotificationsInteractivity() {
    const markAllReadBtn = document.querySelector('.mark_all_read');
    const clearAllBtn = document.querySelector('.clear_all');
    const notificationItems = document.querySelectorAll('.notification_item');

    if (markAllReadBtn) {
        markAllReadBtn.addEventListener('click', function() {
            notificationItems.forEach(item => {
                item.classList.remove('unread');
            });
            this.textContent = 'All marked as read';
            setTimeout(() => {
                this.textContent = 'Mark all as read';
            }, 2000);
        });
    }

    if (clearAllBtn) {
        clearAllBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to clear all notifications?')) {
                notificationItems.forEach(item => {
                    item.style.opacity = '0';
                    setTimeout(() => item.remove(), 300);
                });
            }
        });
    }

    // Individual notification actions
    notificationItems.forEach(item => {
        const actionBtn = item.querySelector('.notification_action_btn');
        if (actionBtn) {
            actionBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const action = this.textContent.toLowerCase();
                const title = item.querySelector('h4').textContent;
                alert(`${action} notification: ${title}`);
                
                // Mark as read when action is taken
                item.classList.remove('unread');
            });
        }
    });
}

// ==================== PROFILE MANAGEMENT INTERACTIVITY ====================
function initProfileInteractivity() {
    // Edit information button
    const editBtn = document.querySelector('.edit_btn');
    const formInputs = document.querySelectorAll('.profile_form input');

    if (editBtn) {
        editBtn.addEventListener('click', function() {
            const isEditing = this.textContent === 'Save Changes';
            
            if (isEditing) {
                // Save changes
                formInputs.forEach(input => input.setAttribute('readonly', 'true'));
                this.textContent = 'Edit Information';
                this.style.background = '#4a7dff';
                alert('Changes saved successfully!');
            } else {
                // Enable editing
                formInputs.forEach(input => input.removeAttribute('readonly'));
                formInputs[0].focus();
                this.textContent = 'Save Changes';
                this.style.background = '#51cf66';
            }
        });
    }

    // Picture actions
    const uploadBtn = document.querySelector('.upload_btn');
    const removeBtn = document.querySelector('.remove_btn');

    if (uploadBtn) {
        uploadBtn.addEventListener('click', function() {
            alert('Upload functionality would open file picker here');
        });
    }

    if (removeBtn) {
        removeBtn.addEventListener('click', function() {
            if (confirm('Remove profile picture?')) {
                const img = document.querySelector('.profile_img_large');
                img.src = 'https://api.dicebear.com/7.x/avataaars/svg?seed=default';
                alert('Profile picture removed');
            }
        });
    }

    // Security buttons
    const securityBtns = document.querySelectorAll('.security_btn');
    securityBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const action = this.textContent.toLowerCase();
            if (action === 'change') {
                alert('Change password modal would open here');
            } else if (action === 'view sessions') {
                alert('Active sessions modal would open here');
            }
        });
    });

    // Danger zone
    const dangerBtn = document.querySelector('.danger_btn');
    if (dangerBtn) {
        dangerBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
                if (confirm('This will permanently delete all your data. Are you absolutely sure?')) {
                    alert('Account deletion would be processed here');
                }
            }
        });
    }

    // Toggle switches
    const toggles = document.querySelectorAll('.toggle input');
    toggles.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const setting = this.closest('.setting_item, .security_item, .preference_item');
            const settingName = setting.querySelector('h4').textContent;
            const status = this.checked ? 'enabled' : 'disabled';
            console.log(`${settingName}: ${status}`);
        });
    });

    // Select dropdowns
    const selects = document.querySelectorAll('.theme_select, .language_select');
    selects.forEach(select => {
        select.addEventListener('change', function() {
            const setting = this.previousElementSibling.querySelector('h4').textContent;
            console.log(`${setting} changed to: ${this.value}`);
        });
    });
}

// ==================== DASHBOARD INTERACTIVITY ====================
function initDashboardInteractivity() {
    // Stat cards hover effects
    const statCards = document.querySelectorAll('.stat_card');
    statCards.forEach(card => {
        card.addEventListener('click', function() {
            const statType = this.querySelector('.stat_info p').textContent;
            alert(`View detailed ${statType.toLowerCase()} statistics`);
        });
    });

    // Activity items
    const activityItems = document.querySelectorAll('.activity_item');
    activityItems.forEach(item => {
        item.addEventListener('click', function() {
            const action = this.querySelector('p').textContent.split(' ')[1];
            alert(`Navigate to ${action.toLowerCase()}`);
        });
    });

    // Deadline items
    const deadlineItems = document.querySelectorAll('.deadline_item');
    deadlineItems.forEach(item => {
        item.addEventListener('click', function() {
            const task = this.querySelector('h4').textContent;
            alert(`Open task: ${task}`);
        });
    });
}

// Initialize all new functionalities
document.addEventListener("DOMContentLoaded", function() {
    initCommentsInteractivity();
    initTaskActions();
    initTaskCommentButtons();
    initNotificationsInteractivity();
    initProfileInteractivity();
    initDashboardInteractivity();
});

// Reinitialize when sections become visible
const observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
        if (mutation.addedNodes.length) {
            initTasksFiltering();
            initTaskActions();
            initTaskCommentButtons();
            initNotificationsInteractivity();
            initProfileInteractivity();
            initDashboardInteractivity();
        }
    });
});

observer.observe(document.querySelector(".div_task_manager") || document.body, { childList: true, subtree: true });
observer.observe(document.querySelector(".div_notification") || document.body, { childList: true, subtree: true });
observer.observe(document.querySelector(".div_profil_management") || document.body, { childList: true, subtree: true });
observer.observe(document.querySelector(".div_dashboard") || document.body, { childList: true, subtree: true });