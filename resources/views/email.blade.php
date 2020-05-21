<!DOCTYPE html>
<html>
 <head>
  <title>Message</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <!-- Styles -->
  <style>
      html, body {
          background-color: #fff;
          color: #636b6f;
          font-family: 'Nunito', sans-serif;
          font-weight: 200;
          height: 100vh;
          margin: 0;
      }
      .content { text-align: center; }
      .title { font-size: 84px; }
      .negrita{font-weight: bold}
  </style>
 </head>
 <body>
  <br/>

  <!--Formanto/vista en el que se envia el email-->

  <div class="container box" style="width: 970px;">
   <h1> {{ $data['name'] }} </h1>
   <p>{{ $data['message'] }}</p>
   <p class="negrita">Email: {{ $data['email'] }}</p>
  </div>
 </body>
</html>