<?php
session_start();
session_unset();
session_destroy();


// Obs: o cookie só será apagado se o usuário não marcar "lembrar" no próximo login


header('Location: index.php');
exit;