@extends('Admin.app')

@section('content')
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
                <h1>FORMAL DEMAND LETTER</h1>
                <p>Natalie & Associates #288556</p>
                <p>Attorneys at Law</p>
                <p>2834 Pierce St, San Francisco, CA 94123-3819</p>
                <p>County: San Francisco County</p>
                <p>September 9, 2023</p>
                <p>AP-Elite Personalized Fitness</p>
                <p>123 Main Street</p>
                <p>Anytown, CA 91234</p>
                <p>Re: Demand Letter Prior to Legal Action</p>
                <p>On behalf of our client [${name}], we at Kelley Denise Scott law Firm are writing to bring to your attention an action on your part that has caused an incurable great deal of mental and emotional stress as well as financial difficulty to our client. This letter constitutes a formal complaint against you and requests a complete refund of the $2,800 that our client paid for the customized wellness/fitness program acquired from your company on July 31, 2023.</p>
            </div>
        `;

        quill.clipboard.dangerouslyPasteHTML(letterTemplate);
    });
</script>

@endsection
