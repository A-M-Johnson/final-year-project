<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer</title>
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/Dashboard.css">
</head>
<body>
   <header>
    <nav class="nav-container">
        <div class="logo">
            <a href="#">COMPUTER SCIENCE</a>
        </div>
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

   <main>
    <div class="dashboard-container">
        <table>
            <thead>
                <tr>
                    <td>NAME</td>
                    <td>PROJECT NAME</td>
                    <td>SCORE</td>
                    <td>STATUS</td>
                    <td>ACTION</td>
                </tr>
            </thead>
            <tbody>

                @foreach($projects as $project)
                    <tr>
                        <td>{{$project->student->name}}</td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->score}}%</td>
                        <td>{{$project->status}}</td>
                        <td id="table_btn"> 
                            <button onclick="location.href = '/project/{{$project->id}}'" class=" table_btn apr">View Project</button>
                            <!-- 
                            <button class="table_btn rej">Reject</button> -->
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
       <div class="export_btns">
            <button class="export">EXPORT</button>
            <button class="export download">DOWNLOAD</button>
       </div>
    </div>
   </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/main.js"></script>
    
    
</body>
</html>