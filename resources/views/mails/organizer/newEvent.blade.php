<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>
<body style="font-family: 'Open Sans', sans-serif; background-color:#fff; padding: 40px; color: #5a5a5a">
<h4 style="color: #333333; font-weight: 700"><b>Dear administrator,</b></h4>

<div>
  <p> {{$event->organizer->name}} has just created this event titled <i>"{{$event->title}}"</i> and has requested that the event be reviewed for publishing</p>


    <p>To review this request, log in to the <a href="http://volleyball.ng/admin" style="color: #4449ca; text-decoration: none"><b>admin</b></a> area.</p>

    <p>Best regards,<br>
        <b>Volleyball.ng</b></p>

</div>

</body>
</html>