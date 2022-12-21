<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221221211423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation avec la table Promotion au depart de la table CategorieServices en OneToMany';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion ADD categorie_services_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1710B80C8 FOREIGN KEY (categorie_services_id) REFERENCES categorie_services (id)');
        $this->addSql('CREATE INDEX IDX_C11D7DD1710B80C8 ON promotion (categorie_services_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1710B80C8');
        $this->addSql('DROP INDEX IDX_C11D7DD1710B80C8 ON promotion');
        $this->addSql('ALTER TABLE promotion DROP categorie_services_id');
    }
}
