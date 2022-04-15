<?=render('fragments/navbar.php', []);?>

<div class="container">
    <div class="row mt-2">
        <div class="col-4">
        <img src="/public/img/default.png" alt="..." class="img-thumbnail">
        <!-- if guest view -->
        <?php if($user['id'] != userId()): ?> 
        <div>
            <a href="#" class="btn btn-primary w-100 mb-1">Follow</a>
        </div>
        <?php else: ?>
            <div>
                <a href="#" class="btn btn-primary w-100 mb-1">Change avatar</a>
                <a href="#" class="btn btn-primary w-100">Edit info</a>
            </div>
        <?php endif ?>

        </div>
        <div class="col-8">
            <h2 class="text-center">Main info</h2>
            <hr>
            <p><span class="h3 m-1">Username:</span><?=$user['username']?></p>
            <p><span class="h3 m-1">Email:</span> <?=$user['email']?></p>
            <hr>
            <p><span class="h4 m-1">Followers count: </span>0</p>
            <p><span class="h4 m-1">Followings count: </span>0</p>
        </div>
    </div>
    <hr>
    <div class="row mt-2 mb-2 text-center">
        <h2>Reviews (<?=$reviews_count?>)</h2>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 reviews-container mb-4">

        </div>
        <div class="buttons text-center mb-3">
            <button id="look-more-btn" class="btn btn-primary">Look more</button>
        </div>
    </div>
</div>

<script>
    window.onload = () => {
        const reviews_container = document.querySelector('.reviews-container');
        const look_more_btn = document.querySelector('#look-more-btn');

        let current_count = 0;
        let user_id = <?=$user['id']?>;
        let total_count = <?=$reviews_count?>;

        if(current_count >= total_count || total_count < 3)
            look_more_btn.style['display'] = 'none';

        sendRequestJSON('POST', "/api/get/reviews", {'count' : current_count, 'user_id' : user_id})
            .then(response => {
                current_count = response.count;
                reviews_container.innerHTML += make_reviews_elements_profile(response.reviews);
                if(current_count < total_count){
                    look_more_btn.addEventListener('click', () => {
                        sendRequestJSON('POST', "/api/get/reviews", {'count' : current_count, 'user_id' : user_id})
                            .then(response => {
                                current_count = response.count;
                                reviews_container.innerHTML += make_reviews_elements_profile(response.reviews);
                                if(current_count >= total_count){
                                    look_more_btn.style['display'] = 'none';
                                }
                            })
                    })
                }

            })
    }


</script>