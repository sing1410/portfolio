<?php require_once 'db.php' ?>
<?php include_once 'header.php' ?>

<?php
if (isset($_POST['add'])) {
  $book_name = $_POST['book-name'];
  $book_name_sort = $_POST['book-sort-name'];
  $description = $_POST['book-description'];
  $publish_year = intval($_POST['publish-year']);
  $book_pages = intval($_POST['book-pages']);

  // QUERY
  $query = "INSERT INTO `books`(`book_title`, `book_title_sort`, `book_year`, `book_description`, `book_pages`) VALUES (?,?,?,?,?)";
  $para = array($book_name, $book_name_sort, $publish_year, $description, $book_pages);
  $prepared_query = $db->prepare($query);
  $prepared_query->execute($para);

  // HOMEPAGE
  header('Location: ' . 'index.php');
}
?>
<main>
  <h1 class="main_heading">Add New</h1>
  <form method="POST" action="#" class="addbook-form">
    <div class="addbook-form__group">
      <label for="book-name">Book Name</label>
      <input type="text" name="book-name" id="book-name" required />
    </div>
    <div class="addbook-form__group">
      <label for="book-sort-name">Book Sort Name</label>
      <input type="text" name="book-sort-name" id="book-sort-name" required />
    </div>
    <div class="addbook-form__group">
      <label for="publish-year">Publish Year</label>
      <input type="number" name="publish-year" id="publish-year" required />
    </div>
    <div class="addbook-form__group">
      <label for="book-pages">Book Pages</label>
      <input type="number" name="book-pages" id="book-pages" required />
    </div>
    <div class="addbook-form__group">
      <label for="book-description">Book Description</label>
      <textarea name="book-description" id="book-description" required></textarea>
    </div>
    <div class="addbook-form__group">
      <input type="submit" name="add" value="Add Book" />
      <input type="reset" value="Reset Form" />
    </div>
  </form>
</main>
<?php include_once 'footer.php'; ?>