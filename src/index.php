<?php
session_start();

if (!empty($_SESSION['accessToken'])) {
    header("Location: dashboard.php");
} else {
    header("Location: login.php");
}
