<form action="" method="post" class="form-anim">
    <fieldset>
        <progress max="100" value="0">0%</progress>
        <div class="form-group"><label for="pseudo">Pseudo*</label> <input type="pseudo" id="pseudo"></div>
        <div class="form-group"><label for="email">Votre email*</label> <input type="email" id="email"></div>

        <div class="form-group">
            <label for="sex">Sexe</label>
            <input type="text" id="sex" list="sexList" autocomplete="off"/>
            <datalist id="sexList">
                <option>Homme</option>
                <option>Femmme</option>
            </datalist>
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text"id="genre" list="genreList" autocomplete="off"/>
            <datalist id="genreList">
                <option>Homme</option>
                <option>Femmme</option>
                <option>Femme cisgenre</option>
                <option>Homme cisgenre</option>
                <option>Trans AFAM ( assigné femme à la naissance )</option>
                <option>Trans AMAB ( assigné homme à la naissance )</option>
                <option>Non binaire</option>
            </datalist>
        </div>
        <div class="form-group">
            <label for="attirance">Attirance</label>
            <input type="text"id="attirance" list="attiranceList" autocomplete="off"/>
            <datalist id="attiranceList">
                <option>Homosexuel</option>
                <option>Hétérosexuel</option>
                <option>Bisexuelle</option>
                <option>Pansexuel</option>
            </datalist>
        </div>
        <div class="form-group"><input type="submit" disabled></div>

    </fieldset>
</form>
<script src="/public/JS/formSys.js"></script>