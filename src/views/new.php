<?php require __DIR__.'/top.php'; ?>

<h2 class="title">Naujos sąskaitos sukūrimas</h2>

<form action="<?= URL ?>new" method="post" class="new acc">
  <div>
    <label for="">Sąskaitos Nr.</label>
    <input type="text" name="nr" value="<?= $nr ?>" readonly>
  </div>
  <div>
    <label for="">Vardas</label>

    <input type="text" name="name">
    <?php require __DIR__.'/errors.php'; ?>

  </div>
  <div>
    <label for="">Pavardė</label>

    <input type="text" name="surname">
    <?php require __DIR__.'/errors.php'; ?>

  </div>
  <div>
    <label for="">Asmens kodas</label>

    <input type="text" name="id">
    <?php require __DIR__.'/errors.php'; ?>
    
  </div>
  <button type="submit" name="submit">Sukurti sąskaitą</button>
</form>

<?php require __DIR__.'/bottom.php'; ?>