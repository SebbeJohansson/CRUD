<?php
    /**
     * User: Sebbans.
     * Date: 19/04/2020
     * Time: 12:37
     */

    require_once("classes/db.php");

    $db = new dbClass();


    if(isset($_POST['text'])){
        $text = $_POST['text'];

        $db->input($text);

        unset($_POST);
        header("Location: /");
    }



    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>


<form action="/" method="post">
    <input type="text" name="text"/>
    <input type="submit">
</form>

<?php

    var_dump($db->output());

?>

</body>
</html>