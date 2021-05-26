<?php
session_start();

session_destroy();

echo "<script>alert('Anda telah logout');</script>";
echo "<script>location='index.php'</script>";