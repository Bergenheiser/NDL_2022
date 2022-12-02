<link rel="stylesheet" href="/public/CSS/style.css">
<form action="" method="post" class="form-anim">
    <fieldset>
        <progress max="100" value="0">0%</progress>
        <div class="form-group"><label for="pseudo">Pseudo* <span class="err"></span></label> <input type="pseudo"
                                                                                                     id="pseudo">
        </div>
        <div class="form-group"><label for="email">Votre email* <span class="err"></span></label> <input
                    type="email" id="email"></div>

        <div class="form-group">
            <label for="sex">Sexe Biologique <span class="err"></span></label>
            <input type="text" id="sex" list="sexList" autocomplete="off"/>
            <datalist id="sexList">
                <option>Homme</option>
                <option>Femme</option>
            </datalist>
        </div>
        <div class="form-group">
            <label for="genre">Genre <span class="err"></span></label>
            <input type="text" id="genre" list="genreList" autocomplete="off"/>
            <datalist id="genreList">
                <option>Homme</option>
                <option>Femmme</option>
                <option>Femme cisgenre</option>
                <option>Homme cisgenre</option>
                <option>Trans</option>
                <option>Non binaire</option>
            </datalist>
        </div>
        <div class="form-group">
            <label for="attirance">Orientation Sexuelle<span class="err"></span></label>
            <input type="text" id="attirance" list="attiranceList" autocomplete="off"/>
            <datalist id="attiranceList">
                <option>Homo</option>
                <option>Hétéro</option>
                <option>Bi</option>
                <option>Pan</option>
                <option>Inconnue</option>
            </datalist>
        </div>
        <div class="form-group"><input type="submit" disabled></div>

    </fieldset>
</form>
<script src="../../../assets/JS/formSys.js"></script>

