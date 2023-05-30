<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Open AI</title>
  <link rel="stylesheet" href="chatgpt.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="main.js"></script>
</head>
<body>
<div class='container-fluid' ng-cloak ng-app="chatApp">
  <div class='chatbox' ng-controller="MessageCtrl as chatMessage">
 <?php  require_once('conn.php');
 $datas = $mysqli->query("SELECT * FROM questions ");
 foreach ($datas as $data):
 ?>
  
    <div class="chatbox__messages" ng-repeat="message in messages">
      <div class="chatbox__messages__user-message">
        <div class="chatbox__messages__user-message--ind-message">
          <p class="name">User</p>
          <br/>
          <p class="message"><?=$data['texts']?></p>
        </div>
      </div>
    </div>
    <div class="chatbox__messages" ng-repeat="message in messages">
      <div class="chatbox__messages__user-message">
        <div class="chatbox__messages__user-message--ind-message">
          <p class="name">Open AI</p>
          <br/>
          <p class="message"><?=$data['answer']?></p>
        </div>
      </div>
    </div>
<?php endforeach ?>
  </div>
    <div class="formbox">
    <form method="POST" action="chatapi.php">
      <p><input type="text" name="text" required placeholder="Enter your message">  
      <button type="submit" class="btn btn-defult">SEND</i></button></p>
    </form>
  </div>

</body>
</html>