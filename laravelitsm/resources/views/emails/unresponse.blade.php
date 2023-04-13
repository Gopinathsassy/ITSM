<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ITSM - A ticket is Un-Assigned</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['topic'] }}</p>
    <p>{{ $details['createdby'] }}</p>
    <p>{{ $details['type'] }}</p>
    <p>{{ $details['summary'] }}</p>
    <p>{{ $details['level'] }}</p>
    <p>{{ $details['responsible'] }}</p>
    <p>{{ $details['severity'] }}</p>
    <p>Thank You!</p>
    <p style="color: red">This is an automatically generated mail. Please do not reply</p>
</body>
</html>
