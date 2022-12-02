<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/CSS/style.css" />
    <!--
    <link rel="stylesheet" href="../assets/CSS/submit.css">
    -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <title><?php echo $pagetitle; ?></title>
</head>

<body class="w-full h-full">
<header>
    <nav>
        <?php require __DIR__. "/nav.php"; ?>
    </nav>
</header>
<main class="w-full">
    <?php
        require __DIR__ . "/{$cheminVueBody}";
    ?>
</main>
<footer>

</footer>
</body>
</html>
