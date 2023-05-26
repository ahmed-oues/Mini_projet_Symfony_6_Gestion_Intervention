<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525192905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, codeclt INT NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, adresse VARCHAR(30) NOT NULL, cp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, codectl INT DEFAULT NULL, referencepd INT DEFAULT NULL, codetech INT DEFAULT NULL, numinterv INT NOT NULL, dateinterv DATE NOT NULL, INDEX IDX_D11814ABFB1C06CD (codectl), INDEX IDX_D11814AB4AD6D84D (referencepd), INDEX IDX_D11814AB23F71E42 (codetech), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(30) NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technicien (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814ABFB1C06CD FOREIGN KEY (codectl) REFERENCES client (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB4AD6D84D FOREIGN KEY (referencepd) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB23F71E42 FOREIGN KEY (codetech) REFERENCES technicien (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814ABFB1C06CD');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB4AD6D84D');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB23F71E42');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE technicien');
    }
}
