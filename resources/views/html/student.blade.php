<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Student</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="/styles/student.css">
   <link rel="stylesheet" href="/styles/main.css">
   <link rel="stylesheet" href="/styles/Dashboard.css">
   <style>
      .message-success {
         position: relative;
         background: #58bd58;
         color: white;
         border-radius: 10px;
         shadow: 0px 0px 1px #999999;
         margin-bottom: 1rem;
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
</head>
<body>
   <header class="header">
      <section class="flex">
         <a href="home.html" class="logo">Student Dashboard</a> 
         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
         </div> 
      </section>
   </header>  
   <section class="teachers">
      @if (session('success'))
         <div onclick="remove(this);" style="">
            <div class="message-success" style="padding: 1rem; display: flex; align-items: center; justify-content: space-between; font-weight: bold; font-size: 160%;">
               {{session('success')}}
               <div class="close-x" style="">x</div>
            </div>
         </div>
      @endif
      <h1 class="heading">Computer Science</h1>
      <div class="box-container">
         <div class="box offer">
            <!-- <h3>Plagiarism Check</h3> -->
            <a href="/upload" class="inline-btn">Proceed to upload</a>
         </div>
         <div class="box offer">
            <!-- <div class="tutor">
               
            </div> -->
            <a href="teacher_profile.html" class="inline-btn">View Feedback</a>
         </div>
      </div>
   </section>
   <main>

      

      <div class="dashboard-container">
         <table>
               <thead>
                  <tr>
                     <td>TITLE</td>
                     <td>TIME SUBMITTED</td>
                     <td>PLAGIARISM SCORE</td>
                     <td>FEEDBACK</td>
                     <td>ACTION</td>
                  </tr>
               </thead>
               <tbody>
                  @foreach($projects as $project)
                     <tr>
                        <td>{{$project->title}}</td>
                        <td>{{$project->created_at->diffForHumans()}}</td>
                        <td>{{$project->score}}%</td>
                        <td>{{$project->status ?? "pending"}}</td>
                        <td id="table_btn"> 
                              <button onclick="location.href = '/edit/{{$project->id}}'" class=" table_btn apr">Edit</button>
                        </td>
                     </tr>
                  @endforeach
                 
               </tbody>
         </table>
      </div>
   </main>
<!-- custom js file link  -->
<script src="js/script.js">
</script>  
</body>
<script>
   function remove(self) {
      self.remove();
   }
</script>
</html>