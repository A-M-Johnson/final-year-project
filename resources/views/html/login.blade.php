<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/styles/Login.css">

    <style>
        button.account-type.active {
            background: #357bff !important;
            color: white !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="first">
            <div class="login">
                <h2>Welcome <span>Back</span></h2>

                @error('all')
                    <div class="invalid-feedback" style="text-align: center; border-radius: 10px; background: #ff4242; margin: 0.5rem; font-size:80%; color: white; padding: 1rem;;" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror

                <form action="/login" method="post" class="main-form">
                    @csrf
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" placeholder="Enter your email">
                        @error('email')
                            <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="password" placeholder="Enter your password">
                        @error('password')
                            <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Account Type:</label>
                        <div class="" style="display: flex; align-items: center; gap: 1rem;">
                            <div  onclick="" style="display: flex; align-items: center; flex-grow: grow;">
                                <button class="account-type" onclick="activate(this);" type="button" style="padding: 0.75rem 3rem; background: lightgray; color: #111; font-weight: bold; border: none; border-radius: 10px; border: 1px solid gray;">Student</button>
                            </div>
                            <div  onclick="" style="display: flex; align-items: center;">
                                <button class="account-type" onclick="activate(this, 'lecturer');" type="button" style="padding: 0.75rem 3rem; background: lightgray; color: #111; font-weight: bold; border: none; border-radius: 10px; border: 1px solid gray;">Lecturer</button>
                            </div>
                        </div>
                        <input type="hidden" name="role">
                        @error('role')
                            <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <div class="check">
                            <div class="anchor">
                                <a href="">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Sign in">
                    </div>
                    <p>Don't have an account? <a href="/signup">Sign Up</a> </p>
                </form>
            </div>
            <div class="footer">
                <p>&copy Copyright <span> 2024</span></p>
            </div>
        </div>
    </div>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<script>
    function activate(self, role="student") {
        document.querySelectorAll('.account-type').forEach( btn => btn.classList.remove("active"));
        document.querySelector('input[name="role"]').value = role;
        self.classList.add("active");
    }
</script>
</html>