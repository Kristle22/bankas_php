<div class="errBox">
      <?php if (!empty($errors)) : ?>

      <?php foreach($errors as $error): ?>
        <p class="error"><?= $error['err'] ?></p>
      <?php endforeach; ?>
      
      <?php endif; ?>
</div>