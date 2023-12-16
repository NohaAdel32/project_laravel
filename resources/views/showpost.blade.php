<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
</head>
<body>
   <h1>{{$post->posttitle}} </h1>
   <h3>{{$post->description}} </h3>
   <h5>created at:{{$post->created_at}} </h5>
   <h5>update at:{{$post->updated_at}} </h5>
   <h5>{{($post->published)?"Published":"Not Published"}} </h5>
</body>
</html>