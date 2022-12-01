<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/CSS/style.css" />
    <!--
    <link rel="stylesheet" href="../assets/CSS/submit.css">
    -->

    <title><?php echo $pagetitle; ?></title>
</head>

<body>
<header>
    <nav>
        <a href="index.php?action=welcome"> Home </a>
        <a href="index.php?action=honey"> HoneyPot </a>
        <a href="index.php?action=formSubmit"> Form </a>
    </nav>
</header>
<main>
    <?php
        require __DIR__ . "/{$cheminVueBody}";
    ?>
</main>
<footer>

</footer>
</body>
</html>
