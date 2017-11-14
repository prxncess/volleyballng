<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>
<body style="font-family: 'Open Sans', sans-serif; background-color: inherit; padding: 40px; color: #5a5a5a">
<h4 style="color: #333333; font-weight: 700">Dear <b> Team <?php echo e($team->name); ?>,</b></h4>

<div>
    <?php if($team->active==1): ?>
        <p>Congratulation, your team (registered on <a href="http://volleyball.ng" style="color: #4449ca; text-decoration: none"><b>volleyball.ng</b></a>) has been  reviewed and is now
            Approved and active.
            .</p>
        <?php elseif($team->active==0): ?>
        <p>Your team (registered on <a href="http://volleyball.ng" style="color: #4449ca; text-decoration: none"><b>volleyball.ng</b></a>) has been  reviewed and is still not approved  as your team information did meet
            our requirements for approval
            Active.
            .</p>
        <p>To be approved, a team should have:
        <ul>
            <li>at least 6 players</li>
            <li>1 staff member</li>
            <li>a photo of the entire team</li>
        </ul>
        </p>
        </p>
        <?php endif; ?>



    <p>To review this request, log in to the <a href="http://volleyball.ng/admin" style="color: #4449ca; text-decoration: none"><b>admin</b></a> area.</p>

    <p>Best regards,<br>
        <b>Volleyball.ng</b></p>

</div>

</body>
</html>