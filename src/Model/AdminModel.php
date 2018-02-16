<?php

namespace UPLOADIT\Model;


use UPLOADIT\Singleton\ConnectionDB;



class AdminModel {

    private $db;
    private $sql;
    private $statement;
    private $weight;
    private $width;
    private $height;
    private $txt_zone;
    private $gif;


    public function __construct() {

        $this->db = ConnectionDB::getInstance();

    }

    public function readTechnicalSpecifications()
    {

        try {

            $reponse = $this->db->getHandle()->query('SELECT weight, height, width, gif, text_zone FROM format_allocine_habillage_pc WHERE id_format_allocine_habillage_pc = 1');
            $result = $reponse -> fetch();

            var_dump($result['height']);

        } catch (PDOException $e) {

            die('Error->readTechnicalSpecifications() : ' . $e->getMessage());

        }

    }

    public function updateTechnicalSpecifications()
    {

        try {

            if(!$this->db->getHandle()->inTransaction()) {
                $this->db->getHandle()->beginTransaction();
            }

            var_dump('In the matrix');

            $reponse = $this->db->getHandle()->prepare('UPDATE format_allocine_habillage_pc SET weight = ?, height = ?, width= ?, gif = ?, text_zone = ?  WHERE id_format_allocine_habillage_pc = 1');
            $reponse->execute(array(
                $this->weight,
                $this->width,
                $this->height,
                $this->txt_zone,
                $this->gif
            ));




            $reponse = $this->db->getHandle()->prepare('UPDATE format_allocine_habillage_tablette SET weight = ?, height = ?, width= ?, gif = ?, text_zone = ?  WHERE id_format_allocine_habillage_pc = 1');
            $reponse->execute(array(
                17002,
                1052,
                1502,
                1,
                0
            ));

            $this->db->getHandle()->commit();

        } catch (PDOException $e) {

            $this->db->getHandle()->rollBack();
            die('Error->readTechnicalSpecifications() : ' . $e->getMessage());

        }



    }
}