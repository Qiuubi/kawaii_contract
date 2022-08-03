<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220728093911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract ADD registration VARCHAR(255) DEFAULT NULL, ADD marketing_rate VARCHAR(255) DEFAULT NULL, ADD reports VARCHAR(255) DEFAULT NULL, ADD sell_objectives VARCHAR(255) DEFAULT NULL, ADD stocks VARCHAR(255) DEFAULT NULL, ADD retention_period VARCHAR(255) DEFAULT NULL, ADD no_competition VARCHAR(255) DEFAULT NULL, ADD sell_internet VARCHAR(255) DEFAULT NULL, ADD supply_orders VARCHAR(255) DEFAULT NULL, ADD delivery VARCHAR(255) DEFAULT NULL, ADD reception VARCHAR(255) DEFAULT NULL, ADD payment VARCHAR(255) DEFAULT NULL, ADD penalties VARCHAR(255) DEFAULT NULL, ADD retention_title VARCHAR(255) DEFAULT NULL, ADD liability VARCHAR(255) DEFAULT NULL, ADD insurance VARCHAR(255) DEFAULT NULL, ADD termination LONGTEXT DEFAULT NULL, ADD termination_consequences LONGTEXT DEFAULT NULL, ADD partial_invalidity VARCHAR(255) DEFAULT NULL, ADD entire_agreement VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract DROP registration, DROP marketing_rate, DROP reports, DROP sell_objectives, DROP stocks, DROP retention_period, DROP no_competition, DROP sell_internet, DROP supply_orders, DROP delivery, DROP reception, DROP payment, DROP penalties, DROP retention_title, DROP liability, DROP insurance, DROP termination, DROP termination_consequences, DROP partial_invalidity, DROP entire_agreement');
    }
}
