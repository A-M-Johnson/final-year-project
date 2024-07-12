<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/styles/Signup.css">
</head>
<body>
    <div class="container">
        <div class="first">
            <div class="login">
                <h2>Create an <span>Account</span></h2>
                <p>Let's get started with your <span>registration</span></p>

                @error('all')
                    <div class="invalid-feedback" style="text-align: center; border-radius: 10px; background: #ff4242; margin: 0.5rem; font-size:80%; color: white; padding: 1rem;;" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror

                <form method="post" action="/signup" class="main-form">
                    @csrf
                    <div class="form-group">
                       <label>Name</label>
                       <input type="text" name="name" placeholder="Enter your name">
                       @error('name')
                            <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
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
                        <label>Index number:</label>
                        <input type="text" name="index_number" placeholder="Enter your index number">
                        @error('index_number')
                            <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Department:</label>
                        <select onchange="changeYears()" name="department" id="departments">
                            @foreach ($departments as $department)
                                <option max_level="{{ $department->max_level }}" value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department')
                            <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Year:</label>
                        <select name="year" id="years">
                            <option disabled selected>Year/level</option>
                            <option value="4">4th</option>
                            <option value="3">3rd</option>
                            <option value="2">2nd</option>
                            <option value="1">1st</option>
                        </select>
                        @error('year')
                            <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button style="background: black; color: white; padding: 0.75rem 3rem; width: 100%; border:none; border-radius: 10px;">Sign Up</button>
                    </div>
                    <p>Already have an account? <a href="/login">Sign In</a> </p>
                </form>
            </div>
            <div class="footer">
                <p>&copy Copyright <span> 2024</span></p>
            </div>
        </div>
</div>



<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-auth.js"></script>
<script src="firebase-config.js"></script>

<script>

    const level_map = {
        @foreach ($departments as $department)
            "{{ $department->id }}" : {{ $department->max_level }},
        @endforeach
    }

    function ordinal(number) {
        const ends = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];
        if ((number % 100) >= 11 && (number % 100) <= 13) {
            return number + 'th';
        } else {
            return number + ends[number % 10];
        }changeYears
    }
    function changeYears() {
        const select = document.querySelector("select[name='year']");
        const department = document.querySelector("select[name='department']");
        const years = level_map[department.value];
        select.innerHTML = "";

        console.log(level_map);

        for (let i = 1; i <= years; i++) {
            let option = document.createElement("option");
            option.value = i;
            option.innerHTML = ordinal(i);
            select.appendChild(option);
        }
    }
</script>

</body>
</html>