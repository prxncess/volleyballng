<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Fira+Mono|Open+Sans:400,700" rel="stylesheet">
</head>
<body style="font-family: 'Open Sans', sans-serif; background-color: #; padding: 40px; color: #5a5a5a">
<h4 style="color: #333333 font-weight: 700">Dear <b>{{$name}},</b></h4>

<div>
    <p> You've successfully created an event at  <a href="http://volleyball.ng" style="color: #4449ca; text-decoration: none"><b>volleyball.ng</b></a>.</p>
    <p>A password has been generated for you to access the <a href="http://volleyball.ng/organizer/Login" style="color: #4449ca; text-decoration: none"><b> Organizer Account</b></a> area.</p>
    <p> After you log in, please fill in the remaining details (location, poster, start date, end date, etc) for this event and click the button to request a review. <br/>
      After your event is reviewed and approved, potential participants will indicate interest and you will be able to approve or deny their requests.</p>
    <p style="">Here's your password: </p>
    <p><span style="font-family: 'Fira Mono', monospace; background-color: #e5e5e5; padding: 10px; border-radius: 4px"><b>{{$password}}</b></span></p>
    <p><i>This password can be changed from your organizer account once you log in.</i></p>

    <p>For enquiries and other issues with your account, please email <b><a href="mailto:hello@volleyball.ng?subject=Enquiry%20or%20issue%20with%20volleyball%20team%20account" style="color: #4449ca; text-decoration: none">hello@volleyball.ng</a></b>.</p>

    <p>Best regards,<br>
        <b>Efe</b></p>

</div>

</body>
</html>
