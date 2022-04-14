<?php require_once 'db.php' ?>
<?php include_once 'header.php' ?>
<?php
$query = "SELECT * FROM `books` WHERE `book_id` = " . $_GET['id'];
$book = $db->query($query)->fetch();
?>
<?php
if (isset($_POST['save'])) {
  $book_title = $_POST['book-name'];
  $book_title_sort = $_POST['book-sort-name'];
  $book_description = $_POST['book-description'];
  $book_year = intval($_POST['publish-year']);
  $book_pages = intval($_POST['book-pages']);
  $id = $_GET['id'];

  $query = "UPDATE `books` SET `book_title`=?,`book_title_sort`=?,`book_year`=?,`book_description`=?,`book_pages`= ? WHERE `book_id`= ? ;";
  $para = array($book_title, $book_title_sort, $book_year, $book_description, $book_pages, $id);
  $prepare_query = $db->prepare($query);
  $prepare_query->execute($para);

  header('Location: ' . 'book.php?id=' . $id);
}
?>
<main>
  <h1 class="main_heading">Edit -</h1>
  <form method="POST" action="#" class="addbook-">
    <div class="addbook_group">
      <label for="book-name">Book Name</label>
      <input type="text" name="book-name" id="book-name" value="<?php echo $book['book_title']; ?>" required />
    </div>
    <div class="addbook_group">
      <label for="book-sort-name">Book Sort Name</label>
      <input type="text" name="book-sort-name" id="book-sort-name" value="<?php echo $book['book_title_sort']; ?>" required />
    </div>
    <div class="addbook_group">
      <label for="publish-year">Publish Year</label>
      <input value="<?php echo $book['book_year']; ?>" type="number" name="publish-year" id="publish-year" required />
    </div>
    <div class="addbook_group">
      <label for="book-pages">Book Pages</label>
      <input value="<?php echo $book['book_pages']; ?>" type="number" name="book-pages" id="book-pages" required />
    </div>
    <div class="addbook_group">
      <label for="book-description">Book Description</label>
      <textarea name="book-description" id="book-description" required><?php echo $book['book_description']; ?></textarea>
    </div>
    <div class="addbook_group">
      <input type="submit" name="save" value="Save" />
    </div>
  </form>
</main>
<?php include_once 'footer.php'; ?>