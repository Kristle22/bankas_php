<?php use App\Auth\Authorization as A; ?>

<?php if(A::auth()) : ?>

  <li><form class="logout" action="<?= URL ?>logout" method="post">
      <button type="submit">ATSIJUNGTI, <?= A::authName() ?></button>
    </form></li>
</ul> 
<?php else: ?>
  
  <li class="<?= URI[0] == 'login' ? 'active' : '' ?>"><a href="<?= URL ?>login">PRISIJUNGTI</a></li>
</ul>
<?php endif; ?>
