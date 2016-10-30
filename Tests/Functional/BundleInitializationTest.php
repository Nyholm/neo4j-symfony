<?php

namespace GraphAware\Neo4jBundle\Tests\Functional;

use GraphAware\Neo4j\Client\ClientInterface;
use GraphAware\Neo4j\Client\Connection\Connection;
use GraphAware\Neo4j\OGM\EntityManager;

class BundleInitializationTest extends BaseTestCase
{
    public function testRegisterBundle()
    {
        static::bootKernel();
        $container = static::$kernel->getContainer();
        $this->assertTrue($container->has('neo4j.connection'));
        $client = $container->get('neo4j.connection');
        $this->assertInstanceOf(Connection::class, $client);

        $this->assertTrue($container->has('neo4j.client'));
        $client = $container->get('neo4j.client');
        $this->assertInstanceOf(ClientInterface::class, $client);

        $this->assertTrue($container->has('neo4j.entity_manager'));
        $client = $container->get('neo4j.entity_manager');
        $this->assertInstanceOf(EntityManager::class, $client);
    }
}