<!DOCTYPE html>


<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link For Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  </head>

  <body>
  
  <form action="{{ route('account.processRegister') }}" method="POST">
  @csrf
 
    <h2>Sign Up</h2>
    
    <div class="form-group fullname">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="name" placeholder="Enter your full name" required>
    </div>
    <div class="form-group email">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
    </div>
    <div class="form-group password">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <i id="pass-toggle-btn" class="fa-solid fa-eye"></i>
    </div>
    <div class="form-group password-confirmation">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
    </div>
    <div class="form-group submit-btn">
        <input type="submit" value="Submit"> 
    </div>
</form>


<script>
        document.getElementById('signupForm').addEventListener('submit', function (event) {
            let fullname = document.getElementById('fullname').value;
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let passwordConfirmation = document.getElementById('password_confirmation').value;

            // Clear previous errors
            let errorElements = document.querySelectorAll('.error');
            errorElements.forEach(element => element.remove());

            let valid = true;

            if (fullname === '') {
                showError('fullname', 'Full Name is required');
                valid = false;
            }

            if (email === '') {
                showError('email', 'Email Address is required');
                valid = false;
            } else if (!validateEmail(email)) {
                showError('email', 'Email Address is not valid');
                valid = false;
            }

            if (password === '') {
                showError('password', 'Password is required');
                valid = false;
            } else if (password.length < 8) {
                showError('password', 'Password must be at least 8 characters long');
                valid = false;
            }

            if (passwordConfirmation === '') {
                showError('password_confirmation', 'Password Confirmation is required');
                valid = false;
            } else if (password !== passwordConfirmation) {
                showError('password_confirmation', 'Passwords do not match');
                valid = false;
            }

            if (!valid) {
                event.preventDefault();
            }
        });

        function showError(inputId, message) {
            let inputElement = document.getElementById(inputId);
            let errorElement = document.createElement('div');
            errorElement.className = 'error';
            errorElement.style.color = 'red';
            errorElement.textContent = message;
            inputElement.parentNode.insertBefore(errorElement, inputElement.nextSibling);
        }

        function validateEmail(email) {
            let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@(([^<>()\[\]\\.,;:\s@"]+\.[^<>()\[\]\\.,;:\s@"]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
    </script>



<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Open Sans', sans-serif;
    }
    
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 0 10px;
      background: #1BB295;
    }
    
    form {
      padding: 25px;
      background: #fff;
      max-width: 500px;
      width: 100%;
      border-radius: 7px;
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
    }
    
    form h2 {
      font-size: 27px;
      text-align: center;
      margin: 0px 0 30px;
    }
    
    form .form-group {
      margin-bottom: 15px;
      position: relative;
    }
    
    form label {
      display: block;
      font-size: 15px;
      margin-bottom: 7px;
    }
    
    form input,
    form select {
      height: 45px;
      padding: 10px;
      width: 100%;
      font-size: 15px;
      outline: none;
      background: #fff;
      border-radius: 3px;
      border: 1px solid #bfbfbf;
    }
    
    form input:focus,
    form select:focus {
      border-color: #9a9a9a;
    }
    
    form input.error,
    form select.error {
      border-color: #f91919;
      background: #f9f0f1;
    }
    
    form small {
      font-size: 14px;
      margin-top: 5px;
      display: block;
      color: #f91919;
    }
    
    form .password i {
      position: absolute;
      right: 0px;
      height: 45px;
      top: 28px;
      font-size: 13px;
      line-height: 45px;
      width: 45px;
      cursor: pointer;
      color: #939393;
      text-align: center;
    }
    
    .submit-btn {
      margin-top: 30px;
    }
    
    .submit-btn input {
      color: white;
      border: none;
      height: auto;
      font-size: 16px;
      padding: 13px 0;
      border-radius: 5px;
      cursor: pointer;
      font-weight: 500;
      text-align: center;
      background: #1BB295;
      transition: 0.2s ease;
    }
    
    .submit-btn input:hover {
      background: #179b81;
    }

    .btn1 {
            background-color: #32cd32; /* Blue background */
            border: none; /* Remove borders */
            color: white; /* White text */
            padding: 10px 20px; /* Some padding */
            text-align: center; /* Center the text */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Make the container an inline-block */
            font-size: 16px; /* Increase font size */
            margin: 4px 2px; /* Some margin */
            cursor: pointer; /* Pointer/hand icon */
            border-radius: 12px; /* Rounded corners */
        }
        .btn1:hover {
            background-color:  #179b81; /* Darker blue */
        }

</style>





</body>







</html>