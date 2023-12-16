<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Car</title>
</head>
<body>
   <h1>{{$car->title}} </h1>
   <h5>created at:{{$car->created_at}} </h5>
   <h5>update at:{{$car->updated_at}} </h5>
   <h5>{{($car->published)?"Published":"Not Published"}} </h5>
</body>
</html>