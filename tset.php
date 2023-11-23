<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Creation Date</title>
</head>
<body>

<input type="file" id="fileInput" />

<script type="module">
function readAndDisplayCreationDate() {
  const fileInput = document.getElementById('fileInput');
  
  fileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();

      reader.onload = function () {
        const createdDate = new Date(file.lastModified);
        console.log('Created Date:', createdDate);
        alert('File created on: ' + createdDate);
      };

      reader.readAsText(file);
    }
  });
}

readAndDisplayCreationDate();
</script>

</body>
</html>
