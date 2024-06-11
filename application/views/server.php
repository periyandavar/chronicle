<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  require __DIR__.'vendor/autoload.php';

  $options = array(
    'cluster' => 'ap2',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '8ff218ab158535007540',
    '5f01e78e3ce4f18cef4d',
    '750820',
    $options
  );

  $data['message'] = 'hello world';
  $pusher->trigger('my-channel', 'my-event', $data);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Notification Test</title>
</head>
<body>
  <form action="post"></form>
<input type="text" name="msg">
<input type="submit" name="submit">Submit
</body>
</html>