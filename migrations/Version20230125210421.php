<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230125210421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation entite codepostal/commune Onetomany + codepostal/localite manyToONe';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE code_postal DROP FOREIGN KEY FK_CC94AC37131A4F72');
        $this->addSql('DROP INDEX IDX_CC94AC37131A4F72 ON code_postal');
        $this->addSql('ALTER TABLE code_postal DROP commune_id');
        $this->addSql('ALTER TABLE commune ADD code_postal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EEB2B59251 FOREIGN KEY (code_postal_id) REFERENCES code_postal (id)');
        $this->addSql('CREATE INDEX IDX_E2E2D1EEB2B59251 ON commune (code_postal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE code_postal ADD commune_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE code_postal ADD CONSTRAINT FK_CC94AC37131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('CREATE INDEX IDX_CC94AC37131A4F72 ON code_postal (commune_id)');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EEB2B59251');
        $this->addSql('DROP INDEX IDX_E2E2D1EEB2B59251 ON commune');
        $this->addSql('ALTER TABLE commune DROP code_postal_id');
    }
}
