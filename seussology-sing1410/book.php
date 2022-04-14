<?php require_once 'db.php' ?>
<?php include_once 'header.php' ?>
<?php
$query = "SELECT * FROM `books` WHERE `book_id` = " . $_GET['id'];
$book = $db->query($query)->fetch();
$quotequery = "SELECT * FROM `quotes` WHERE `book_id` = " . $_GET['id'];
$quotes = $db->query($quotequery)->fetchAll();
?>
<main>
  <h1 class="main_heading"><?php echo $book['book_title']; ?></h1>
  <div class="details">
    <div class="details_img">
      <img src="book-covers/<?php echo $book['book_image'] ?>" alt="" />
    </div>
    <div class="details_meta">
      <div class="details_meta_pages">&nbsp;<?php echo $book['book_pages'] ?></div>
      <div class="details_meta_published">&nbsp;<?php echo $book['book_year'] ?></div>
    </div>
    <div class="details_description">
      <div class="details_heading">Description</div>
      <?php echo $book['book_description'] ?>
    </div>
    <?php if (count($quotes) > 0) { ?>
      <div class="details_quotes">
        <div class="details_heading">Quotes</div>
        <?php foreach ($quotes as $quote) : ?>
          <div class="details_quotes_quote">
            <?php echo $quote['quote']; ?>
          </div>
        <?php endforeach ?>
      </div>
    <?php } ?>
    <div class="details_options">
      <a href="<?php echo "edit.php?id=" . $book['book_id'] ?>" class="edit">Edit</a>
      <a href="<?php echo "delete.php?id=" . $book['book_id'] ?>" class="delete">Delete</a>
    </div>
  </div>
</main>
<?php include_once 'footer.php'; ?>