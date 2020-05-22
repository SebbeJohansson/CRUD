<?php
    /**
     * User: Sebbans.
     * Date: 19/04/2020
     * Time: 12:37
     */

    require_once("classes/db.php");

    $db = new dbClass();


    if(isset($_POST['id']) && isset($_POST['text'])){
        $db->update($_POST['text'], $_POST['id']);

        unset($_POST);
        header("Location: /");
    }elseif(isset($_POST['text'])){
        $text = $_POST['text'];

        $db->input($text);

        unset($_POST);
        header("Location: /");
    }elseif(isset($_GET['id'])){
        $db->delete($_GET['id']);


        unset($_GET);
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
</br></br>
<?php

    $texts = $db->output();

    foreach($texts as $text){
        echo "<div> text: ".$text['text'];
        echo "<form action='/' method='post'><input type='text' name='text' value='".$text['text']."'><input type='hidden' name='id' value='".$text['id']."'><input type='submit' value='edit'></form>";
        echo "<a href='/?id=".$text['id']."'>delete</a>";
        echo "</div></br>";
    }

?>

</body>
</html>