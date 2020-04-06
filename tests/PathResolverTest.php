<?php

class PathResolverTest extends \PHPUnit\Framework\TestCase
{
    public function testResolve() : void
    {
        $unresolvedPath = __DIR__ . '/../src/SwedbankPay/Api/../';
        $pathResolver = new \SwedbankPay\PathResolver();
        $resolvedPath = $pathResolver->resolve($unresolvedPath);

        $this->assertStringEndsWith('/src/SwedbankPay', $resolvedPath);
    }
}

?>
