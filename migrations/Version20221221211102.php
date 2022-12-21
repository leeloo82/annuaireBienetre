<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221221211102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation avec la table image au depart de la table CategorieServices en OneToOne';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_services ADD images_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie_services ADD CONSTRAINT FK_4BB5A003D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4BB5A003D44F05E5 ON categorie_services (images_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_services DROP FOREIGN KEY FK_4BB5A003D44F05E5');
        $this->addSql('DROP INDEX UNIQ_4BB5A003D44F05E5 ON categorie_services');
        $this->addSql('ALTER TABLE categorie_services DROP images_id');
    }
}
