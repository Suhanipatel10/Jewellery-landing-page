<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Jewelry Store</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(45deg, #8EAEBA, #C2C0AB, #E3C39E); /* Replace with your background image URL */
            background-size: cover;
        }
        .signup-container {
            width: 80%;
            max-width: 1200px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 40px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8); /* Slightly transparent white background */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .signup-photo, .signup-form {
            flex: 1;
            padding: 20px;
        }
        .signup-photo img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .signup-form {
            display: flex;
            flex-direction: column;
            max-width: 500px;
        }
        .signup-form h2 {
            margin: 0 0 20px;
            color: #0e5830;
            font-size: 24px;
            text-align: center;
        }
        .signup-form label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 16px;
            text-align: left;
        }
        .signup-form input[type="text"],
        .signup-form input[type="email"],
        .signup-form input[type="password"],
        .signup-form input[type="tel"],
        .signup-form input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #000; /* Black border initially */
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        .signup-form input[type="text"]::placeholder,
        .signup-form input[type="password"]::placeholder {
            color: #888; /* Light grey color for placeholder text */
        }
        .signup-form input[type="password"]:invalid{
            border-color: red;
        }
        .signup-form input[type="password"]:valid{
            border-color: green;
        }
        .signup-form input[type="email"]:invalid {
            border-color: red;
        }

        .signup-form input[type="email"]:valid {
            border-color: green;
        }

        .signup-form input[type="email"][pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}"] {
            border-color: green;
        }
        .signup-form button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #0e5830;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .signup-form button:hover {
            background-color: #0b4730;
        }
        .signup-form p {
            margin: 20px 0 0;
            font-size: 14px;
            color: #333;
            text-align: center;
        }
        .signup-form a {
            color: #0e5830;
            text-decoration: none;
        }
        .signup-form a:hover {
            text-decoration: underline;
        }
        .terms {
            margin-bottom: 20px;
        }

        .terms input[type="checkbox"] {
            margin-right: 20px;
        }

        .terms a {
            text-decoration: none;
            color: #0e5830;
        }

        .terms a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <main>
        <div class="signup-container">
            <div class="signup-photo">
                <img src="signup.jpg" alt="Sign Up Photo"> <!-- Replace with your photo URL -->
            </div>
            <div class="signup-form">
                <h2>Sign Up</h2>
                <form id="signup-form" action="signup_process.php" method="POST">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="eg. Dharmendra" required>
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="eg. example@gmail.com" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="eg. U7D8R9F5G2" required minlength="6" pattern="(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{6,}">
                    <label for="number">Mobile no.</label>
                    <input type="tel" id="number" name="number" placeholder="eg. 12345 67890" required pattern="^(\+\d{1,3}[- ]?)?\d{0,10}$" maxlength="10">
                    <label for="birthdate">Birth Date</label>
                    <input type="date" id="birthdate" name="birthdate" max="2005-12-31" optional>
                    <input type="checkbox" id="terms" required>I agree to the Terms and Conditions
                    <button type="submit">Sign Up</button>
                </form>
                <p>Already have an account? <a href="login.php">Log in</a></p>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('signup-form').addEventListener('submit', function(event) {
            // Prevent default form submission
            event.preventDefault();
            
            // Get form and input elements
            const form = document.getElementById('signup-form');
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password');
            const birthdate = document.getElementById('birthdate');
            const terms = document.getElementById('terms');
            
            // Check if all required fields are filled out
            if (!name || !email || !password.value || !terms.checked) {
                if (!terms.checked) {
                    alert('Please agree to the Terms and Conditions.');
                } else {
                    alert('Please fill out all required fields.');
                }
                return;
            }

            if (!birthdate.checkValidity()) {
                alert('You must be at least 18 years old to sign up.');
                return;
            }
            
            // Check if the password meets the requirements
            if (password.value.length < 6 || !/(?=.*[a-zA-Z])(?=.*\d)(?=.*[_!@#$%^&*])/g.test(password.value)) {
                alert('Password must be at least 6 characters long and include both letters, numbers, and a special character.');
                return;
            }
            
            // If all validations pass
            alert('Sign Up Successful!');
            form.submit();
        });
    </script>
</body>
</html>
