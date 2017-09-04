<?php


class Admin
{
    public static $login = "admin";
    public static $password = "123";

    public static function checkLogin($login, $password)
    {
        if ($login == self::$login and $password == self::$password) {
            return true;
        }
        return false;
    }

    public static function auth()
    {
        $_SESSION["admin"] = true;
    }

    public static function checkLogged()
    {
        session_start();
        if (isset($_SESSION["admin"])) {
            return true;
        }
        return false;
    }

    public static function logout()
    {
        unset($_SESSION["admin"]);
        header("Location: /");
    }

    public static function mark($id, $mark)
    {
        $db = Database::getConnection();
        $sql = 'UPDATE messages SET admin_mark = :mark WHERE id = :id';
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':mark', $mark, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function edit($id, $text)
    {
        $db = Database::getConnection();
        $sql = 'UPDATE messages SET changed = :changed, message = :message WHERE id = :id';
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindValue(':changed', 1, PDO::PARAM_STR);
        $result->bindParam(':message', $text, PDO::PARAM_STR);

        return $result->execute();
    }


}