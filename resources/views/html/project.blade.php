<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/Dashboard.css">
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
                    <h5>{{Auth::user()->name}}</h5>
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

        @if (session('success'))
            <div onclick="remove(this);" style="">
                <div class="message-success" style="padding: 1rem; display: flex; align-items: center; justify-content: space-between; font-weight: bold;">
                {{session('success')}}
                <div class="close-x" style="">x</div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div onclick="remove(this);" style="">
                <div class="message-success error" style="padding: 1rem; display: flex; align-items: center; justify-content: space-between; font-weight: bold;">
                {{session('error')}}
                <div class="close-x" style="">x</div>
                </div>
            </div>
        @endif

        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex-end">
                <button onclick="updateStatus('approved')" class=" table_btn apr">Approve</button>
                <button onclick="updateStatus('rejected')" class="table_btn rej">Reject</button>
                <input name="status" type="hidden" />
            </div>
        <div class="form-group">
            <label for="project-title">Project Title</label>
            <input disabled type="text" id="project-title" name="title" value="{{$project->title}}" placeholder="Enter project title">
            @error('title')
                <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="project-description">Project Description</label>
            <textarea disabled id="project-description" name="description" placeholder="Enter project description">{{$project->description}}</textarea>
            @error('description')
                <div class="invalid-feedback" style="margin: 0.5rem; font-size:80%; color: red;" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
        
        
        <input type="hidden" name="project_id" value="{{$project->id}}">
            <a href="{{ '/storage/' . $project->project_file }}" download>
                <button type="button">Download Project Files</button>
            </a>
        </form>
    </div>

    <div class="gallery">
        <h2>Project Screenshots</h2>
        <h2></h2>
        @foreach ($project->shots as $shot )
            <div class="shot">
                <img src="{{ '/storage/' . $shot->image }}" alt="" class="">
            </div>
        @endforeach
    </div>

    <!-- Styles -->
    <style>

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
            gap: 1.5rem;
            padding: 2rem;
        }

        .gallery img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

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
            margin-top: 0;
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
        
        button[type="button"] {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        
        button[type="button"]:hover {
            background-color: #0069d9;
        }

        .flex-end {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-bottom: 1rem;
            gap: 1rem;
        }

        .message-success {
            position: relative;
            background: #58bd58;
            color: white;
            border-radius: 10px;
            shadow: 0px 0px 1px #999999;
            margin-bottom: 1rem;
        }

        .message-success.error {
            background: #ff6565;
        }

        .close-x {
            /* position: absolute; */
            top: 0px;
            right: 0px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    
</body>

<script>

    function updateStatus(status) {
        document.querySelector('input[name="status"]').value = status;
        document.querySelector('form').submit();
    }

</script>

</html>