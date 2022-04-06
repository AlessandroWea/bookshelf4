<h1>HOME PAGE</h1>
<h2>Name: <?=$name ? $name : 'anon' ?></h2>
<h2>Lastname: <?=$lastname?></h2>

<?php foreach($users as $user): ?>
    <p>ID: <?=$user['id']?></p>
    <p>Username: <?=$user['username']?></p>
    <br>
<?php endforeach ?>