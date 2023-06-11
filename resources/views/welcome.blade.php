<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Example</title>
</head>

<body>
<p>
    <b>Message:-</b><span id="message-date"></span>
</p>

<script src="{{asset('js/app.js ')}}"></script>
<script>
    Echo.channel('home').listen('NewMessage', (data) => {
        document.getElementById('message-date').innerHTML=data.message;
    });

</script>

</body>
</html>
