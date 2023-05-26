<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525230532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE intervention CHANGE codectl codectl INT DEFAULT NULL, CHANGE referencepd referencepd INT DEFAULT NULL, CHANGE codetech codetech INT DEFAULT NULL');
        $this->addSql('ALTER TABLE intervention RENAME INDEX idx_1234567890 TO IDX_D11814ABFB1C06CD');
        $this->addSql('ALTER TABLE intervention RENAME INDEX idx_0987654321 TO IDX_D11814AB4AD6D84D');
        $this->addSql('ALTER TABLE intervention RENAME INDEX idx_2468135790 TO IDX_D11814AB23F71E42');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE intervention CHANGE codectl codectl INT NOT NULL, CHANGE referencepd referencepd INT NOT NULL, CHANGE codetech codetech INT NOT NULL');
        $this->addSql('ALTER TABLE intervention RENAME INDEX idx_d11814ab4ad6d84d TO IDX_0987654321');
        $this->addSql('ALTER TABLE intervention RENAME INDEX idx_d11814abfb1c06cd TO IDX_1234567890');
        $this->addSql('ALTER TABLE intervention RENAME INDEX idx_d11814ab23f71e42 TO IDX_2468135790');
    }
}
