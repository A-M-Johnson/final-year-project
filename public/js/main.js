const dropZone = document.getElementById('dropZone');
const uploadBtn = document.querySelector('.primary-btn');

dropZone.addEventListener('dragover', dragOver);
dropZone.addEventListener('dragenter', dragEnter);
dropZone.addEventListener('dragleave', dragLeave);
dropZone.addEventListener('drop', drop);
uploadBtn.addEventListener('click', uploadFiles);


function dragOver(event) {
  event.preventDefault();
}

function dragEnter(event) {
  event.preventDefault();
  dropZone.style.background = 'lightgray';
}

function dragLeave() {
  dropZone.style.background = '';
}

function drop(event) {
  event.preventDefault();
  dropZone.style.background = 'none';
  
  const files = event.dataTransfer.files;
  
  const table = document.createElement('table');
  for (const file of files) {
    const row = table.insertRow();
    const iconCell = row.insertCell();
    const fileNameCell = row.insertCell();
    const fileSizeCell = row.insertCell();

    fileNameCell.innerText = file.name;
    fileSizeCell.innerText = formatFileSize(file.size);
    if(file.name.length > 20){
        fileNameCell.innerText = file.name.slice(0, 20) + '...';
    }

     const icon = document.createElement('ion-icon');
     icon.setAttribute('name', getFileIconName(file.type));
     iconCell.appendChild(icon);

    dropZone.appendChild(table);
  }
  const h2Element = dropZone.querySelector('h2');
  const pElement = dropZone.querySelector('p');
  if (h2Element && pElement) {
    h2Element.style.display = 'none';
    pElement.style.display = 'none';

  }
}
function getFileIconName(fileType) {
    if (fileType && fileType.startsWith('image/')) {
      return 'image-outline';
    } else if (fileType && fileType.startsWith('video/')) {
      return 'videocam-outline';
    } else {
      return 'document-outline';
    }
}

//Function to convert files size to KB or MB
function formatFileSize(bytes) {
    const kb = bytes / 1024;
    if (kb < 1024) {
      return kb.toFixed(2) + ' KB';
    } else {
      const mb = kb / 1024;
      return mb.toFixed(2) + ' MB';
    }
  }

function uploadFiles(){
const table = dropZone.querySelector('table');
  if (!table) {
    alert('No files to upload!');
    return;
  }
  const rows = table.querySelectorAll('tr');
  const files = [];
  for (let i = 1; i < rows.length; i++) { // start from 1 to skip header row
    const file = {
      name: rows[i].cells[0].innerText,
      size: rows[i].cells[2].innerText
    };
    files.push(file);
  }
  console.log('Files to be processed:', files);
}



if (response.data.success === true) {
  router.push(Routes.infoForm);
} else if(response.data.message  == "expired_code") {
  showToast("Expired code. Please request a new code.")
} else {
  showToast(response.data.message)
}