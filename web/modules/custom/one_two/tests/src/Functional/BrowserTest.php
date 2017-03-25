<?php

namespace Drupal\Tests\one_two\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Example functional test.
 *
 * @group one_two
 */
class BrowserTest extends BrowserTestBase {
  protected $user;
  public static $modules = ['block', 'node', 'datetime'];

  /**
   * @inheritdoc
   */
  protected function setUp() {

    parent::setUp();

    $this->drupalCreateContentType(['type' => 'page', 'name' => 'Basic page']);
    $this->user = $this->drupalCreateUser([
      'edit own page content',
      'create page content'
    ]);

    $this->drupalPlaceBlock('local_tasks_block');
  }

  /**
   * Test.
   */
  function testDrupalGet() {
    $this->drupalGet('user/register');

    $this->assertSession()->pageTextContains('Create new account');
    $this->assertSession()->fieldExists('Email address');
    $this->assertSession()->fieldExists('Username');
    $this->assertSession()->buttonExists('Create new account');
    $this->assertSession()->pageTextNotContains('Joomla');
  }

}
