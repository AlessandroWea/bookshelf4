function make_users_list(where, users = [])
{
    let users_list = '';

    users.forEach(user => {
        users_list += `
            <a href='${SERVER_PATH}profile/${user.id}'>
                <div class='user-box'>
                    <img class='profile-avatar-img' width='60px' src='${SERVER_PATH}public/imgs/default.png'>
                    <p>${user.username}</p>
                </div>
            </a>
        `;
    });

    where.innerHTML = users_list;
}

function make_comments_list(comments = [])
{
    let comments_list = '';

    comments.forEach(comment => {

        comments_list += `
            <div class='comment-box'>
                <div><img width='30px' src='${SERVER_PATH + 'public/imgs/default.png'}' alt=''></div>
                <div>
                    <p class='comment-info'>${comment.username} -> ${comment.created}</p>
                    <p>${comment.text}</p>
                </div>
            </div>
        `;

    });

    return comments_list;
}


function make_reviews_list(where,reviews = [])
{
    let reviews_list = '';

    reviews.forEach(review => {

        reviews_list += `
            <a href='review/` + review.id + `'>
                <div class="review-box">
                    <p>Reviewer: ` + review.username + ` | Book: ` + review.bookname + ` by ` + review.authorname + `</p>
                    <p>Theme: ` + review.theme + `</p>
                    <p>Date: ` + review.created + `</p>
                </div>
            </a>
        `;

    });

    where.innerHTML = reviews_list;

}

function make_reviews_list_profile(where,reviews = [])
{
    let reviews_list = '';

    reviews.forEach(review => {

        reviews_list += `
            <a href='` + SERVER_PATH + `review/` + review.id + `'>
                <div class="review-box">
                    <p>Book: ` + review.bookname + ` by ` + review.authorname + `</p>
                    <p>Theme: ` + review.theme + `</p>
                    <p>Date: ` + review.created + `</p>
                </div>
            </a>
        `;

    });

    where.innerHTML = reviews_list;

}