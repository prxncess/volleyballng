<!DOCTYPE html>
<html lang="en-US">
  <head>
      <meta charset="utf-8">
      <link href="https://fonts.googleapis.com/css?family=Fira+Mono|Open+Sans:400,700" rel="stylesheet">
  </head>
  <body style="font-family: 'Open Sans', sans-serif; background-color:inherit ; color: #5a5a5a">
  <h4 style="color: #333333; font-weight: 700">Dear <b>{{$name}}</b>,</h4>

  <div>
      <p>Some information on your team account at <a href="http://volleyball.ng/team/signIn" style="color: #4449ca; text-decoration: none"><b>volleyball.ng</b></a> was changed. Here's an updated summary of your details:</p>
      <p style="text-indent: 40px">Team: <b>{{$team}}</b></p>
      <p style="text-indent: 40px">Contact person: <b>{{$name}}</b></p>
      <p style="text-indent: 40px">Phone number: <b>{{$phone}}</b></p>
      <p style="text-indent: 40px">Email: <b>{{$email}}</b></p>
      <p style="text-indent: 40px">Password: <span style="font-family: 'Fira Mono', monospace; background-color: #e5e5e5; padding: 10px; border-radius: 4px"><b>{!! $password==null?'still your old password': '<b>'.$password.'</b>' !!}</b></span></p>
      <p>Click <a href="http://volleyball.ng/team/signIn" style="color: #4449ca; text-decoration: none"><b>here</b></a> to log in.</p>

      <p>If you have questions or issues with your account, please email <b><a href="mailto:hello@volleyball.ng?subject=Enquiry%20or%20issue%20with%20volleyball%20team%20account" style="color: #4449ca; text-decoration: none">hello@volleyball.ng</a></b>.</p>

      <p>Best regards,<br>
      <b>Volleyball.ng</b></p>

  </div>

  </body>
</html>
