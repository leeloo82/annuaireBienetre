<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221221201053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation avec la table categorieServices au depart de la table prestaire en ManyToMany';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prestataire_categorie_services (prestataire_id INT NOT NULL, categorie_services_id INT NOT NULL, INDEX IDX_E453C499BE3DB2B7 (prestataire_id), INDEX IDX_E453C499710B80C8 (categorie_services_id), PRIMARY KEY(prestataire_id, categorie_services_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestataire_categorie_services ADD CONSTRAINT FK_E453C499BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_categorie_services ADD CONSTRAINT FK_E453C499710B80C8 FOREIGN KEY (categorie_services_id) REFERENCES categorie_services (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataire_categorie_services DROP FOREIGN KEY FK_E453C499BE3DB2B7');
        $this->addSql('ALTER TABLE prestataire_categorie_services DROP FOREIGN KEY FK_E453C499710B80C8');
        $this->addSql('DROP TABLE prestataire_categorie_services');
    }
}
