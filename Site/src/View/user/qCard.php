<?php
    if (isset($_GET['lvl'])) {
        $lvl = $_GET['lvl'];
    } else {
        header("Location: index.php?action=qCard&lvl=1");
    }

?>

<div class="mt-5">
    <div class="container_QCard">
        <div class="container_section">
            <h4>Scène <?php echo $lvl;?></h4>
            <p><?php echo $question1->get('texteQuestion'); ?></p>
            </p>
        </div>

        <div class="container_answer">
            <div class="div_answer">
                <a href="index.php?action=qCard&lvl=<?php echo $lvl;?>&confirm&id=<?php echo $reponse1->get('idReponse'); ?>" class="button">
                <p><?php echo $reponse1->get('texteReponse'); ?>
                </p>
                </a>
            </div>

            <div class="div_answer">
                <a href="index.php?action=qCard&lvl=<?php echo $lvl;?>&confirm&id=<?php echo $reponse2->get('idReponse'); ?>" class="button">
                <p><?php echo $reponse2->get('texteReponse'); ?>
                </p>
                </a>
            </div>
            <div class="div_answer">
                <a href="index.php?action=qCard&confirm&lvl=<?php echo $lvl;?>&id=<?php echo $reponse3->get('idReponse'); ?>" class="button">
                <p><?php echo $reponse3->get('texteReponse'); ?>
                </p>
                </a>
            </div>
            <script>
                const loader2 = document.getElementById("load2");

                document.addEventListener('DOMContentLoaded', () => {

                    loader2.style.display = "flex";
                    setTimeout(function () {
                        loader2.style.display = "none";
                    }, 1000);

                });
            </script>
        </div>
    </div>
</div>