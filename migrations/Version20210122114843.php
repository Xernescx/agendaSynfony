<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210122114843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contacto (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nombre VARCHAR(100) DEFAULT NULL, apellido VARCHAR(100) DEFAULT NULL, correo VARCHAR(200) NOT NULL, telefono VARCHAR(14) DEFAULT NULL, tipo VARCHAR(12) NOT NULL, notas VARCHAR(1000) DEFAULT NULL)');
        $this->addSql('DROP TABLE persona');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE persona (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nombre VARCHAR(100) DEFAULT NULL COLLATE BINARY, apellido VARCHAR(100) DEFAULT NULL COLLATE BINARY, correo VARCHAR(200) NOT NULL COLLATE BINARY, notas VARCHAR(1000) DEFAULT NULL COLLATE BINARY, telefono VARCHAR(13) NOT NULL COLLATE BINARY)');
        $this->addSql('DROP TABLE contacto');
    }
}
