<?php
require_once '../lib/Repository.php';

/**
 * Datenbankschnittstelle für die Benutzer
 */
class GalleryRepository extends Repository
{
    protected $tableName = 'GalleryUtil';

    public function insertGallery($userId, $title, $description, $thumbtype)
    {
        $query = "INSERT INTO gallery (userId, title, description, thumbtype) VALUES (?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('isss', $userId, $title, $description, $thumbtype);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function editGallery($id, $title, $description, $thumbtype)
    {
        $query = "UPDATE gallery SET title = ?, description = ?, thumbtype = ? WHERE id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssi', $title, $description, $thumbtype, $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function galleryExists($id)
    {
        $query = "SELECT COUNT(*) AS total FROM gallery WHERE id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        $row = $result->fetch_object();
        $count = $row->total;
        return $count >= 1;
    }

    public function selectGalleryById($id)
    {
        $query = "SELECT * FROM gallery WHERE id = ? LIMIT 1";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        return $result->fetch_object();
    }

    public function getGalleriesByUserId($id)
    {
        $query = "SELECT * FROM gallery WHERE userId = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function deleteGallery($id)
    {
        $query = "DELETE FROM gallery WHERE id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function hasImages($id)
    {
        $query = "SELECT COUNT(*) AS total FROM image WHERE galleryId = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        $row = $result->fetch_object();
        $count = $row->total;
        return $count >= 1;
    }
}
