<?=render('fragments/navbar.php', []);?>

<div class="container">
    <div class="row mt-2">
        <div class="col-4">
        <img src="/public/img/default.png" alt="..." class="img-thumbnail">
        <div>
            <a href="#" class="btn btn-primary w-100 mb-1">Change avatar</a>
            <a href="#" class="btn btn-primary w-100">Edit info</a>
        </div>

        </div>
        <div class="col-8">
            <h2 class="text-center">Main info</h2>
            <hr>
            <p><span class="h3 m-1">Username:</span>Tester</p>
            <p><span class="h3 m-1">Email:</span> test@test.ru</p>
        </div>
    </div>
    <hr>
    <div class="row mt-2 mb-2 text-center">
        <h2>Reviews (N)</h2>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 reviews-container">
            <a href="">
                <div class="review-box">
                    <p>Reviewer: Tester | Book: Some book by SOme author</p>
                    <p>Theme: theme</p>
                    <p>Date: 22.22.2222</p>
                </div>
            </a>
            <a href="">
                <div class="review-box">
                    <p>Reviewer: Tester | Book: Some book by SOme author</p>
                    <p>Theme: theme</p>
                    <p>Date: 22.22.2222</p>
                </div>
            </a>
            <a href="">
                <div class="review-box">
                    <p>Reviewer: Tester | Book: Some book by SOme author</p>
                    <p>Theme: theme</p>
                    <p>Date: 22.22.2222</p>
                </div>
            </a>
            <a href="">
                <div class="review-box">
                    <p>Reviewer: Tester | Book: Some book by SOme author</p>
                    <p>Theme: theme</p>
                    <p>Date: 22.22.2222</p>
                </div>
            </a>
        </div>
    </div>
</div>