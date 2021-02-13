<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211155758 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__contacto AS SELECT id, notas, nombre, apellido, correo, telefono, tipo FROM contacto');
        $this->addSql('DROP TABLE contacto');
        $this->addSql('CREATE TABLE contacto (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nombre VARCHAR(40) NOT NULL COLLATE BINARY, apellido VARCHAR(50) NOT NULL COLLATE BINARY, correo VARCHAR(120) NOT NULL COLLATE BINARY, tipo VARCHAR(10) NOT NULL COLLATE BINARY, notas CLOB DEFAULT NULL, telefono VARCHAR(16) NOT NULL)');
        $this->addSql('INSERT INTO contacto (id, notas, nombre, apellido, correo, telefono, tipo) SELECT id, notas, nombre, apellido, correo, telefono, tipo FROM __temp__contacto');
        $this->addSql('DROP TABLE __temp__contacto');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__contacto AS SELECT id, nombre, apellido, telefono, correo, tipo, notas FROM contacto');
        $this->addSql('DROP TABLE contacto');
        $this->addSql('CREATE TABLE contacto (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nombre VARCHAR(40) NOT NULL, apellido VARCHAR(50) NOT NULL, correo VARCHAR(120) NOT NULL, tipo VARCHAR(10) NOT NULL, telefono VARCHAR(16) DEFAULT NULL COLLATE BINARY, notas VARCHAR(1000) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO contacto (id, nombre, apellido, telefono, correo, tipo, notas) SELECT id, nombre, apellido, telefono, correo, tipo, notas FROM __temp__contacto');
        $this->addSql('DROP TABLE __temp__contacto');
    }
}
