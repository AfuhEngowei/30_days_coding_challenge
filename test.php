<?php

    session_start();
    $data = array();
    if(isset($_SESSION['data'])) {
        $data = $_SESSION['data'];
    }
    if(isset($_POST['name']) && isset($_POST['age'])) {
        // -- append to the array
        $data[] = array('name'=>$_POST['name'],'age'=>$_POST['age'],);

        // -- update the session
        $_SESSION['data'] = $data;
    }
?>
<!DOCTYPE html>
<html>
 <head>
 </head>
 <body>
    <form action="" method="post">
      Name:<br />
      <input type="text" name="name" size="10" /><br />
      Age:<br />
      <input type="text" name="age" size="2" /><br />
      <br />
        <input type="submit" />
    </form>
    <?php
     foreach($data as $d) { ?>
        - <?php echo $d['name']; ?><br />
        - <?php echo $d['age']; ?><br /><br />
    <?php } ?>
 </body>
</html>