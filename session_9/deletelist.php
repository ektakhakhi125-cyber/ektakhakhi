<?php
require_once "auth.php";

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] !== "DELETE") {
    http_response_code(405);

    echo json_encode([
        "success" => false,
        "message" => "Only DELETE requests are allowed"
    ]);

    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["wishlist_id"])) {
    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => "wishlist_id is required"
    ]);

    exit;
}

$wishlistId = (int)$data["wishlist_id"];

$file = "wishlist.json";

if (!file_exists($file)) {
    http_response_code(404);

    echo json_encode([
        "success" => false,
        "message" => "Wishlist file not found"
    ]);

    exit;
}

$wishlist = json_decode(file_get_contents($file), true);

$found = false;
$deletedItem = null;

foreach ($wishlist as $key => $item) {

    if ((int)$item["wishlist_id"] === $wishlistId) {

        $deletedItem = $item;

        unset($wishlist[$key]);

        $found = true;

        break;
    }
}

if (!$found) {
    http_response_code(404);

    echo json_encode([
        "success" => false,
        "message" => "Wishlist item not found"
    ]);

    exit;
}

$wishlist = array_values($wishlist);

file_put_contents(
    $file,
    json_encode($wishlist, JSON_PRETTY_PRINT)
);

echo json_encode([
    "success" => true,
    "message" => "Wishlist item deleted successfully",
    "deleted_item" => $deletedItem
]);
?>

