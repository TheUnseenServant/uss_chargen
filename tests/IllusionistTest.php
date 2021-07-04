<?php declare(strict_types=1);

// IllusionistTest.php

require_once dirname(__DIR__) . '/lib/character.php';
require_once dirname(__DIR__) . '/lib/mins.php';

use PHPUnit\Framework\TestCase;

final class IllusionistTest extends TestCase
{
  public function testCanBeCreated(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "illusionist";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'tn';
    $character  = new Character($class, $mins, $race, $gender, $alignment);

    $this->assertInstanceOf(Character::class, $character);
  }


  public function testSetAttributes(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "illusionist";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'tn';
    $character  = new Character($class, $mins, $race, $gender, $alignment);

    $this->assertEquals('illusionist',  $character->class);
    $this->assertEquals('human',        $character->race);
    $this->assertEquals('female',       $character->gender);
  }

  public function testSetIllusionistStats(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "illusionist";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'tn';
    $character  = new Character($class, $mins, $race, $gender, $alignment);
    
    $this->assertGreaterThan(5,   $character->stats['strength']);
    $this->assertGreaterThan(14,  $character->stats['intelligence']);
    $this->assertGreaterThan(5,   $character->stats['wisdom']);
    $this->assertGreaterThan(15,  $character->stats['dexterity']);
    $this->assertGreaterThan(2,   $character->stats['constitution']);
    $this->assertGreaterThan(5,   $character->stats['charisma']);
  }


}