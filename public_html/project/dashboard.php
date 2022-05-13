<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Your Account</h1>
<ul class="nav flex-column bg-dark">
<?php if (is_logged_in()) : ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo get_url('create_account.php'); ?>">Create Account</a>
  </li>
  <?php endif; ?>
  <?php if (is_logged_in()) : ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo get_url('accounts_list.php'); ?>">My Accounts</a>
  </li>
  <?php endif; ?>
  <?php if (is_logged_in()) : ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo get_url('deposit.php'); ?>">Deposit</a>
  </li>
  <?php endif; ?>
  <?php if (is_logged_in()) : ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo get_url('withdraw.php'); ?>">Withdraw</a>
  </li>
  <?php endif; ?>
  <?php if (is_logged_in()) : ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo get_url('transaction_history.php'); ?>">History</a>
  </li>
  <?php endif; ?>
  <?php if (is_logged_in()) : ?>
  <li class="nav-item">
    <a class="nav-link" href="#">Transfer</a>
  </li>
  <?php endif; ?>
  <?php if (is_logged_in()) : ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo get_url('profile.php'); ?>">Profile</a>
  </li>
  <?php endif; ?>
</ul>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>