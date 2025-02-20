@component('mail::message')
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Nuevo Mensaje de Contacto</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 30px auto;
      background-color: #ffffff;
      padding: 20px;
      border: 1px solid #dddddd;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .header {
      background-color: #007bff;
      color: #ffffff;
      padding: 15px;
      text-align: center;
      border-radius: 6px 6px 0 0;
    }
    .content {
      margin: 20px 0;
    }
    .field {
      margin-bottom: 15px;
    }
    .field label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }
    .field span {
      display: block;
      padding: 10px;
      border: 1px solid #dddddd;
      border-radius: 4px;
      background-color: #f9f9f9;
    }
    .footer {
      text-align: center;
      font-size: 12px;
      color: #888888;
      border-top: 1px solid #dddddd;
      padding-top: 10px;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Mensaje nuevo de contacto</h1>
    </div>
    <div class="content">
      <div class="field">
        <label>Full Name:</label>
        <span>{{$name}}</span>
      </div>
      <div class="field">
        <label>Email:</label>
        <span>{{$email}}</span>
      </div>
      <div class="field">
        <label>Subject:</label>
        <span>{{$subject}}</span>
      </div>
      <div class="field">
        <label>Message:</label>
        <span>{{$message}}</span>
      </div>
    </div>
    <div class="footer">
      HomeLand Company &copy; 2025
    </div>
  </div>
</body>
</html>
@endcomponent
