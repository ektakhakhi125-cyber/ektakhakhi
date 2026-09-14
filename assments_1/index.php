<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TechEdge Motors - Customer Interaction</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>TechEdge Motors</h1>

        <h2>Customer Interaction Form</h2>

        <form action="process.php" method="POST">

            <label>Name</label>
            <input type="text" name="name" placeholder="Enter your name" required>

            <label>Phone</label>
            <input 
                type="tel" 
                name="phone" 
                placeholder="Enter phone number"
                pattern="[0-9]{10}"
                maxlength="10"
                required
            >

            <label>Email</label>
            <input 
                type="email" 
                name="email" 
                placeholder="Enter your email"
                required
            >

            <label>Vehicle Details</label>
            <input 
                type="text" 
                name="vehicle" 
                placeholder="Example: Hyundai Creta 2024"
                required
            >

            <label>Complaint</label>
            <textarea 
                name="complaint" 
                rows="5"
                placeholder="Describe your complaint"
                required
            ></textarea>

            <button type="submit">Submit</button>

        </form>

        <br>

        <a href="view.php" class="view-link">
            View Customer Records
        </a>

    </div>

</body>

</html>