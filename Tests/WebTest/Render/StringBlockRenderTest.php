<?php

namespace Symfony\Cmf\Bundle\BlockBundle\Tests\WebTest\Render;

use Symfony\Cmf\Component\Testing\Functional\BaseTestCase;

/**
 * @author Nicolas Bastien <nbastien@prestaconcept.net>
 */
class StringBlockRenderTest extends BaseTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->db('PHPCR')->loadFixtures(array(
            'Symfony\Cmf\Bundle\BlockBundle\Tests\Resources\DataFixtures\Phpcr\LoadBlockData',
        ));
        $this->client = $this->createClient();
    }

    public function testRenderStringTwig()
    {
        $crawler = $this->client->request('GET', '/render-string-test');

        $res = $this->client->getResponse();
        $this->assertEquals(200, $res->getStatusCode());

        $this->assertCount(1, $crawler->filter('html:contains("string-block-1-body")'));
    }
}
