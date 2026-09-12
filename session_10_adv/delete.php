
<?
$stmt = $pdo->prepare(
    'DELETE FROM users WHERE id = :id'
);

$stmt->execute([
    ':id' => $userId
]);
?>


