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
               <th>お名前</th>
               <td><?= $name ;?></td>
           </tr>
           <tr>
               <th>メールアドレス</th>
               <td><?= $email ;?></td>
           </tr>
           <tr>
               <th>件名</th>
               <td><?= $title;?></td>
           </tr>
       </table>
   </div> 
</body>
</html>