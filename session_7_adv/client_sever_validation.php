<!DOCTYPE html>
<html>
<head>
    <title>Event Signup</title>
</head>
<body>

<h2>Book Event</h2>

<form method="POST">

    <label>Name:</label><br>
    <input
        type="text"
        name="name"
        required
        minlength="2"
    >

    <br><br>

    <label>Email:</label><br>
    <input
        type="email"
        name="email"
        required
    >

    <br><br>

    <label>Phone:</label><br>
    <input
        type="tel"
        name="phone"
        required
        pattern="[6-9][0-9]{9}"
        title="Enter a valid 10-digit Indian mobile number"
    >

    <br><br>

    <button type="submit">Book Event</button>

</form>

</body>
</html>
