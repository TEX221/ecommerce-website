<div class="tab-pane fade" id="add-produit">
  <h4 class="text-center my-2 text-primary">Ajouter un client</h4>

  <form id="signup-form" class="mx-auto my-3 d-flex flex-column row-gap-2" style="max-width: 400px;">
    <input type="hidden" name="role" value="client" />
    <div class="form-floating mb-1">
      <input name="firstName" type="text" class="form-control" placeholder="Prénom" required />
      <label>Prénom du client</label>
    </div>
    <div class="form-floating mb-1">
      <input name="lastName" type="text" class="form-control" placeholder="nom" required />
      <label>Nom du client</label>
    </div>
    <div class="form-floating mb-1">
      <input name="tel" type="tel" class="form-control" placeholder="+2215XXXXXXXX" required minlength="13" />
      <label>Numéro de téléphone du client</label>
    </div>

    <div class="form-floating mb-1">
      <input name="email" type="email" class="form-control" placeholder="Email" required minlength="9" />
      <label>Email du client</label>
    </div>

    <div class="form-floating mb-1">
      <input name="password" type="password" class="form-control" placeholder="Password" required minlength="2" maxlength="256" />
      <label>Mot de passe du client</label>
    </div>
    <div class="form-floating mb-1">
      <input name="confirmation" type="password" class="form-control" placeholder="Confirmation" required minlength="2" maxlength="256" />
      <label>Confirmation du mot de passe</label>
    </div>
    <p id="signup-error" class="d-none text-center my-0 h6 text-danger"></p>
    <button class="btn btn-outline-primary w-98 py-2 mx-auto">S'inscrire</button>
  </form>
</div>