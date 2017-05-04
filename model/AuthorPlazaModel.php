<?php

function getAllAuthors() 
{
	$db = openDatabaseConnection("author_plaza");

 	$sql = "SELECT * FROM authors";
    $query = $db->prepare($sql);
    $query->execute();

	$db = null;

	return $query->fetchAll();
}

function getAuthor($author_id) 
{

	$db = openDatabaseConnection("author_plaza");

	$sql = "SELECT * FROM `authors` WHERE `author_id` = (:author_id)";

	$stmt = $db->prepare($sql);

	$stmt->bindParam(':author_id', $author_id);

	$stmt->execute();

	$db = null;

	return $stmt->fetch(PDO::FETCH_ASSOC);

}

function getAllAuthorBooks($author_id) 
{

	$db = openDatabaseConnection("author_plaza");

	$sql = "SELECT * FROM `books` WHERE `author_id` = (:author_id)";

    $query = $db->prepare($sql);
    $query->bindParam(':author_id', $author_id);
    $query->execute();

	$db = null;

	return $query->fetchAll();

}

function addNewBook($author_id, $book_title, $book_publisher, $book_summary) 
{
	// Coonect to database!
	$db = openDatabaseConnection("author_plaza");

	// We want to create new birthday in the calendar
	$sql = "INSERT INTO `books` (`author_id`, `book_title`, `book_publisher`, `book_summary`) VALUES (:author_id, :book_title, :book_publisher, :book_summary)";

	$stmt = $db->prepare($sql);

	$stmt->bindParam(':author_id', $author_id);
	$stmt->bindParam(':book_title', $book_title);
	$stmt->bindParam(':book_publisher', $book_publisher);
	$stmt->bindParam(':book_summary', $book_summary);

	$stmt->execute();

	$db = null;

	return "Successfully";

}

function getBook($book_id) 
{
	// Coonect to database!
	$db = openDatabaseConnection("author_plaza");

	// Select the person whiche we want to change!
	$sql = "SELECT * FROM `books` WHERE `book_id` = (:book_id)";

	$stmt = $db->prepare($sql);

	$stmt->bindParam(':book_id', $book_id);

	$stmt->execute();

	$db = null;

	return $stmt->fetch(PDO::FETCH_ASSOC);

}

function editSaveBook($book_id, $author_id, $book_title, $book_publisher, $book_summary) 
{
	// Coonect to database!
	$db = openDatabaseConnection("author_plaza");

	$sql = "UPDATE `books` SET `author_id` = (:author_id),`book_title` = (:book_title),`book_publisher` = (:book_publisher),`book_summary` = (:book_summary) WHERE `book_id` = (:book_id)";

	$stmt = $db->prepare($sql);

	$stmt->bindParam(':book_id', $book_id);
	$stmt->bindParam(':author_id', $author_id);
	$stmt->bindParam(':book_title', $book_title);
	$stmt->bindParam(':book_publisher', $book_publisher);
	$stmt->bindParam(':book_summary', $book_summary);

	$stmt->execute();

	$db = null;

	return "Successfully";

}

function removeBook($book_id) 
{
	// Coonect to database!
	$db = openDatabaseConnection("author_plaza");

	$sql = "DELETE FROM `books` WHERE `book_id` = (:book_id)";

	$stmt = $db->prepare($sql);

	$stmt->bindParam(':book_id', $book_id);

	$stmt->execute();

	$db = null;

	return "Successfully";


}