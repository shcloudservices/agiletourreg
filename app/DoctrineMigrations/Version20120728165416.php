<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120728165416 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE Pago (id INT AUTO_INCREMENT NOT NULL, banco VARCHAR(255) NOT NULL, tipoTransaccion INT NOT NULL, numeroTransaccion VARCHAR(10) NOT NULL, PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE usuario ADD pago_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D63FB8380 FOREIGN KEY (pago_id) REFERENCES Pago (id)");
        $this->addSql("CREATE UNIQUE INDEX UNIQ_2265B05D63FB8380 ON usuario (pago_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D63FB8380");
        $this->addSql("DROP TABLE Pago");
        $this->addSql("ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D63FB8380");
        $this->addSql("DROP INDEX UNIQ_2265B05D63FB8380 ON usuario");
        $this->addSql("ALTER TABLE usuario DROP pago_id");
    }
}