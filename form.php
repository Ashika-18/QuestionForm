<!-- form.php -->
<?php
session_start();

function h($str) {
   return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

if(isset($_POST['submit'])) {

    $kinds = h($_POST['$kinds']);
    $name = h($_POST['name']);
    $email = h($_POST['email']);
    $title = h($_POST['title']);
    $content = h($_POST['content']);

    $errors = [];
}
    if(trim($name) === '' || trim($name) === "") {
        $errors['name'] = "名前を入力して下さい！";
}
    if(trim($title) === '' || trim($title) === " ") {
        $errors['title'] = "タイトルを入力して下さい！";
}
    if(trim($content) === '' || trim($content) === "") {
        $errors['content'] = "内容を入力して下さい！";
}
    if(count($errors) === 0) {
        
        $_SESSION['kinds'] = $kinds;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['title'] = $title;
        $_SESSION['content'] = $content;

        header('Location:https://'.$SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/confirm.php');

    } else {
        echo $errors['name'];
        echo $errors['title'];
        echo $errors['content'];
}
    if(isset($_GET) && $_GET['action'] === 'edit') {
        $kinds = $_SESSION['kinds'];
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $title = $_SESSION['title'];
        $content = $_SESSION['content'];
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録フォーム</title>
    
</head>
<body>
    <form action="form.php" method="post">
        <div>
            <p>お問い合わせ種別</p>
            <input type="radio" name="kinds" value="質問"<?php if(isset($kinds) && $kinds === "質問"){echo "checked";} else {echo "checked";}?>><label>質問</label>
            <input type="radio" name="kinds" value="依頼"<?php if(isset($kinds) && $kinds === "依頼"){echo "checked";}?>><label>依頼</label>
            <input type="radio" name="kinds" value="その他"<?php if(isset($kinds) && $kinds === "その他"){echo "checked";}?>><label>その他</label>
        </div>
        <label for="name" id="name"></label>
        <input type="text" name="name" value="<?php if(isset($name)){echo $name;} ?>" placeholder="お名前" required>

        <label for="email" id="email"></label>
        <input type="email" name="email" value="<?php if(isset($email)){echo $email;} ?>" placeholder="メールアドレス" required>

        <label for="title" id="title"></label>
        <input type="text" name="title" value="<?php if(isset($title)){echo $title;} ?>" placeholder="件名" required>

        <label for="content" id="content"></label>
        <textarea name="content" name="content" rows="7" placeholder="お問い合わせ内容" required><?php if(isset($content)){echo $content;} ?></textdarea>

        <button type="submit" name="submit" value="確認">確認</button>
    </form>
</body>
</html>