<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241208112936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job CHANGE date_end date_end DATE DEFAULT NULL, CHANGE company_logo company_logo VARCHAR(250) DEFAULT NULL, CHANGE memory_photo memory_photo VARCHAR(250) DEFAULT NULL');
        $this->addSql('ALTER TABLE study CHANGE school_logo school_logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job CHANGE company_logo company_logo VARCHAR(250) DEFAULT \'NULL\', CHANGE memory_photo memory_photo VARCHAR(250) DEFAULT \'NULL\', CHANGE date_end date_end DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE study CHANGE school_logo school_logo VARCHAR(255) DEFAULT \'NULL\'');
    }
}
