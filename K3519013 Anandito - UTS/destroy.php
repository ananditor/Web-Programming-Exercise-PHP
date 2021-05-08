<?php

    setcookie("pemain", null, time() - 3600);
    header("Location: index.php");