<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Fira+Mono|Open+Sans:400,700" rel="stylesheet">
</head>
<body style="font-family: 'Open Sans', sans-serif; background-color: #; padding: 40px; color: #5a5a5a">
<h4 style="color: #333333 font-weight: 700">Hello <b> team{{$name}},</b></h4>

<div>
    <p>The event titled:<b>{{$event->title}}</b> on <a href="http://volleyball.ng" style="color: #4449ca; text-decoration: none"><b>volleyball.ng</b></a>
        Was just concluded and the winners declared.
    </p>
    <p>
       If you missed this event here are the <a href="#">highlights</a>  of the event.
    </p>

    <p>For further  enquires  about this event, please email <b><a href="{{$event->organizer[0]->email}}?subject=Enquiry about {{$event->title}}" style="color: #4449ca; text-decoration: none">{{$event->organizer[0]->email}}</a></b>.</p>

    <p>Best regards,<br>
        <b>Efe</b></p>

</div>

</body>
</html>
