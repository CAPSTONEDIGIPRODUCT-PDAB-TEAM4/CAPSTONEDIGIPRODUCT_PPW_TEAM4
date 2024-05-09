<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="regis.css" />
    <style>
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <section class="container">
        <header>Registration Form</header>
        <div id="error-message" class="error-message">
            <?php
            // Periksa apakah terdapat pesan error yang disertakan dalam URL
            if(isset($_GET['error'])) {
                $error_message = $_GET['error'];
                echo "<p>$error_message</p>";
            }
            ?>
        </div>
        <form action="regis_process.php" class="form" method="POST">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="full_name" placeholder="Enter your full name" required />
            </div>

            <div class="input-box">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter your username" required />
            </div>

            <div class="input-box">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter your email address" required />
            </div>

            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" placeholder="Create your password" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="number" name="phone_number" placeholder="Enter your phone number" required />
                </div>
                <div class="input-box">
                    <label>Birth Date</label>
                    <input type="date" name="birth_date" required />
                </div>
            </div>

            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option" required>
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" value="laki-laki" required />
                        <label for="check-male">Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" value="perempuan" required />
                        <label for="check-female">Female</label>
                    </div>
                </div>
            </div>

            <div class="input-box address">
                <label>Address</label>
                <input type="text" name="address" placeholder="Enter your address" required />
            </div>

            <button type="submit">Submit</button>
            <p style="text-align: center;"><a href="index.php">Back to homepage</a></p>
        </form>
    </section>
</body>
</html>
