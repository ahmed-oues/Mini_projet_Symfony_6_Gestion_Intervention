<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525171307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, codectl_id INT NOT NULL, referencepd_id INT NOT NULL, codetech_id INT NOT NULL, numinterv INT NOT NULL, dateinterv DATE NOT NULL, INDEX IDX_D11814ABBD6D3B11 (codectl_id), INDEX IDX_D11814AB3852E31F (referencepd_id), INDEX IDX_D11814ABE2C7C4DD (codetech_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814ABBD6D3B11 FOREIGN KEY (codectl_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB3852E31F FOREIGN KEY (referencepd_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814ABE2C7C4DD FOREIGN KEY (codetech_id) REFERENCES technicien (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE intervention');
    }
}
