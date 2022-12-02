<div class="mt-5">
    <div class="container_QCard">
        <div class="container_section">
            <h4>Scène 1</h4>
            <p><?php echo "$question1"; ?></p>
            </p>
        </div>

        <div class="container_answer">
            <div class="div_answer">
                <a href="index.php?action=jeu&id=r1" class="button"></a>
                <p><?php echo "$reponse1"; ?>
                </p>
            </div>
            <div class="div_answer">
                <a href="index.php?action=jeu&id=r2" class="button"></a>
                <p><?php echo "$reponse2"; ?>
                </p>
            </div>
            <div class="div_answer">
                <a href="index.php?action=jeu&id=r3" class="button"></a>
                <p><?php echo "$reponse3"; ?>
                </p>
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