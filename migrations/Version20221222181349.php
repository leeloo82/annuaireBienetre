<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221222181349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation avec la table Images pour le logo en partant de la Prestataire en OneToOne';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataire ADD logo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480F98F144A FOREIGN KEY (logo_id) REFERENCES images (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_60A26480F98F144A ON prestataire (logo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480F98F144A');
        $this->addSql('DROP INDEX UNIQ_60A26480F98F144A ON prestataire');
        $this->addSql('ALTER TABLE prestataire DROP logo_id');
    }
}
