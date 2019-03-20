<?php

require_once '../../model/log.model.php';
unset($_SESSION['user_id']);
unset($_SESSION['user']);
session_destroy();
header('location:../../index.php?success_logout');
