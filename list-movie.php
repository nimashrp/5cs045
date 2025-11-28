<!doctype html>
<html lang="en">
  <body>
    <h1>List of ALL my movie!!!</h1>
    <?php
      // Connect to database
      include 'db.php';
      
      // Run SQL query
      $sql = "SELECT * FROM movie ORDER BY released_date";
      $results = mysqli_query($mysqli, $sql);
    ?>
      
      <form action="search-movie.php" method="post">
  <input type="text" name="keywords" placeholder="Search">
  <input type="submit" value="Go!">
</form>

    <table>
      <?php while($a_row = mysqli_fetch_assoc($results)):?>
        <tr>
          <td><a href="movie.php?id=<?=$a_row['movie_id']?>"><?=$a_row['movie_name']?></a></td>
          <td><?=$a_row['price']?></td>
		  <td><?=$a_row['genre']?></td>
           <td><?=$a_row[' released_date']?></td>
         </tr>
            
      <?php endwhile;?>
    </table>
      <a href="add-movie-form.php" class="btn btn-primary">Add movie</a>
  </body>
</html>