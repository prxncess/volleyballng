<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Congratulation team <b><i><?php echo e($name); ?></i></b></h2>

<div>
    We are pleased to inform you that your account at <a href="http://volleyball.ng">Volleyball.ng</a> was successfully created.
    <p>A default password has been generated for you to login to the <a href="http://volleyball.ng/team/signIn">Team Admin</a> , Where you can manage your team in genera. </p>
    <p>Password:<?php echo e($password); ?></p>
    <p><i>This password can be changed from the team admin area once you login</i></p>

    <p>For enquires and issues with Account login please contact:<?php echo e('eorijesu@gmail.com'); ?> </p>

    <p>Best regards</p>
    <p><b>Ori-Jesu Efeoghene</b></p>

</div>

</body>
</html>