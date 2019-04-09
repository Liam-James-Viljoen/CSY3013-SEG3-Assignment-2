<?php
  $pdo = new PDO('mysql:dbname=fothebyDatabase;host=127.0.0.1', 'student', 'student', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE =>  PDO::FETCH_ASSOC]);
