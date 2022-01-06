<?php

if(isset($_GET['title'])) {

    $json = file_get_contents('books.json');
    $db = json_decode($json, true);

    $available = true;
    if($_GET['available'] == 'No' || $_GET['available'] == 'no' || $_GET['available'] == 'NO' || $_GET['available'] == 'nO') $available = false;

    $books = array(

        'id' => end($db)['id']+1,
        'title' => $_GET['title'],
        'author' => $_GET['author'],
        'available' => $available,
        'pages' => $_GET['pages'],
        'isbn' => $_GET['isbn']
    );

    array_push($db, $books);
    file_put_contents('books.json', json_encode($db));
    header("Location: /index.php");
}

?>


<! DOCTYPE html>
    <html lang="en">

    <head>
        <title>BOOKS</title>

        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="navbar">
            <div class="nav-left">
                <div style="display:flex; width: 100%; height:100%; justify-content: center; align-items: center;">
                    <h2>BOOKS</h2>
                </div>
            </div>
            <div class="nav-right">
                <nav style="margin-right: 100px;">
                    <a href="/index.php" class="nav-item">HOME</a>
                    <a href="/create.php" class="nav-item">CREATE</a>
                </nav>
            </div>
        </div>

        <div class="content">
            <form class="content" style="width: 60% !important;" name="form" method="get" action="/create.php">
                <table style="width: 70%;">
                    <tr class="tr-form">
                        <td class="table-head">Title:</td>
                        <td class="table-body"><input name="title" id="title" class="is-fullwidth" type="text" required></td>
                    </tr>
                    <tr class="tr-form">
                        <td class="table-head">Author:</td>
                        <td class="table-body"><input name="author" id="author" class="is-fullwidth" type="text" required></td>
                    </tr>
                    <tr class="tr-form">
                        <td class="table-head">Available:</td>
                        <td class="table-body"><input name="available" id="available" class="is-fullwidth" type="text" required></td>
                    </tr>
                    <tr class="tr-form">
                        <td class="table-head">Pages:</td>
                        <td class="table-body"><input name="pages" id="pages" class="is-fullwidth" type="number" required></td>
                    </tr>
                    <tr class="tr-form">
                        <td class="table-head">ISBN:</td>
                        <td class="table-body"><input name="isbn" id="isbn" class="is-fullwidth" type="number" required></td>
                    </tr>
                    <tr class="tr-form">
                        <td style="border: 0px !important;"></td>
                        <td style="border: 0px !important;"><input type="submit" value="Submit" style="float: right;"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>

    </html>