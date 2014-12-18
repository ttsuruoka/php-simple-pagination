<?php
require_once __DIR__ . '/SimplePagination.php';

$db = [
    1 => ['id' => 1],
    2 => ['id' => 2],
    3 => ['id' => 3],
    4 => ['id' => 4],
    5 => ['id' => 5],
    6 => ['id' => 6],
    7 => ['id' => 7],
    8 => ['id' => 8],
    9 => ['id' => 9],
];

$items = [];
$current = (int)$_GET['page'];
$count = 3;

if ($current === 1) {
    $items = [
        $db[1],
        $db[2],
        $db[3],
        $db[4],
    ];
} else if ($current === 2) {
    $items = [
        $db[4],
        $db[5],
        $db[6],
        $db[7],
    ];
} else if ($current === 3) {
    $items = [
        $db[7],
        $db[8],
        $db[9],
    ];
} else {
    $current = 1;
    $items = [
        $db[1],
        $db[2],
        $db[3],
        $db[4],
    ];

}

$pagination = new SimplePagination($current, $count);
$pagination->checkLastPage($items);

?>
<html>
<body>
<h1>SimplePagination Example</h1>
<?php if($pagination->current > 1): ?>
  <a href='?page=<?php echo $pagination->prev ?>'>Previous</a>
<?php else: ?>
  Previous
<?php endif ?>

<?php foreach ($items as $item): ?>
  <a href="<?php echo $item['id'] ?>"><?php echo $item['id'] ?></a>&nbsp;
<?php endforeach ?>

 <?php if(!$pagination->is_last_page): ?>
  <a href='?page=<?php echo $pagination->next ?>'>Next</a>
<?php else: ?>
  Next
<?php endif ?>
</body>
</html>
