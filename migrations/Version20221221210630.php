<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221221210630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation avec la table internaute au depart de la table Bloc en ManyToMany';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bloc_internaute (bloc_id INT NOT NULL, internaute_id INT NOT NULL, INDEX IDX_894E8E5A5582E9C0 (bloc_id), INDEX IDX_894E8E5ACAF41882 (internaute_id), PRIMARY KEY(bloc_id, internaute_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bloc_internaute ADD CONSTRAINT FK_894E8E5A5582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bloc_internaute ADD CONSTRAINT FK_894E8E5ACAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bloc_internaute DROP FOREIGN KEY FK_894E8E5A5582E9C0');
        $this->addSql('ALTER TABLE bloc_internaute DROP FOREIGN KEY FK_894E8E5ACAF41882');
        $this->addSql('DROP TABLE bloc_internaute');
    }
}
