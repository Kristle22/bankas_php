<?php require __DIR__.'/top.php'; ?>
<?php use Bankas\Db\Validations as V; ?>

<h2 class="title">Naujos sąskaitos sukūrimas</h2>

<form action="<?= URL ?>new" method="post" class="new acc">
  <div>
    <label for="">Sąskaitos Nr.</label>
    <input type="text" name="nr" value="<?= $nr ?>" readonly>
  </div>
  <div>
    <label for="">Vardas</label>

    <input type="text" name="name">
      <?php if(V::checkType('no_name', 'name_len')): ?>
        <?php require __DIR__.'/errors.php'; ?>
      <?php endif; ?>

  </div>
  <div>
    <label for="">Pavardė</label>

    <input type="text" name="surname">
    <?php if(V::checkType('no_surname', 'surname_len')): ?>
      <?php require __DIR__.'/errors.php'; ?>
    <?php endif; ?>

  </div>
  <div>
    <label for="">Asmens kodas</label>

    <input type="text" name="id">
    <?php if(V::checkType('no_id', 'id_len', 'id_unique')): ?>
        <?php require __DIR__.'/errors.php'; ?>
      <?php endif; ?>
    
  </div>
  <button type="submit" name="submit">Sukurti sąskaitą</button>
</form>

<?php require __DIR__.'/bottom.php'; ?>