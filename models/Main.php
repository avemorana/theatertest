<?php

class Main
{
    public static function sendMessageToDB($name, $email, $message, $img_route)
    {
        $db = Database::getConnection();
        $sql = 'INSERT INTO messages (name, email, message, date, img) 
                                  VALUES (:name, :email, :message, :date, :img)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':message', $message, PDO::PARAM_STR);
        $result->bindValue(':date', date('Y-m-d H:i:s'), PDO::PARAM_STR);
        $result->bindParam(':img', $img_route, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getMessages($keysort = 0)
    {
        $db = Database::getConnection();
        switch ($keysort) {
            case 1:
                $sql = 'SELECT * FROM messages WHERE admin_mark = :mark ORDER BY name ASC';
                break;
            case 2:
                $sql = 'SELECT * FROM messages WHERE admin_mark = :mark ORDER BY email ASC ';
                break;
            default:
                $sql = 'SELECT * FROM messages WHERE admin_mark = :mark ORDER BY date DESC';
                break;
        }
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->bindValue(':mark', 'ok', PDO::PARAM_STR);
        $result->execute();
        return $result->fetchAll();
    }

    public static function getMessagesForAdmin()
    {
        $db = Database::getConnection();
        $sql = 'SELECT * FROM messages ORDER BY date DESC';
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetchAll();
    }
}