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
        <div class="col-12 reviews-container">

        </div>
        <div class="buttons text-center">
            <button id="look-more-btn" class="btn btn-primary">Look more</button>
        </div>
    </div>
</div>

<script>
    window.onload = () => {
        const reviews_container = document.querySelector('.reviews-container');
        const look_more_btn = document.querySelector('#look-more-btn');

        let current_count = 0;
        let total_count = <?=$reviews_count ?? 3?>

        sendRequestJSON('POST', "/api/get/reviews", {'count' : current_count})
            .then(response => {
                current_count = response.count;
                reviews_container.innerHTML += make_reviews_list_profile(response.reviews);
                if(current_count < total_count){
                    look_more_btn.addEventListener('click', () => {
                        sendRequestJSON('POST', "/api/get/reviews", {'count' : current_count})
                            .then(response => {
                                current_count = response.count;
                                reviews_container.innerHTML += make_reviews_list_profile(response.reviews);
                                if(current_count >= total_count){
                                    look_more_btn.style['display'] = 'none';
                                }
                            })
                    })
                }

            })
    }


</script>