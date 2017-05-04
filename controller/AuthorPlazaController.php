<?php

require(ROOT . "model/AuthorPlazaModel.php");

function index()
{
	render('authorPlaza/index', array(
		'authors' => getAllAuthors()
	));
}

function books($author_id)
{
	if ($author_id == null)
	{
		header("LOCATION: /AuthorPlaza/");
	} 
	else 
	{
		render('authorPlaza/books', array(
			'author' => getAuthor($author_id),
			'books' => getAllAuthorBooks($author_id)

		));
	}

}

function addBook($authorId) 
{
	if (isset($_POST['addBook'])) 
	{
		$author_id = $_POST['author_id'];
		$book_title = $_POST['book_title'];
		$book_publisher = $_POST['book_publisher'];
		$book_summary = $_POST['book_summary'];

		$result = addNewBook($author_id, $book_title, $book_publisher, $book_summary);

		if($result == "Successfully")
		{
			header("LOCATION: /AuthorPlaza/books/$author_id");
		}
	}

	else 
	{
		if ($authorId == null)
		{
			header("LOCATION: /AuthorPlaza/");
		} 
		else
		{
			render('authorPlaza/add', array(
				'authors' => getAllAuthors(),
				'authorFromBookPage' => $authorId
			));
		}
	}

}

function editBook($book_id)
{
	if ($book_id == null)
	{
		header("LOCATION: /AuthorPlaza/");
	} 
	else 
	{
		render('authorPlaza/edit', array(
			'authors' => getAllAuthors(),
			'book' => getBook($book_id)
		));
	}

}

function saveBook()
{
	// Variables that we got from our edit form
	$book_id = $_POST['book_id'];
	$author_id = $_POST['author_id'];
	$book_title = $_POST['book_title'];
	$book_publisher = $_POST['book_publisher'];
	$book_summary = $_POST['book_summary'];

	$result = editSaveBook($book_id, $author_id, $book_title, $book_publisher, $book_summary);

	if($result == "Successfully")
	{
		header("LOCATION: /AuthorPlaza/books/$author_id");
	}

}

function deleteBook($book_id)
{

	$author = getBook($book_id);

	$result = removeBook($book_id);

	if($result == "Successfully")
	{
		header("LOCATION: /AuthorPlaza/books/".$author['author_id']."");

	}

}
