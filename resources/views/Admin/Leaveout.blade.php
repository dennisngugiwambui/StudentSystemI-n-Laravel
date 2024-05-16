@extends('Admin.app')

@section('content')
<style>
    /* Add custom styles for the form and background here */
    body {
        background-color: #f0f0f0; /* Set the background color */
    }

    .leaveout-form {
        background-color: #fff; /* Set the form background color */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a box shadow for the form */
    }

    /* Change the input field background color on focus */
    .form-control:focus {
        background-color: white; /* Change to the desired color on focus */
    }

    /* Set the dropdown menu background color to white */
    .dropdown-menu {
        background-color: white; /* Set the dropdown menu background color */
    }

    /* Add more custom styles as needed */

    /* Quill styles */
    #editor-container {
        height: 200px; /* Adjust the editor height as needed */
    }

    #toolbar {
        margin-top: 10px;
    }
    .custom-select:focus {
        background-color: white; /* Change to the desired color on focus */
        color: black;
    }
</style>

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-md-6">
            <div class="leaveout-form">
                <form method="POST" action="">
                    @csrf

                    <h1>LEAVEOUT SHEET</h1>
                    <div class="mb-3">
                        <label for="searchStudent" class="form-label">Search Student</label>
                        <input type="text" class="form-control" id="searchStudent" name="searchStudent" required>
                        <div id="studentSearchResults" class="dropdown-menu position-absolute" style="display: none;">
                            <ul class="list-group" style="list-style: none; margin: 0; padding: 0;"></ul>
                        </div>
                    </div> 
                    <div class="mb-3">
                        <label for="reason_for_leaveout" class="form-label">Student Reg Number</label>
                        <input type="text" class="form-control" id="id" name="reg_number" readonly>
                    </div>                   
                    <div class="mb-3">
                        <label for="reason_for_leaveout" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="reason_for_leaveout" name="student_name" readonly>
                    </div>

                    <input type="hidden" id="registration_number" name="registration_number">
                    <input type="hidden" id="student_name" name="student_name">


                    <div class="mb-3">
                        <label for="reason_for_leaveout" class="form-label">Reason for Leaveout</label>
                        <input type="text" class="form-control" id="reason_for_leaveout" name="reason_for_leaveout" required>
                    </div>
                    <div class="mb-3">
                        <label for="expected_return_time" class="form-label">Expected Return Time</label>
                        <input type="text" class="form-control" id="expected_return_time" name="expected_return_time" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Include Quill stylesheet -->
            <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

            <div>
                <label for="name">Enter Name: </label>
                <input type="text" id="name">
                <button type="button" id="generateLetter">Generate Letter</button>
            </div>

            <div id="toolbar">
                <!-- Text Format -->
                <select class="ql-font">
                    <option value="Arial">Arial</option>
                    <option value="Times New Roman">Times New Roman</option>
                    <option value="Calibri">Calibri</option>
                    <!-- Add more font options as needed -->
                </select>
                <!-- Text Align -->
                <select class="ql-align">
                    <option value="left">Left</option>
                    <option value="center">Center</option>
                    <option value="right">Right</option>
                    <option value="justify">Justify</option>
                </select>
                <!-- Text Color -->
                <select class="ql-color">
                    <option value="blue">Blue</option>
                    <option value="white">White</option>
                    <option value="red">Red</option>
                    <option value="yellow">Yellow</option>
                    <option value="green">Green</option>
                </select>
                <!-- Default Quill Toolbar -->
                <button class="ql-bold"></button>
                <button class="ql-italic"></button>
                <!-- Add more Quill toolbar options as needed -->
            </div>

            <div id="editor-container"></div>

            <!-- Include Quill script -->
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
            <script>
                var quill = new Quill('#editor-container', {
                    theme: 'snow'
                });

                // Add the toolbar to the Quill instance
                quill.getModule('toolbar').container = '#toolbar';

                document.getElementById('generateLetter').addEventListener('click', function () {
                    const name = document.getElementById('name').value;
                    const font = document.querySelector('.ql-font').value;
                    const align = document.querySelector('.ql-align').value;
                    const color = document.querySelector('.ql-color').value;
                    const letterTemplate = `
                        <div style="font-family: ${font}; color: ${color}; text-align: ${align}; white-space: pre-wrap;">
                            <h1>LEAVEOUT SHEET</h1>
                            <p><strong>Date:</strong> September 9, 2023</p>
                            <p><strong>Student Name:</strong> [Student Name]</p>
                            <p><strong>Registration Number:</strong> [Registration Number]</p>
                            <p><strong>Reason for Leaveout:</strong> [Reason for Leaveout]</p>
                            <p><strong>Leaveout Request:</strong></p>
                            <p>The above-mentioned student has been sent for leaveout permission due to <b>[Reason for Leaveout]</b>. The leaveout commenced on <b>[Current Date]</b> at <b>[Current Time]</b>. The student is expected to return after <b>[Expected Return Time]</b>. This form is issued to explain the circumstances of the leaveout.</p>
                            <p><strong>Principal/Deputy Signature:</strong> ____________________________________</p>
                            <p><strong>Date:</strong> ___________________</p>
                        </div>
                    `;

                    quill.clipboard.dangerouslyPasteHTML(letterTemplate);
                });
            </script>
        </div>
    </div>
</div>


<div id="defaultDialog">
    <h1>hELLO
    <div id="Grid"></div>
</div>



<script>
 
// Grid component
var grid = new ej.grids.Grid(
  {
    dataSource: gridData,
    allowPaging: true,
    columns: [
      { field: 'OrderID', headerText: 'Order ID', width: 120, textAlign: 'Right' },
      { field: 'CustomerName', headerText: 'Customer Name', width: 150 },
      { field: 'Freight', width: 120, format: 'C2', textAlign: 'Right' }
    ],
    pageSettings: { pageSizes: true, pageSize: 5 }
  });
grid.appendTo('#Grid');
 
 
// Dialog Component
var dialogObj = new ej.popups.Dialog({
  header: 'Syncfusion Grid inside Dialog',
  target: document.getElementById('target'),
  width: '800px',
  buttons: [{
    click: dlgButtonClick,
    buttonModel: { content: 'OK', isPrimary: true }
  },
  {
    click: dlgButtonClick,
    buttonModel: { content: 'Cancel', cssClass: 'e-flat' }
  }],
  open: dialogOpen,
  close: dialogClose,
  visible: false,
});
dialogObj.appendTo('#defaultDialog');
 
document.getElementById('dialogBtn').onclick = function () {
  dialogObj.show();
};
 
// Hide the Dialog
function dlgButtonClick() {
  dialogObj.hide();
}
 
// 'Open' Button will be shown if the Dialog is closed
function dialogClose() {
  document.getElementById('dialogBtn').style.display = 'block';
}
 
// 'Open' Button will be hidden if the Dialog is opened
function dialogOpen() {
  document.getElementById('dialogBtn').style.display = 'none';
}
 


</script>



<script>
    // Function to fetch student data based on search input
    function searchStudents(searchText) {
        // Implement AJAX request to fetch student data
        // Replace the URL with your server endpoint for student search
        // You should return a JSON response containing student data (id and name)
        fetch(`/api/search-students?searchText=${searchText}`)
            .then(response => response.json())
            .then(data => {
                const resultsContainer = document.getElementById('studentSearchResults');
                resultsContainer.innerHTML = '';

                if (data.length > 0) {
                    data.forEach(student => {
                        const listItem = document.createElement('li');
                        listItem.innerHTML = `<a class="dropdown-item">${student.id} - ${student.name}</a>`;
                        listItem.addEventListener('click', function () {
                            const selectedStudent = student;
                            document.getElementById('registration_number').value = selectedStudent.id;
                            document.getElementById('student_name').value = selectedStudent.name;
                            resultsContainer.innerHTML = '';
                        });
                        resultsContainer.appendChild(listItem);
                    });
                    resultsContainer.style.display = 'block';
                } else {
                    resultsContainer.style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    const searchStudentInput = document.getElementById('searchStudent');
    searchStudentInput.addEventListener('input', function () {
        const searchText = this.value;
        searchStudents(searchText);
    });

    // Close dropdown when clicking outside
    window.addEventListener('click', function (e) {
        if (!document.getElementById('studentSearchResults').contains(e.target)) {
            document.getElementById('studentSearchResults').style.display = 'none';
        }
    });
</script>

@endsection
