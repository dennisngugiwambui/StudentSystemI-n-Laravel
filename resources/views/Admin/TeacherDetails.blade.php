<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profile - Mr./Ms. [Teacher's Name]</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #444;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .profile {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }
        .profile img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .profile .info {
            text-align: center;
            margin-top: 20px;
        }
        .profile h2 {
            color: #333;
            margin-bottom: 10px;
            font-size: 28px;
        }
        .profile p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 10px;
        }
        .profile p:last-child {
            margin-bottom: 0;
        }
        .profile hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 20px 0;
            width: 80%;
        }
        .profile a {
            text-decoration: none;
            color: #3498db;
            transition: color 0.3s ease;
        }
        .profile a:hover {
            color: #1abc9c;
        }
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
            .profile img {
                width: 150px;
                height: 150px;
            }
            .profile h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Teacher Profile</h1>
    <div class="profile">
        <img src="teacher.jpg" alt="Teacher">
        <div class="info">
            <h2>Mr./Ms. [Teacher's Name]</h2>
            <p><strong>Subject:</strong> [Subject Name]</p>
            <p><strong>Education:</strong> [Education Background]</p>
            <p><strong>Experience:</strong> [Years of Experience]</p>
            <hr>
            <p><strong>About Me:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec velit vel nunc finibus dapibus vitae non nisi. Donec volutpat urna sed nulla scelerisque tristique.</p>
            <p>Contact me at: <a href="mailto:teacher@example.com">teacher@example.com</a></p>
        </div>
    </div>
</div>
</body>
</html>
