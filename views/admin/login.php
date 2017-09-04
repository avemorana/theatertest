<!doctype html>
<html lang="en">
<head>
    <?php
    $title = "Admin login";
    require_once './views/blocks/head.php';
    ?>
</head>
<body>
<? require_once './views/blocks/header.php'; ?>

<div class="container">
    <br>
    <? if ($checkLogged) { ?>
        <h1>Hello, Administrator</h1>
        <form method="post">
        <div class="form-group row">
            <div class="col-sm-2">
                <input type="submit" class="form-control" name="logout" id="logout" value="Log out">
            </div>
        </div>
        </form>
    <? } else { ?>
        <h1>Log in for admin</h1><br>
        <form method="post">
            <div class="form-group row">
                <label for="inputLoginAdm" class="col-sm-2 form-control-label">Login</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="inputLoginAdm" id="inputLoginAdm" placeholder="Login">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPasswordAdm" class="col-sm-2 form-control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="inputPasswordAdm" id="inputPasswordAdm"
                           placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                    <input type="submit" class="form-control" name="inputSubmitAdm" id="inputSubmitAdm" value="Log in">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <span><?= $error_message ?></span>
                </div>
            </div>
        </form>
    <? } ?>
</div>


<? require_once './views/blocks/footer.php'; ?>
</body>
</html>