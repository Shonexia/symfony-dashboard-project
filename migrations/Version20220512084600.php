<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512084600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users_clients (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, client_id_id INT NOT NULL, INDEX IDX_F0C85ABE9D86650F (user_id_id), INDEX IDX_F0C85ABEDC2902E0 (client_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_clients ADD CONSTRAINT FK_F0C85ABE9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_clients ADD CONSTRAINT FK_F0C85ABEDC2902E0 FOREIGN KEY (client_id_id) REFERENCES clients (id)');
        $this->addSql('DROP TABLE task');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, client_id_id INT NOT NULL, INDEX IDX_527EDB259D86650F (user_id_id), INDEX IDX_527EDB25DC2902E0 (client_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB259D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25DC2902E0 FOREIGN KEY (client_id_id) REFERENCES clients (id)');
        $this->addSql('DROP TABLE users_clients');
    }
}
