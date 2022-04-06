<?=render('fragments/navbar.php', []);?>

<div class="container">
    <div class="row">
        <div class="header">
            <h1>'Some book' by Some Author</h1>
        </div>
        <div class="info">
            <p>Reviewer: <a id="reviewer-username" href="/profile/1">Tester</a></p>
            <p>Theme: You may like this trash!</p>
        </div>
        <hr>
        <div class="text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, dolores tenetur vero deserunt velit quae, illo eius sit reprehenderit laborum earum nostrum nobis distinctio quas, mollitia quam vitae blanditiis ex! Eos eligendi quidem fuga similique hic minus. Aperiam soluta veniam incidunt quis natus doloribus sit alias labore veritatis, nesciunt dolorum. Officiis iste numquam placeat velit amet. Dolore temporibus blanditiis perferendis debitis at laboriosam accusamus dolores illum quaerat, ipsa nostrum! Tempore, magnam iure veritatis quibusdam fugiat vero iste aperiam consectetur quaerat corrupti recusandae ab reiciendis quam, quia sapiente ipsum! Obcaecati minus modi ea illum sunt praesentium neque accusantium beatae vel natus?
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

                <h2>Comments: <span id="comments-count"><?=$comments_count;?></span></h2>
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