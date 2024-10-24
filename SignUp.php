<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="SignUp.css">
</head>
<body>

<div class="container">
    <!-- Image Section -->
    <div class="image-section">
    <p>LOG IN</p>
    </div>

    <!-- Form Section -->
    <div class="form-section">
    <h5>SIGN</br>UP</h5>
        <form>
            <label for="name">FULL NAME</label>
            <input type="text" id="name" placeholder="Your full name goes here">

            <!-- <hr> -->
            
            <label for="email">E-MAIL</label>
            <input type="email" id="email" placeholder="Your email goes here">

            <!-- <hr>             -->
            
            <label for="password">PASSWORD</label>
            <input type="password" id="password" placeholder="Your password goes here">

            <!-- <hr> -->
            
            <label for="confirm-password">CONFIRM PASSWORD</label>
            <input type="password" id="confirm-password" placeholder="Your password goes here">

            <!-- <hr> -->
              
            <div class="terms">
                <input type="checkbox" id="agree">
                <label for="agree">I agree to the terms of service</label>
            </div>
            
            <div class="notifications">
                <input type="checkbox" id="notify">
                <label for="notify">Send notifications on latest deals</label>
            </div> 

            <button type="submit">SIGN UP</button>
        </form>
    </div>
</div>

</body>
</html>


