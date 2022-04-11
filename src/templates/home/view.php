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
        <div class="button-container">
            <button class="btn btn-danger">Like (224)</button>
        </div>
        <hr>
        <div class="comments-container">
            <div class="comments-write-box">
                    <h2 id="comments-header">Leave your comment!</h2>
                    <textarea name="" id="comment-write" cols="50" rows="6"></textarea>
                    <div class="comment-btn-box">
                        <button id="comment-btn">Комментировать</button>
                    </div>
                </div>
                <hr>

                <h2>Comments: <span id="comments-count"><?=0;?></span></h2>
				<div class="comment-box">
					<div><img width="30px" src="/img/default.png" alt="avatar"></div>
					<div>
						<p class="comment-info">Tester -> 22.22.2222</p>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio inventore, aliquid omnis voluptatibus tenetur eaque ut saepe ad magni veniam.</p>
					</div>
				</div>	
				<div class="comment-box">
					<div><img width="30px" src="/img/default.png" alt="avatar"></div>
					<div>
						<p class="comment-info">Tester -> 22.22.2222</p>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio inventore, aliquid omnis voluptatibus tenetur eaque ut saepe ad magni veniam.</p>
					</div>
				</div>	
				<div class="comment-box">
					<div><img width="30px" src="/img/default.png" alt="avatar"></div>
					<div>
						<p class="comment-info">Tester -> 22.22.2222</p>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio inventore, aliquid omnis voluptatibus tenetur eaque ut saepe ad magni veniam.</p>
					</div>
				</div>	
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