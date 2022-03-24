<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220315153235 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7BCF5E72D');
        $this->addSql('DROP INDEX IDX_3BAE0AA7BCF5E72D ON event');
        $this->addSql('ALTER TABLE event DROP categorie_id, DROP date_debut, DROP date_fin, DROP prix');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD categorie_id INT DEFAULT NULL, ADD date_debut DATETIME DEFAULT NULL, ADD date_fin DATETIME DEFAULT NULL, ADD prix DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7BCF5E72D ON event (categorie_id)');
    }
}
