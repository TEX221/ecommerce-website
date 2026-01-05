<div class="tab-pane fade show active" id="liste-client">

  <h4 class="text-center my-2">Liste client</h4>
  <table class="table text-center">
    <thead>
      <tr>
        <th class="h3 text-primary">#</th>
        <th class="text-primary">Prénom</th>
        <th class="text-primary">Nom</th>
        <th class="text-primary">email</th>
        <th class="text-primary">tel</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 0 ?>
      <?php foreach ($clients as $client): ?>
        <tr>
          <td class="h3 text-success"><?= ++$i  ?></td>
          <td><?= $client['firstName'] ?></td>
          <td><?= $client['lastName'] ?></td>
          <td><?= $client['email'] ?></td>
          <td><?= $client['tel'] ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td class="h5" colspan="4">Nombre de clients</td>
        <td class="h5"><?= $i ?></td>
      </tr>
    </tfoot>
  </table>
</div>