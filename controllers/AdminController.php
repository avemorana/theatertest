<?php

class AdminController
{
    public function actionIndex()
    {
        if (!Admin::checkLogged()) {
            header("Location: login");
        }

        if (isset($_POST["ban"])){
            Admin::mark($_POST["ban"], "ban");
        }
        if (isset($_POST["ok"])){
            Admin::mark($_POST["ok"], "ok");
        }
        if (isset($_POST["edit"])){
            Admin::edit($_POST["edit"], $_POST["new-text"]);
        }

        if (isset($_POST["logout"])){
            Admin::logout();
        }

        $comments = Main::getMessagesForAdmin();
        require_once './views/admin/index.php';
        return true;
    }

    public function actionLogin()
    {
        $error_message = null;
        $checkLogged = Admin::checkLogged();

        if (isset($_POST["inputSubmitAdm"])) {
            $login = htmlspecialchars($_POST["inputLoginAdm"]);
            $password = htmlspecialchars(($_POST["inputPasswordAdm"]));

            if (Admin::checkLogin($login, $password)) {
                Admin::auth();
                header("Location: http://theatertest/admin");
            } else {
                $error_message = "The data entered is incorrect.";
            }
        }

        if (isset($_POST["logout"])){
            Admin::logout();
        }

        require_once './views/admin/login.php';
        return true;

    }
}