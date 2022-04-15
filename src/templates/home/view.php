<?=render('fragments/navbar.php', []);?>

<div class="container">
    <div class="row">
        <div class="header">
            <h1>'<?=$review['bookname']?>' by <?=$review['authorname']?></h1>
        </div>
        <div class="info">
            <p>Reviewer: <a id="reviewer-username" href="/profile/<?=$review['user_id']?>"><?=$review['username']?></a></p>
            <p>Theme: <?=$review['theme']?></p>
        </div>
        <hr>
        <div class="text">
            <?=$review['text']?>
        </div>
        <hr>
        <form method="POST" action="<?=$is_liked ? '/unlike' : '/like'?>">
            <input type="hidden" name="review_id" value="<?=$review['id']?>">
            <button class="btn btn-<?=$is_liked ? 'secondary' : 'danger'?>"><?=$is_liked ? 'Unlike' : 'Like'?> (<?=$likes_count?>)</button>
        </form>
        <hr class="mt-3">
        <div class="comments-container">
            <?php if(logged()):?>
                <form method="POST" action="/comment" class="comments-write-box">
                        <h2 id="comments-header">Leave your comment!</h2>
                        <input type="hidden" value="<?=$review['id']?>" name="id">
                        <textarea required name="text" id="comment-write" cols="50" rows="6"></textarea>
                        <div class="comment-btn-box">
                            <button id="comment-btn">Комментировать</button>
                        </div>
                </form>
                <hr>
            <?php endif;?>

                <h2>Comments: <span id="comments-count"><?=$comments_count?></span></h2>
                <?php foreach($comments as $comment):?>
                    <div class="comment-box">
                        <div><img width="30px" src="/public/img/default.png" alt="avatar"></div>
                        <div>
                            <p class="comment-info"><?=$comment['username']?> -> <?=$comment['created']?></p>
                            <p><?=$comment['text']?></p>
                        </div>
                    </div>
                <?php endforeach;?>	
        </div>
    </div>
</div>


<style>
    #reviewer-username {
        text-decoration: none;
        color: inherit;
    }

    #reviewer-username:hover {
        font-weight: bold;
    }

    .header {
        text-align: center;
    }

    .comment-box {
        display: flex;
        padding: 10px;
    }

    .comment-info {
        margin-bottom: 3px;
        font-weight: bold;
    }

</style>