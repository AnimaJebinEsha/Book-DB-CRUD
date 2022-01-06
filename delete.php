
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = file_get_contents('books.json');
    $books = json_decode($data, true);

    foreach ($books as $i => $book) {
        if ($book['id'] == $id) {
            unset($books[$i]);
            $save = json_encode(array_values($books), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            file_put_contents('books.json', $save);
            break;
        }
    }
    header('Location: index.php');
}
die();
?>