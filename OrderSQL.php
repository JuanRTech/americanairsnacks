<?php

    if (!empty($_POST['id'])) {
        createOrder($_POST['id']);
        die($_POST['id']);
    }
    else
        die("FUCK");
    function createOrder($ItemID, $Quantity=1, $Seat='3B'){
        include('sqlsetup.php');

        $sql = "INSERT INTO `orders` (`ID`, `Ordered`, `Delivered`, `ItemID`, `Complete`, `Seat`, `Quantity`) VALUES (NULL, CURRENT_TIMESTAMP, NULL, '" . $ItemID . "', '0', '" . $Seat . "','" . $Quantity . "')";
        
        $conn->query($sql);
        $conn->close();

        redirect('menu.php');
    }

    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
?>