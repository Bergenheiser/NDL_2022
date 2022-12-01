<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title><?php echo $pagetitle; ?></title>
</head>

<body>
<header>
    <nav>
        <a href="?action=welcome"> Home </a>
        <a href="?action=honey"> HoneyPot </a>
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
