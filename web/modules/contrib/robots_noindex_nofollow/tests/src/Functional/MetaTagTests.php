<?php

namespace Drupal\Tests\robots_noindex_nofollow\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Class MetaTagTests.
 *
 * @group robots_noindex_nofollow
 */
class MetaTagTests extends BrowserTestBase {

  /**
   * Module to enable.
   *
   * @var array
   */
  public static $modules = ['robots_noindex_nofollow'];

  /**
   * Test if the expected robots meta tag presents on the front page.
   */
  public function testMetaTagRobotsOnFrontPage() {
    $this->drupalGet('<front>');
    $this->assertResponse(200);
    $xpath = $this->xpath("//meta[@name='robots']");
    $this->assertEqual((string) $xpath[0]->getAttribute('content'), 'noindex, nofollow');
  }

  /**
   * Test if the expected robots meta tag presents on an admin page.
   */
  public function testMetaTagRobotsOnAdminPage() {
    $admin_user = $this->drupalCreateUser(['access administration pages']);
    $this->drupalLogin($admin_user);
    $this->drupalGet('/admin');
    $this->assertResponse(200);
    $xpath = $this->xpath("//meta[@name='robots']");
    $this->assertEqual((string) $xpath[0]->getAttribute('content'), 'noindex, nofollow');
  }

  /**
   * Test if the expected robots meta tag presents on a 403 page.
   */
  public function testMetaTagRobotsOn403Page() {
    $this->drupalGet('/admin');
    $this->assertResponse(403);
    $xpath = $this->xpath("//meta[@name='robots']");
    $this->assertEqual((string) $xpath[0]->getAttribute('content'), 'noindex, nofollow');
  }

  /**
   * Test if the expected robots meta tag presents on a 404 page.
   */
  public function testMetaTagRobotsOn404Page() {
    $this->drupalGet('/a-non-existed-page');
    $this->assertResponse(404);
    $xpath = $this->xpath("//meta[@name='robots']");
    $this->assertEqual((string) $xpath[0]->getAttribute('content'), 'noindex, nofollow');
  }

}
