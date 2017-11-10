<!DOCTYPE html>
<html lang="en-US">
  <head>
      <meta charset="utf-8">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
  </head>
  <body style="font-family: 'Open Sans', sans-serif; background-color: inherit; color: #5a5a5a">
  <h4 style="color: #333333; font-weight: 700">Dear Team <b>{{$team->name}},</b></h4>

  <div>
      @if($team->active==1)
          <p>Congratulations, your registration on <a href="http://volleyball.ng" style="color: #4449ca; text-decoration: none"><b>volleyball.ng</b></a> has been approved and is now active.</p>
          @elseif($team->active==0)
          <p>Your registration on <a href="http://volleyball.ng" style="color: #4449ca; text-decoration: none"><b>volleyball.ng</b></a> has been reviewed and is still not approved as your team
            information hasn't met the requirements for approval.</p>
          <p>To be approved, a team should have:
            <ul>
                <li>at least 6 players</li>
                <li>1 staff member</li>
                <li>a photo of the entire team</li>
            </ul>
          </p>
          </p>
          @endif




      <p>Best regards,<br>
      <b>Volleyball.ng</b></p>

  </div>

  </body>
</html>
