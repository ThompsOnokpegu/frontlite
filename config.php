<?php

/**
  * Configuration for database connection
  *
  */

  $host       = "localhost";
  $username   = "laztntmy_frontli";
  $password   = "blyGf=R]nd2X";
  $dbname     = "laztntmy_frontlite";
  $dsn        = "mysql:host=$host;dbname=$dbname";
  $options    = array(
                  PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
                );
//PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION