<?php require __DIR__.'/top.php'; ?>
<link rel="stylesheet" href="../../public/css/app.css">

<h2 class="title">Nuskaičiuoti lėšas</h2>

    <div>
      <h1 class="title"><?= $acc['Nr'] ?></h1>
    </div>
    
  <form action="<?= URL ?>charge/<?= $acc['id'] ?>" method="post" class="new">
      
    <div>
      <label for="">Gavėjo vardas</label>
      <input type="text" name="name" value="<?= $acc['vardas'] ?>">
    </div>
    
    <div>
      <label for="">Gavėjo pavardė</label>
      <input type="text" name="surname" value="<?= $acc['pavarde'] ?>">
    </div>
    
    <div>
      <label for="">Sąskaitos nr.</label>
      <input type="text" name="nr" value="<?= $acc['Nr'] ?>">
    </div>

  <div class="sum">
    <input type="text" name="minus" placeholder="Suma">
    <span>Sąskaitos likutis: <?= $acc['likutis'] ?> EUR</span>
  </div>
  
  <button class="transfer" type="submit">Pervesti</button>
</form>

<?php require __DIR__.'/bottom.php'; 
// Dropdown option list
?>
<!-- <select name="name">
  <option value="none"></option>
  <?php foreach($data as $acc) : ?>
    <?php if ($acc['AK'] != $_GET['id']) : ?>
      <option value="<?= $acc['vardas'] ?>"><?= $acc['vardas'] ?></option>
      <?php endif; ?>
      <?php endforeach; ?>
    </select> -->
    

