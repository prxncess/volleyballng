<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Fira+Mono|Open+Sans:400,700" rel="stylesheet">
</head>
<body style="font-family: 'Open Sans', sans-serif; background-color: inherit; padding: 40px; color: #5a5a5a">
<h4 style="color: #333333; font-weight: 700">Hi <b>Admin,</b></h4>

<div>
    <p> A new team has just signed up and below is a summary of their details</p>
    <p>Brief team summary </p>
    <p style="text-indent: 40px">Team name: <b>{{$team->name}}</b></p>
    <p style="text-indent: 40px">Contact person: <b>{{$team->contact_person}}</b></p>
    <p style="text-indent: 40px">Phone number: <b>{{$team->phone}}</b></p>
    <p style="text-indent: 40px">Email: <b>{{$team->contact}}</b></p>
    <p style="text-indent: 40px">Password: <span style="font-family: 'Fira Mono', monospace; background-color: #e5e5e5; padding: 10px; border-radius: 4px"><b>{!! $password !!}</b></span></p>


    <p>Best regards,<br>
        <b>Efe</b></p>

</div>

</body>
</html>
