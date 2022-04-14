<?php require_once 'db.php' ?>
<?php include_once 'header.php' ?>
<?php

if (isset($_GET['search'])) {
  $sql = 'SELECT * FROM books WHERE book_title LIKE :search';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':search', "%{$_GET['search']}%");
  $stmt->execute();
  $books = $stmt->fetchAll();
} else {
  $sql = 'SELECT * FROM books';
  $result = $db->query($sql);
  $books = $result->fetchAll();
}
?>
<main>
  <div class="main_books">
    <?php if (count($books) > 0) { ?>

      <?php foreach ($books as $book) : ?>

        <a href="<?php echo 'book.php?id=' . $book['book_id']; ?>" class="main_books_book" title="book">

          <?php if ($book['book_image']) { ?>
            <img src="book-covers/<?php echo $book['book_image'] ?>" alt="Book Name" class="main_books_book_img" />
          <?php } else { ?>

            <div class="main_books_book_title"><?php echo $book['book_title'] ?></div>
          <?php } ?>

        </a>

      <?php endforeach ?>
    <?php } ?>
  </div>
</main>
<?php include_once 'footer.php' ?>