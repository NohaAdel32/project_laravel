<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trashed List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include ('includes.nav2')
<div class="container">
  <h2>Trashed List</h2>
  <table class="table table-hover">
    <thead>
      <tr>
       
        <th>Title</th>
        <th>Description</th>
        <th>Published</th>
        <th>Create at</th>
        <th>Update at</th>
        <th>Restore</th>
        <th>Delete</th>

      </tr>
    
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        <td>{{ $post->posttitle }}</td>
        <td>{{ $post->description }}</td>
       
        <td>
        @if($post->published)
          yes
      @else
         no
       @endif
        </td>
        <td>{{ $post->created_at }}</td>
        <td>{{ $post->updated_at }}</td>
        <td><a href="restorePost/{{ $post->id }}">Restore</a></td>
        <td><a href="forceDelete/{{ $post->id }}" onclick="return confirm('Are you sure you want to delete?')">Force Delete</a></td>
      </tr>
      @endforeach
    
    </tbody>
  </table>
</div>

</body>
</html>
