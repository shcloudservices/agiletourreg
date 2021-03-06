<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120728171432 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE Presentacion (id INT AUTO_INCREMENT NOT NULL, titulo VARCHAR(255) NOT NULL, resumen LONGTEXT NOT NULL, ruta VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("DROP TABLE Presentation");
        $this->addSql("ALTER TABLE usuario ADD presentacion_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D91BDCCB FOREIGN KEY (presentacion_id) REFERENCES Presentacion (id)");
        $this->addSql("CREATE UNIQUE INDEX UNIQ_2265B05D91BDCCB ON usuario (presentacion_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D91BDCCB");
        $this->addSql("CREATE TABLE Presentation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, summary LONGTEXT NOT NULL, slidesPath VARCHAR(255) NOT NULL, INDEX IDX_8357336BA76ED395 (user_id), PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE Presentation ADD CONSTRAINT FK_8357336BA76ED395 FOREIGN KEY (user_id) REFERENCES usuario (id)");
        $this->addSql("DROP TABLE Presentacion");
        $this->addSql("ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D91BDCCB");
        $this->addSql("DROP INDEX UNIQ_2265B05D91BDCCB ON usuario");
        $this->addSql("ALTER TABLE usuario DROP presentacion_id");
    }
}
