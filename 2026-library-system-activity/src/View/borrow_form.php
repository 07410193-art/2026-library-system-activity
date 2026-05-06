<?php
namespace App\View;

class borrow_form
{
    
    public function displayForm()
    {
        echo "<h1>Borrow a Book</h1>";
        echo "<form method='post' action='borrow_process.php'>";
        echo "<label for='student_id'>Student ID:</label><br>";
        echo "<input type='text' id='student_id' name='student_id'><br><br>";
        echo "<label for='book_id'>Book ID:</label><br>";
        echo "<input type='text' id='book_id' name='book_id'><br><br>";
        echo "<label for='days'>Number of Days to Borrow:</label><br>";
        echo "<input type='text' id='days' name='days'><br><br>";
        echo "<input type='submit' value='Borrow Book'>";
        echo "</form>";
    }
}

