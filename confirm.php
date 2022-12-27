<!-- confirm.php -->
<?php
    session_start();
    if(isset($_SESSION['kinds'])) {
        $kinds = $_SESSION['kinds'];
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $title = $_SESSION['title'];
        $content = $_SESSION['content'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認フォーム</title>
</head>
<body>
   <div>
       <h2>お問い合わせ内容の確認</h2>
       <table>
           <tr>
               <th>お問い合わせ種別</th>
               <td><?= $kinds; ?></td>
           </tr>
           <tr>
               <th>お名前</th>
               <td><?= $name; ?></td>
           </tr>
           <tr>
               <th>メールアドレス</th>
               <td><?= $email; ?></td>
           </tr>
           <tr>
               <th>件名</th>
               <td><?= $title; ?></td>
           </tr>
           <tr>
               <th>内容</th>
               <td><?= nl2br($content); ?></td>
           </tr>
       </table>
       <p>こちらの内容で送信しても良いですか？</p>
       <form action="send.php" method="post">
           <input type="hidden" name="token" value="<?= $token; ?>">
           <button type="submit" value="送信">送信</button>
           <a href="form.php?action=edit">戻る</a>
       </form>
   </div> 
</body>
</html>