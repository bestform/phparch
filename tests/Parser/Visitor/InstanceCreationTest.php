<?php
namespace J6s\PhpArch\Tests\Parser\Visitor;


use J6s\PhpArch\Parser\Visitor\InstanceCreation;
use J6s\PhpArch\Tests\TestCase;

class InstanceCreationTest extends TestCase
{

    public function testShouldCollectInstanceCreation(): void
    {
        $visitor = new InstanceCreation();
        $this->parseAndTraverseFileContents(__DIR__ . '/Example/TestClass.php', $visitor);
        $this->assertContains(
            'Foo\\Bar\\InstanceCreation',
            $visitor->getNamespaces()
        );
    }

    public function testShouldCollectInstanceCreationOfImportedClasses(): void
    {
        $visitor = new InstanceCreation();
        $this->parseAndTraverseFileContents(__DIR__ . '/Example/TestClass.php', $visitor);
        $this->assertContains(
            'Foo\\Bar\\ImportedInstanceCreation',
            $visitor->getNamespaces()
        );
    }

}
