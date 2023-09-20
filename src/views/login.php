<?php require __DIR__.'/top.php'; ?>

      <div class="container">
        <form class="login" action="<?= URL ?>login" method="post">
          <label>Vardas</label>
          <div>
            <input type="text" name="name">
            <small>Įveskite prisijungimo vardą.</small>
          </div>
          <label>El. paštas</label>
          <div>
            <input type="text" name="email">
            <small>Įveskite prisijungimo el. paštą.</small>
          </div>
          <label>Slaptažodis</label>
          <div>
            <input type="password" name="pass">
            <small>Įveskite prisijungimo slaptažodį.</small>
          </div>
          <button type="submit">Prisijungti</button>
        </form>
      </div>
  
<?php require __DIR__.'/bottom.php'; ?>