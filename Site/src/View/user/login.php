<form action="index.php?action=logined" method="post" class="form-anim">
    <fieldset class="field-completed">
        <legend><h3>Se connecter </h3></legend>
        <progress max="100" value="0">0%</progress>
        <div class="form-group">
            <label for="login_id">Login</label>
            <input type="text" name="login" id="login_id" required/>
        </div>
        <div class="form-group">
            <label for="mdp_id">Mot de passe</label>
            <input type="password" name="mdp" id="mdp_id" required/>
        </div>
        <div class="form-group">
            <input type="submit" value="se connecter" disabled/>
        </div>
    </fieldset>
</form>
<script src="/public/JS/formSys.js"></script>