<header class="books">
	<h1>Add Book</h1>
</header>
<nav>
	<ul>
		<li><a href="/AuthorPlaza/"><h4>Home</h4></a></li>
	</ul>
	
</nav>
<div class="form">
<form action="/AuthorPlaza/saveBook" method="POST">
	<div>
		<label>Author</label>
		<select name="author_id">
			<?php foreach($authors as $author) { 

				if ($book["author_id"] == $author["author_id"])
				{ ?>
					<option selected="selected" value="<?=$author["author_id"]?>"><?=$author["author_name"]?></option>
				<?php 
				} 
				else
				{ 
				?>
					<option value="<?=$author["author_id"]?>"><?=$author["author_name"]?></option>
				<?php 
				} 
			} 
			?>
		</select>
	</div>
	<div><label>Title</label><input type="text" name="book_title" value="<?= $book["book_title"]; ?>"></div>
	<div><label>Publisher</label><input type="text" name="book_publisher" value="<?= $book["book_publisher"]; ?>"></div>
	<div><label>Summary</label><textarea name="book_summary"><?= $book["book_summary"]; ?></textarea></div>
	<input type="hidden" name="book_id" value="<?= $book["book_id"]; ?>">
	<div><label>&nbsp;</label><input type="submit" value="submit" name="saveBook"></div>
</form>
</div>
		