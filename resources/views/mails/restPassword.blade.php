<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Fira+Mono|Open+Sans:400,700" rel="stylesheet">
</head>
<body style="font-family: 'Open Sans', sans-serif; background-color:inherit ; padding: 40px; color: #5a5a5a">
<h4 style="color: #333333; font-weight: 700">Dear team <b>{{$name}}</b>,</h4>

<div>
    <p> Some  of your information on your account at <a href="http://volleyball.ng/team/signIn" style="color: #4449ca; text-decoration: none"><b>volleyball.ng</b></a> Was changed. Here's an updated summary of your details:</p>
    <p style="text-indent: 40px">Team name: <b>{{$name}}</b></p>
    <p style="text-indent: 40px">Phone number: <b>{{$phone}}</b></p>
    <p style="text-indent: 40px">Email: <b>{{$email}}</b></p>
    <p style="text-indent: 40px">Password: <span style="font-family: 'Fira Mono', monospace; background-color: #e5e5e5; padding: 10px; border-radius: 4px"><b>{!! $password==null?'still your old password': '<b>'.$password.'</b>' !!}</b></span></p>

    <p>For enquires and other issues with your account, please email <b><a href="mailto:eorijesu@gmail.com?subject=Enquiry or issue with volleyball team account" style="color: #4449ca; text-decoration: none">eorijesu@gmail.com</a></b>.</p>

    <p>Best regards,<br>
        <b>Volleyball.ng</b></p>

</div>

</body>
</html>
