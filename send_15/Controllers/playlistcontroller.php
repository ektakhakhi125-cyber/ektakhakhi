<?php

require_once __DIR__ . '/../models/Playlist.php';

class PlaylistController
{
    private $playlist;

    public function __construct()
    {
        $this->playlist = new Playlist();
    }

    // READ
    public function index()
    {
        $playlists = $this->playlist->getAll();

        require_once __DIR__ . '/../views/playlist/index.php';
    }

    // CREATE FORM
    public function create()
    {
        require_once __DIR__ . '/../views/playlist/create.php';
    }

    // STORE
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = trim($_POST['name']);
            $description = trim($_POST['description']);

            if (!empty($name) && !empty($description)) {

                $this->playlist->create($name, $description);

                header("Location: index.php");
                exit;
            }

            echo "Please fill all fields.";
        }
    }

    // EDIT FORM
    public function edit($id)
    {
        $playlist = $this->playlist->getById($id);

        require_once __DIR__ . '/../views/playlist/edit.php';
    }

    // UPDATE
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);

            $this->playlist->update(
                $id,
                $name,
                $description
            );

            header("Location: index.php");
            exit;
        }
    }

    // DELETE
    public function delete($id)
    {
        $this->playlist->delete($id);

        header("Location: index.php");
        exit;
    }
}