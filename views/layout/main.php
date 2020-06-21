<?php
    use widgets\Helper;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>CSV service</title>
<?php include 'bootstrap.html';?>
</head>
<body>

<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a href="/"><h3>to-from CSV</h3></a>
    </nav>

   <?= Helper::getFlush();?>

    <?=
        $content;
    ?>

</div>

<?php include 'jQuery.html';?>

<style>
    <?php include 'default.css';?>
</style>

<script>
    <?php include 'default.js';?>
</script>

</body>
</html>