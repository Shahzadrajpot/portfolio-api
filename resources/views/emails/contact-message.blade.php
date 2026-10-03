<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>New Portfolio Contact Message</title>
</head>

<body>
    <h2>New Contact Message</h2>

    <p><strong>Name:</strong> {{ $contactMessage->name }}</p>

    <p><strong>Email:</strong> {{ $contactMessage->email }}</p>

    <p><strong>Message:</strong></p>

    <p>{{ $contactMessage->message }}</p>
</body>

</html>
