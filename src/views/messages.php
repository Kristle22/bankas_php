<?php if(!empty($messages)) : ?>

<div>
  <?php foreach($messages as $msg) : ?>
    <div class="<?= $msg['type'] ?>"><?= $msg['msg'] ?></div>
  <?php endforeach ?>
</div>

<?php endif ?>