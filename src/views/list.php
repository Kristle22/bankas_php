<?php require __DIR__.'/top.php'; ?>

<h2 class="title">VISOS SĄSKAITOS</h2>
<ul class="row">
        <li>Sąskaitos Nr.</li>
        <li>Vardas</li>
        <li>Pavardė</li>
        <li>Asmens kodas</li>
        <li>Likutis</li>
        <!-- <li>Sukūrimo data/li> -->
      </ul>
<?php foreach ($data as $acc): ?>
  <div class="list">
    <div class="row">
      <ul class="cap">
        <li><?= $acc['Nr'] ?></li>
        <li><?= $acc['vardas'] ?></li>
        <li><?= $acc['pavarde'] ?></li>
        <li><?= $acc['AK'] ?></li>
        <li><?= $acc['likutis'] ?> EUR</li>
        <!-- <li><?= $acc['time'] ?></li> -->
      </ul>
      <div class="links">
        <form action="<?= URL ?>add" method="get">
          <a href="<?= URL ?>add/<?= $acc['id'] ?>">Pridėti lėšų</a>
        </form>
        <form action="<?= URL ?>charge" method="get">
          <a href="<?= URL ?>charge/<?= $acc['id'] ?>">Nuskaičiuoti lėšas</a>
        </form>
        <form action="<?= URL ?>delete/<?= $acc['id'] ?>" method="post">
          <button type="submit">Ištrinti</button>
        </form>
      </div>
    </div>
  </div>

<?php endforeach; ?>
<?php require __DIR__.'/bottom.php'; ?>