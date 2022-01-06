<?php

$data = file_get_contents('books.json');
$books = json_decode($data, true);

if (isset($_POST['search']))
{
    $search = $_POST['search'];
    $search_length = strlen($search);

    $search_item = array();
    foreach ($books as $key => $book)
    {
        if(explode(" ", strtolower($search)) == explode(" ", strtolower($book['title'])))
        {
            array_push($search_item, $book);
        }
    }
    if ($search_length != 0)
    {
        $books = $search_item;
    }
}
?>


<! DOCTYPE html>
    <html>

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

        <div class="container">
            <table style="width: 100%;">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Available</th>
                    <th>Pages</th>
                    <th>ISBN</th>
                    <th>Action</th>
                </tr>

                <?php foreach ($books as $key => $value) : ?>
                    <tr>
                        <td> <?php echo $value['id'] ?> </td>
                        <td> <?php echo $value['title'] ?> </td>
                        <td> <?php echo $value['author'] ?> </td>
                        <td> <?php
                                if ($value['available'] == 1) echo 'Yes';
                                else echo 'No';
                                ?> </td>
                        <td> <?php echo $value['pages'] ?> </td>
                        <td> <?php echo $value['isbn'] ?> </td>
                        <td>
                            <button>Edit</button>
                            <a href="<?php echo 'delete.php?id=' . $value['id']; ?>">
                                <button>Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>

        <div style="display: flex; flex-direction: column; width: 100%; margin: 40px; justify-content: center; align-items: center;">
                <form action="/index.php" name="form" method="post">
                    <input type="text" name="search" id="search" style="height: 30px; width: 400px;">
                    <input type="submit" value="Search" style="height: 30px; width: 100px;">
                </form>
        </div>
    </body>

    </html>