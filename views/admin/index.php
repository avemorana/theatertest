<!doctype html>
<html lang="en">
<head>
    <?php
    $title = "Admin panel";
    require_once './views/blocks/head.php';
    ?>
</head>
<body>
<? require_once './views/blocks/header.php'; ?>

<div class="container">
    <br>
    <h3>Feedback messages</h3>
    <br>
    <form method="post">
        <div class="form-group row">
            <div class="col-sm-2">
                <input type="submit" class="form-control" name="logout" id="logout" value="Log out">
            </div>
        </div>
    </form>
    <table class="table table-hover">
        <thead>
        <tr>
            <td></td>
            <td><b>sender name</b></td>
            <td><b>sender email</b></td>
            <td><b>message</b></td>
            <td><b>date</b></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <? foreach ($comments as $comment) { ?>
            <tr>
                <form method="post">
                    <td><img src="<?= $comment["img"] ?>" width="100"></td>
                    <td><?= $comment["name"] ?></td>
                    <td><?= $comment["email"] ?></td>
                    <td>
                        <textarea name="new-text" id="new-text"><?= $comment["message"] ?></textarea>
                    </td>
                    <td><?= $comment["date"] ?></td>
                    <td>
                        <button class="btn btn-sm btn-primary" value="<?= $comment["id"] ?>" name="edit">Edit</button>
                        <? if ($comment["admin_mark"] == "0") { ?>
                            <button class="btn btn-sm btn-danger" value="<?= $comment["id"] ?>" name="ban">X</button>
                            <button class="btn btn-sm btn-success" value="<?= $comment["id"] ?>" name="ok">Ok</button>
                        <? } else {
                            echo $comment["admin_mark"];
                        } ?>

                    </td>
                </form>
            </tr>
        <? } ?>
        </tbody>
    </table>
</div>

<? require_once './views/blocks/footer.php'; ?>
</body>
</html>