<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
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

   <main>
    <div class="container">
        <div class="container-content" style="position: relative">
                <div class="content">
                    <ion-icon name="cloud-upload-outline" class="cloud"></ion-icon>
                    <div id="dropZone">
                        <h2>Drag and Drop files here</h2>
                        <!-- <p>for plagiarism check </p> -->
                    </div>
                    <!-- <h2>Or</h2> -->
                </div>
                
                <!-- <a href="" class="feedback">View Feedback</a> -->

                <input 
                    type="file" 
                    name="file" 
                    style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; opacity: 0;" 
                    class="upload"
                    multiple
                    oninput="handleUpload(this)"
                >

                <div 
                    class="preview-box"
                    style="display: none; flex-direction: column; align-items: center; justify-content: center; flex-wrap: wrap; position: absolute; padding: 3rem; top: 0; left: 0; height: 100%; width: 100%; z-index: 10; background: white;"
                >

                    <div 
                        class="close-btn" 
                        style="background: red; color: white; height: 40px; width: 40px; display: flex; align-items: center; justify-content: center; position: absolute; top: -10px; right: -10px; cursor: pointer;"
                        onclick="document.querySelector('.preview-box').style.display = 'none'; document.querySelector('input.upload').value = ''"
                    >
                        <ion-icon name="close"></ion-icon>
                    </div>
                </div>
        </div>
        <div>
            <button class="btn primary-btn upload" >Upload File</button>
        </div>
    </div>
   </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/main.js"></script>
    
    <script>
        function handleUpload(self) {
            let previewBox = document.querySelector('#dropZone');
            previewBox.style.display = "flex";

            let files = self.files;

            previewBox.innerHTML = ''; // clear the preview box

            for (let i = 0; i < files.length; i++) {
                let element = files[i];
                let file = document.createElement('div');
                file.setAttribute('class', 'upload_item');
                file.innerHTML = `${element.name} (${formatFileSize(element.size)})`;
                previewBox.appendChild(file);
            }

            if(files.length <= 0)previewBox.innerHTML = "<h2>Drag and Drop files here</h2>"
        }

        function formatFileSize(size) {
            if (size < 1024) {
                return `${size} bytes`;
            } else if (size < 1024 * 1024) {
                return `${(size / 1024).toFixed(2)} KB`;
            } else {
                return `${(size / (1024 * 1024)).toFixed(2)} MB`;
            }
        }
    </script>
    
    
</body>
</html>