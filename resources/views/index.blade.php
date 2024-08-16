<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Investment Platform</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
}

header {
    background: #3498db;
    color: #fff;
    padding: 60px 20px;
    text-align: center;
    background-image: linear-gradient(135deg, #3498db, #2ecc71);
}

header h1 {
    margin: 0;
    font-size: 3em;
}

header p {
    font-size: 1.2em;
}

.cta-button {
    display: inline-block;
    padding: 15px 30px;
    margin-top: 20px;
    background: #fff;
    color: #3498db;
    font-size: 1.2em;
    text-decoration: none;
    border-radius: 5px;
}

.cta-button:hover {
    background: #f0f0f0;
    color: #2980b9;
}

.features {
    padding: 40px 20px;
    background: #f8f8f8;
    text-align: center;
}

.features h2 {
    margin: 0;
    font-size: 2.5em;
}

.feature {
    margin: 20px 0;
}

.feature h3 {
    margin: 0;
    font-size: 1.5em;
}

.feature p {
    font-size: 1.1em;
    color: #555;
}

.auth-links {
    padding: 40px 20px;
    background: #fff;
    text-align: center;
}

.auth-links h2 {
    margin: 0;
    font-size: 2.5em;
    margin-bottom: 20px;
}

.auth-options {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.auth-option {
    background: #f8f8f8;
    border-radius: 8px;
    padding: 20px;
    max-width: 250px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.auth-option h3 {
    margin: 0;
    font-size: 1.5em;
}

.auth-button {
    display: block;
    padding: 10px;
    margin-top: 10px;
    background: #3498db;
    color: #fff;
    font-size: 1.1em;
    text-decoration: none;
    border-radius: 5px;
}

.auth-button:hover {
    background: #2980b9;
}

footer {
    background: #2c3e50;
    color: #fff;
    padding: 20px;
    text-align: center;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Empower Communities</h1>
            <p>Invest in Social Causes, Startups, and Community Projects</p>
            <a href="#loginSignup" class="cta-button">Get Started</a>
        </div>
    </header>
    <section class="features">
        <div class="container">
            <h2>Why Choose Us?</h2>
            <div class="feature">
                <h3>Impactful Investments</h3>
                <p>Support projects that make a real difference in communities.</p>
            </div>
            <div class="feature">
                <h3>Transparent Reporting</h3>
                <p>Track your investments and see the impact they make.</p>
            </div>
            <div class="feature">
                <h3>Easy Fund Management</h3>
                <p>Manage your funds with ease and efficiency.</p>
            </div>
        </div>
    </section>
    <section id="loginSignup" class="auth-links">
        <div  class="container">
            <h2>Login or Sign Up</h2>
            <div class="auth-options">
                <div class="auth-option">
                    <a href="{{route('loginForm')}}" class="auth-button">Login</a>
                </div>
                <div class="auth-option">
                
                    <a href="{{route('signupForm')}}" class="auth-button">SignUp</a>
                </div>
                
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; 2024 Social Investment Platform. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
