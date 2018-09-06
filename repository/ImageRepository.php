<?php
require_once '../lib/Repository.php';

/**
 * Datenbankschnittstelle für die Benutzer
 */
class ImageRepository extends Repository
{
    protected $tableName = 'image';

    public function insertImage($galleryId, $type, $description)
    {
        $query = "INSERT INTO image (galleryId, type, description) VALUES (?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('iss', $galleryId, $type, $description);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function updateImage($imageId, $description)
    {
        $query = "UPDATE image SET description = ? WHERE id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('si', $description, $imageId);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function selectImagesByGalleryId($id)
    {
        $query = "SELECT * FROM image WHERE galleryId = ?";

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

    public function selectImageById($id)
    {
        $query = "SELECT * FROM image WHERE id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }


        return $result->fetch_object();;
    }

    public function deleteImagesByGalleryId($id)
    {
        $query = "DELETE FROM image WHERE galleryId = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function deleteImageById($id)
    {
        $query = "DELETE FROM image WHERE id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
}
