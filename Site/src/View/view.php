<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../assets/CSS/style.css" />
    <link rel="stylesheet" href="../../assets/CSS/styleQCard.css"/>
    <link rel="stylesheet" href="../../assets/CSS/button.css"/>
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
<main class="w-full h-full">
    <div id="load2">
        <div class="point1"></div>
        <div class="point2"></div>
        <div class="point3"></div>
    </div>
    <p>
        <?php
        foreach ($messageFlash as $type=>$messages){
            foreach ($messages as $message){
                echo "<div class='alert alert-$type'>$message</div>";
            }
        }
        ?>
    </p>
    <?php
        require __DIR__ . "/{$cheminVueBody}";
    ?>
</main>
</body>
</html>
