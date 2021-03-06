<?php

namespace Symfony\Cmf\Bundle\BlockBundle\Tests\WebTest\Admin;

use Symfony\Cmf\Component\Testing\Functional\BaseTestCase;

/**
 * @author Nicolas Bastien <nbastien@prestaconcept.net>
 */
class ContainerBlockAdminTest extends AbstractBlockAdminTestCase
{
    /**
     * {@inheritdoc}
     */
    public function testBlockList()
    {
        $this->makeListAssertions(
            '/admin/cmf/block/container/list',
            array('container-block-1', 'container-block-2')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function testBlockEdit()
    {
        $this->makeEditAssertions(
            '/admin/cmf/block/container/test/blocks/container-block-1/edit',
            array('container-block-1')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function testBlockCreate()
    {
        $this->makeCreateAssertions(
            '/admin/cmf/block/container/create',
            array(
                'parentDocument' => '/test/blocks',
                'name'           => 'foo-test-container'
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function testBlockDelete()
    {
        $this->makeDeleteAssertions('/admin/cmf/block/container/test/blocks/container-block-1/delete');
    }

    /**
     * {@inheritdoc}
     */
    public function testBlockShow()
    {
        $this->makeShowAssertions(
            '/admin/cmf/block/container/test/blocks/container-block-1/show',
            array('container-block-1')
        );
    }
}
