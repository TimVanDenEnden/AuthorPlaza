<header>
	<h1>Books</h1>
	<h3><?= $author['author_name'] ?></h3>
</header>
<nav>
	<ul>
		<li><a href="/AuthorPlaza/"><h4>Home</h4></a></li>
		<li><a href="/AuthorPlaza/addBook/<?= $author['author_id'] ?>"><h4>Add book</h4></a></li>
	</ul>
</nav>
<table>
	<tr>
		<th>Title</th>
		<th>Publisher</th>
		<th>Summary</th>
		<th colspan="2">Action</th>
	</tr>
	<?php foreach($books as $book) { ?>
	<tr>
		<td nowrap="true"><?= $book['book_title'] ?></td>
		<td nowrap="true"><?= $book['book_publisher'] ?></td>
		<td><?= $book['book_summary'] ?></td>
		<td><a href="/AuthorPlaza/editBook/<?= $book['book_id'] ?>">Edit</a></td>
		<td><a href="/AuthorPlaza/deleteBook/<?= $book['book_id'] ?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>