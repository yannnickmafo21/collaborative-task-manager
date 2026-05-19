@extends("index")

@section("content")

<!--div d'affichage des commentaires-->
            <div class="comment changed div_comment">
                <div class="comments_container">
                    <div class="comments_header">
                        <h2>Comments & Discussion</h2>
                        <p class="comments_subtitle">Share your thoughts and updates</p>
                    </div>
                    <div>
                        @foreach (session("tasks") as $t)
                            <button class="task_comment_button color-{{ $t->priority }}" data-task-id="{{ $t->id }}">{{ $t->task_name }}</button>
                        @endforeach
                    </div>

                    <div class="comments_list" id="comments_list">
                        <!-- Comments will be loaded here dynamically -->
                    </div>

                    <form action="/post_comment" method="POST"  class="add_comment_section" >
                        @csrf
                        <input type="hidden" name="task_id" id="selected_task_id" value="">
                        <div class="add_comment_avatar">
                            <img src="{{ auth()->user()->profil }}" alt="Your profile">
                        </div>
                        <div class="add_comment_form">
                            <textarea name = "commentaire" placeholder="Add a comment..." class="add_comment" required></textarea>
                            <div class="add_comment_actions">
                                <button class="add_comment_btn cancel" type = "reset">Cancel</button>
                                <button class="add_comment_btn submit" type="submit" id="send_comment_btn">Post Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection