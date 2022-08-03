<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220718142802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amendement ADD new_provisions LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE contract ADD language VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE status ADD description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amendement DROP new_provisions');
        $this->addSql('ALTER TABLE contract DROP language');
        $this->addSql('ALTER TABLE status DROP description');
    }
}
