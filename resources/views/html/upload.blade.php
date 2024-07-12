<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/main.css">
</head>
<body>
   <header>
    <nav class="nav-container">
        <div class="logo">
            <a href="#">COMPUTER SCIENCE</a>
        </div>
        <!-- <ul class="nav-list">
            <li><a href="/html/main.html">Home</a></li>
            <li><a href="/html/about.html">About</a></li>
            <li><a href="/html/contact.html">Contact</a></li>
        </ul> -->
        <div class="btn">
            <div class="profile">
                <a href="">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h5>Johnson</h5>
                </a>
            </div>
            <button class="btn primary-btn">
                Logout
                <ion-icon name="log-out-outline"></ion-icon>
            </button>
        </div>
    </nav>
   </header>
    <!-- Project Submission Form -->
    <div class="project-form">
    <h2>Project Submission</h2>
    <form method="post" action="/upload" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="project-title">Project Title</label>
            <input type="text" id="project-title" name="title" placeholder="Enter project title">
            @error('title')
                <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="project-description">Project Description</label>
            <textarea id="project-description" name="description" placeholder="Enter project description"></textarea>
            @error('description')
                <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="project-file">Project File</label>
            <input type="file" id="project-file" name="project_file">
            @error('project_file')
                <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="snapshots">Snapshots</label>
            <input type="file" id="snapshots" name="snapshots[]" multiple>
            @error('snapshots')
                <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="supervisor">Supervisor</label>
            <select id="supervisor" name="supervisor">
            <option value="">Select Supervisor</option>
            @foreach ($supervisors as $supervisor)
                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
            @endforeach
            <!-- populate supervisor options from database -->
            </select>
            @error('supervisor')
                <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <button type="submit">Submit Project</button>
        </form>
    </div>

    <!-- Styles -->
    <style>
    * {box-sizing: border-box; padding: 0; margin: 0;}
    .project-form {
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
        margin: 1rem 0;
    }
    
    .form-group {
        margin-bottom: 20px;
        width: 100%;
    }
    
    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        color: #333;
    }
    
    input[type="text"], input[type="file"], textarea, select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
    }
    
    input[type="file"] {
        padding: 10px 0;
    }
    
    textarea {
        height: 100px;
    }
    
    select {
        padding: 10px;
        border: 1px solid #ccc;
    }
    
    button[type="submit"] {
        background-color: #007bff;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }
    
    button[type="submit"]:hover {
        background-color: #0069d9;
    }
</style>
</body>
</html>