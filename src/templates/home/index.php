<?=render('fragments/navbar.php', []);?>
<div class="container">
    <div class="header">
        <h1>Latest reviews</h1>
    </div>
    <div class="reviews-container">
        <?php foreach($reviews as $review): ?>
            <a href="review/<?=$review['id']?>">
                <div class="review-box">
                    <p>Reviewer: <?=$review['username']?> | Book: <?=$review['bookname']?> by <?=$review['authorname']?></p>
                    <p>Theme: <?=$review['theme']?></p>
                    <p>Date: <?=$review['created']?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="look-more-btn-box">
        <a href="/?page=<?=$page-1?>" id="prev-btn"  type="button" class="btn btn-primary <?=($page == 1) ? 'disabled' : ''?>">Prev</a>
        <a href="/?page=<?=$page+1?>" id="next-btn"  type="button" class="btn btn-primary <?=($page == $last_page) ? 'disabled' : ''?>">Next</a>
    </div>

</div>

<link rel="stylesheet" href="public/css/home/index.css">

<script>

</script>