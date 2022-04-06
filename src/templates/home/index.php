<?=render('fragments/navbar.php', []);?>
<div class="container">
    <div class="header">
        <h1>Latest reviews</h1>
    </div>
    <div class="reviews-container">
        <a href="review/1">
            <div class="review-box">
                <p>Reviewer: Tester | Book: 'Some days of days' by Some Author</p>
                <p>Theme: You may like this trash!</p>
                <p>Date: 22.22.2222</p>
            </div>
        </a>
        <a href="">
            <div class="review-box">
                <p>Reviewer: Tester | Book: 'Some days of days' by Some Author</p>
                <p>Theme: You may like this trash!</p>
                <p>Date: 22.22.2222</p>
            </div>
        </a>
        <a href="">
            <div class="review-box">
                <p>Reviewer: Tester | Book: 'Some days of days' by Some Author</p>
                <p>Theme: You may like this trash!</p>
                <p>Date: 22.22.2222</p>
            </div>
        </a>
        <a href="">
            <div class="review-box">
                <p>Reviewer: Tester | Book: 'Some days of days' by Some Author</p>
                <p>Theme: You may like this trash!</p>
                <p>Date: 22.22.2222</p>
            </div>
        </a>
    </div>

    <div class="look-more-btn-box">
        <button id="look-more-btn" type="button" class="btn btn-primary">Look more</button>
    </div>

</div>

<style>
.header {
    margin-top: 10px;
    margin-bottom: 10px;
    text-align: center;
}
.reviews-container a {
    text-decoration: none;
    color: inherit;
    /* line-height: normal; */
}

.reviews-container p {
    margin-bottom: 5px;
}
.review-box {
	background-color: #bbb;
	margin: 10px;
	padding: 5px;
	border: 1px solid #888;
	border-radius: 10px;
}

.review-box:hover {
	opacity: 0.7;
	cursor:  pointer;
}

.look-more-btn-box {
    text-align: center;
}

</style>

<script>

</script>