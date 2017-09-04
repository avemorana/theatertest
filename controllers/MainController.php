<?php

class MainController
{
    public function actionMain()
    {
        $error = false;
        $error_message = '';

        if (isset($_POST["send"])) {
            $types = array('image/gif', 'image/png', 'image/jpeg');
            $path = "uploads/";

            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $message = htmlspecialchars($_POST["message"]);

            if (!in_array($_FILES['picture']['type'], $types)) {
                $error_message .= "Your image has a bad format.<br>";
                $error = true;
            }

            if (!$error and move_uploaded_file($_FILES['picture']['tmp_name'],
                    sprintf('./uploads/%s', $_FILES['picture']['name']))
            ) {
                $img_route = "/uploads/" . $_FILES['picture']['name'];
                Main::sendMessageToDB($name, $email, $message, $img_route);
            }
        }


        if (isset($_POST["sort-name"])) {
            $comments = Main::getMessages(1);
            $sort = 1;
        } elseif (isset($_POST["sort-email"])) {
            $comments = Main::getMessages(2);
            $sort = 2;
        } else {
            $comments = Main::getMessages();
            $sort = 0;
        }
        require_once './views/main/index.php';
        return true;
    }
}