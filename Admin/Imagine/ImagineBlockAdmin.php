<?php

namespace Symfony\Cmf\Bundle\BlockBundle\Admin\Imagine;

use Symfony\Cmf\Bundle\BlockBundle\Admin\AbstractBlockAdmin;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * @author Horner
 */
class ImagineBlockAdmin extends AbstractBlockAdmin
{
    protected $baseRouteName = 'cmf_block_imagine';
    protected $baseRoutePattern = '/cmf/block/imagine';

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);

        // image is only required when creating a new item
        // TODO: sonata is not using one admin instance per object, so this doesn't really work - fix it
        $imageRequired = ($this->getSubject() && $this->getSubject()->getParent()) ? false : true;

        if (null === $this->getParentFieldDescription()) {
            $formMapper
                ->with('form.group_general')
                ->add(
                    'parent',
                    'doctrine_phpcr_odm_tree',
                    array('root_node' => $this->getRootPath(), 'choice_list' => array(), 'select_root_node' => true)
                )
                ->add('name', 'text')
            ->end();
        }

        $formMapper
            ->with('form.group_general')
                ->add('label', 'text', array('required' => false))
                ->add('linkUrl', 'text', array('required' => false))
                ->add('filter', 'text', array('required' => false))
                ->add('image', 'cmf_media_image', array('required' => $imageRequired))
                ->add('position', 'hidden', array('mapped' => false))
            ->end();
    }
}
