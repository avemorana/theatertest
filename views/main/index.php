<!doctype html>
<html lang="en">
<head>
    <?php
    $title = "Theater test";
    require_once './views/blocks/head.php';
    ?>
</head>
<body>
<? require_once './views/blocks/header.php'; ?>

<div class="container">
    <br>
    <? if ($error) { ?>
        <span class="alert-warning">Entered data has an error.</span>
    <? } ?>
    <hr>

    <div>
        <form method="post" name="sort">
            <h6>Sort by:</h6>
            <div class="btn-group btn-group-sm" role="group">
                <? switch ($sort) {
                    case 1: ?>
                        <button type="submit" name="sort-date" class="btn btn-secondary">date</button>
                        <button type="submit" name="sort-name" class="btn btn-primary">author`s name
                        </button>
                        <button type="submit" name="sort-email" class="btn btn-secondary">author`s email</button>
                        <?
                        break;
                    case 2: ?>
                        <button type="submit" name="sort-date" class="btn btn-secondary">date</button>
                        <button type="submit" name="sort-name" class="btn btn-secondary">author`s name</button>
                        <button type="submit" name="sort-email" class="btn btn-primary">author`s email
                        </button>
                        <?
                        break;
                    default:
                        ?>
                        <button type="submit" name="sort-date" class="btn btn-primary">date</button>
                        <button type="submit" name="sort-name" class="btn btn-secondary">author`s name</button>
                        <button type="submit" name="sort-email" class="btn btn-secondary">author`s email</button>
                        <?
                        break;
                }
                ?>
            </div>
            <br>
            <br>
        </form>
    </div>

    <ul class="list-group">
        <? foreach ($comments as $comment) { ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-2">
                        <img src="<?= $comment["img"] ?>" width="100">
                    </div>
                    <div class="col-sm-10">
                        <strong><?= $comment["name"] ?></strong>
                        <span><?= $comment["email"] ?></span>
                        <? if ($comment["changed"] == 1) { ?>
                            <span class="alert-success">Changed by admin</span>
                        <? } ?>
                        <br>
                        <span><?= $comment["message"] ?></span>
                        <br>
                        <i><?= $comment["date"] ?></i>
                    </div>
                </div>
            </li>
        <? } ?>
        <li class="list-group-item preview-comment">

            <strong id="preview-name"></strong>
            <span id="preview-email"></span>
            <br>
            <span id="preview-message"></span>
            <br>
            <i id="preview-date"></i>
        </li>
    </ul>
    <input type="button" id="back-button" class="btn btn-success preview-comment" value="Back">


    <hr>

    <div class="message-form">
        <form name="messageForm" enctype="multipart/form-data" method="post" class="form-control">
            <label for="name">Name:</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name..." required>
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email..." required>
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" placeholder="Enter your message..."
                      required></textarea>
            <label for="picture">Picture:</label>
            <input type="file" class="form-control-file" id="picture" name="picture">
            <br>
            <input class="btn btn-primary" type="submit" id="send" name="send" value="Send">
            <input class="btn btn-success" type="button" id="preview" name="preview" value="Preview">
        </form>
    </div>

</div>

<? require_once './views/blocks/footer.php'; ?>
<script src="/template/js/preview.js"></script>
</body>
</html>