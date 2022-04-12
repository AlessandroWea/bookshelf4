<?=render('fragments/navbar.php', []);?>

<div class="container">
    <div class="row justify-content-center align-items-center mt-5">
        <div class="col-8">
            <h1 class="text-center">Write what you want!</h1>
            <form method="POST" action="/write">
            <div class="form-group mb-2">
                <label for="bookname_input">Book's title</label>
                <input name="bookname" value="" type="text" class="form-control" id="bookname_input" placeholder="Enter book's title">
                <p class="text-danger"><?=$errors['bookname'][0] ?? ''?></p>
            </div>
            <div class="form-group mb-2">
                <label for="authorname_input">Author's name</label>
                <input name="authorname" type="text" class="form-control" id="authorname_input" placeholder="Enter author's name">
                <p class="text-danger"><?=$errors['authorname'][0] ?? ''?></p>
            </div>
            <div class="form-group mb-2">
                <label for="theme_input">Theme</label>
                <input name="theme" type="text" class="form-control" id="theme_input" placeholder="Enter theme">
                <p class="text-danger" ><?=$errors['theme'][0] ?? ''?></p>
            </div>
            <div class="form-group mb-2">
                <label for="text_input">Text</label>
                <textarea name="text" class="form-control" id="text_input"></textarea>
                <p class="text-danger"><?=$errors['text'][0] ?? ''?></p>
            </div>

            <button type="submit" class="btn btn-primary">Send!</button>
            </form> 
        </div>

    </div>
 
</div>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<script>

let editor = CKEDITOR.replace( 'text_input', {
    uiColor: '#9AB8F3',
    height: 500
});

</script>