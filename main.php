<?php
ob_start();
session_start();
var_dump($_SESSION['wizard']);
ob_end_flush();
