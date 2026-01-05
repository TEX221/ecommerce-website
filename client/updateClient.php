
<div class="tab-pane fade" id="edit-profile">
    <h4 class="text-center my-2 text-primary">Modifier votre profile</h4>

    <form id="edit-profile-form" class="mx-auto my-3 d-flex flex-column row-gap-2" style="max-width: 400px;">
        <input type="hidden" name="role" value="client" />
        <div class="form-floating mb-1">
            <input name="firstName" value="<?= $firstName ?>" type="text" class="form-control" placeholder="Prénom" required />
            <label>Votre prénom</label>
        </div>
        <div class="form-floating mb-1">
            <input name="lastName" value="<?= $lastName ?>" type="text" class="form-control" placeholder="nom" required />
            <label>Votre nom</label>
        </div>
        <div class="form-floating mb-1">
            <input name="tel" value="<?= $tel ?>" type="tel" class="form-control" placeholder="+2215XXXXXXXX" required minlength="13" />
            <label>Votre numéro de téléphone du client</label>
        </div>

        <div class="form-floating mb-1">
            <input name="email" value="<?= $email ?>" type="email" class="form-control" placeholder="Email" required minlength="9" />
            <label>Votre email</label>
        </div>

        <div class="form-floating mb-1">
            <input name="password" type="password" class="form-control" placeholder="Password" required minlength="2" maxlength="256" />
            <label>Mot de passe</label>
        </div>
        <div class="form-floating mb-1">
            <input name="confirmation" type="password" class="form-control" placeholder="Confirmation" required minlength="2" maxlength="256" />
            <label>Confirmation</label>
        </div>
        <p id="message" class="d-none text-center my-0 h6"></p>
        <button class="btn btn-outline-primary w-98 py-2 mx-auto">Modifier</button>
    </form>
</div>