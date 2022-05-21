<?php

if (empty($active)) {
  $active = "";
}

?>

<nav>
  <ul class="mobile">
    <li>
      <a href="/home" class="button
      <?php if ($active == "home") {
        echo "active";
      } ?>
      ">
        <i class=" fa-solid fa-house"></i>
      </a>
    </li>
    <li>
      <a href="/memberlist" class="button
      <?php if ($active == "memberlist") {
        echo "active";
      } ?>
      ">
        <i class="fa-solid fa-users"></i>
      </a>
    </li>
    <li>
      <a href="chat" class="button
      <?php if ($active == "chat") {
        echo "active";
      } ?>
      ">
      </a>
    </li>
    <li>
      <a href="/events" class="button
      <?php if ($active == "events") {
        echo "active";
      } ?>
      ">
        <i class="fa-solid fa-calendar"></i>
      </a>
    </li>
    <li>
      <a href="/profile" class="button
      <?php if ($active == "profile") {
        echo "active";
      } ?>
      ">
        <i class="fa-solid fa-user"></i>
      </a>
    </li>
  </ul>
</nav>

<footer class="nav-safety-margin-top">
</footer>