<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jewelry Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Georgia', serif;
            background-image: url('magazine cover.webp');
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }
        .header1{
            text-align: center;
            background-color: #d4e5c6;
            color: black;
            font-size: 20px;
            padding-top: 0.05px;
            padding-bottom: 0.05px;
        }
        .header3{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            background-color: #f0efec;
        }
        .logo img {
            height: 80px;
            width: 110%;
        }
        .nav {
            display: flex;
            list-style: none;
            padding: 10px;
            margin-left: 50px;
            margin-right: auto;
        }
        .nav > li {
            position: relative;
            margin-left: 20px;
        }
        .nav a {
            font-size: 17px;
            font-family: 'Arial';
            text-decoration: none;
            color: #080000;
            text-transform: uppercase;
            padding: 10px;
            position: relative;
            display: block;
            transition: color 0.3s;
        }
        .nav a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 2px;
            width: 0;
            background: #117548;
            transition: width 0.3s;
        }
        .nav a:hover::after {
            width: 100%;
        }
        .nav a:hover {
            color: #278f60;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #444;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-menu a {
            color: #fff;
            padding: 10px;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu a:hover {
            background-color: #555;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            white-space: nowrap;
        }
        .dropdown-menu a {
            color: #0d0000;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }
        .nav > li:hover .dropdown-menu {
            display: block;
        }
        .nav-right {
            display: flex;
            gap: 30px;
            margin-right: 40px;
        }
        .nav-right a {
            color: black; /* Add this line */
            text-decoration: none;
            font-size: 25px;
            padding: 5px;
        }
        .nav-icon {
            font-size: 30px; 
            stroke-width: 1;
        }
        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80vh; /* Full viewport height */
        }
        .login-form {
            background: rgba(255, 255, 255, 0.7); /* White background with transparency */
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .login-form h2 {
            margin: 0 0 20px;
            color: #0e5830;
            font-size: 24px;
        }
        .login-form label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 16px;
            text-align: left;
        }
        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            /* Placeholder color */
            color: #333;
        }
        .login-form input[type="email"]::placeholder,
        .login-form input[type="password"]::placeholder {
            color: #888; /* Light grey color for placeholder text */
        }
        .login-form button {
            width: 100%;
            padding: 15px; /* Increased vertical padding */
            background-color: #0e5830;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 20px; /* Increased font size */
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-form button:hover {
            background-color: #0b4730;
        }
        .login-form p {
            margin: 20px 0 0;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>
    <header class="header1">
        <p>Free shipping on all orders above 1500/-</p>
    </header>
    <header class="header3">
        <div class="logo">
            <img src="l1.png" alt="Jewellery Store Logo">
        </div>
        <nav class="nav">
            <a href="home.html">Home</a>
            <li>
                <a href="#">Items</a>
                <div class="dropdown-menu">
                    <a href="rings_container.html">Rings</a>
                    <a href="earrings_container.html">earrings</a>
                    <a href="bracelets_container.html">Bracelets</a>
                    <a href="necklaces_container.html">Necklace</a>
                </div>
            </li>
            <li>
                <a href="#">Giftings</a>
                <div class="dropdown-menu">
                    <a href="gift_boxes.html">Gift Boxes</a>
                    <a href="pairs.html">Pair Things</a>
                    <a href="customize.html">Customized Gifts</a>
                </div>
            </li>
            <li>
                <a href="sets.html">Sets</a>
            </li>
            <li>
                <a href="login.html">Login</a>
            </li>
        </nav>
        <div class="nav-right">
            
            <a href="wishlist.html" class="nav-icon">
                <i class="fa fa-heart"></i>
            </a>
            <a href="cart.html" class="nav-icon">
                <i class="fa fa-shopping-cart"></i>
            </a>
            <a href="dashboard.html" class="nav-icon">
                <i class="fa fa-user"></i>
            </a>
        </div>
    </header>
    <div class="login-container">
        <div class="login-form">
            <h2>Login</h2>
            <form action="login_process.php" method="POST">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="eg. example@gmail.com" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="eg. U5y8d0g4h5" required>
            <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </div>
    </div>
    <script>
        document.querySelector('.login-form form').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (email && password) {
                event.target.submit(); // Proceed with form submission
            } else {
                alert('Please fill out all required fields.');
            }
        });
    </script>    
</body>
</html>
