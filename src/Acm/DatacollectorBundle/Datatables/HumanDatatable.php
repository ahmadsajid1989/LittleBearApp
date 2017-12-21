<?php

namespace Acm\DatacollectorBundle\Datatables;

use Sg\DatatablesBundle\Datatable\View\AbstractDatatableView;
use Sg\DatatablesBundle\Datatable\View\Style;

/**
 * Class HumanDatatable
 *
 * @package Acm\DatacollectorBundle\Datatables
 */
class HumanDatatable extends AbstractDatatableView
{
    /**
     * {@inheritdoc}
     */
    public function buildDatatable(array $options = array())
    {
        $this->topActions->set(array(
            'start_html' => '<div class="row"><div class="col-sm-12">',
            'end_html' => '<hr></div></div>',
            'actions' => array(
                /*array(
                    'route' => $this->router->generate('human_new'),
                    'label' => $this->translator->trans('datatables.actions.new'),
                    'icon' => 'glyphicon glyphicon-plus',
                    'attributes' => array(
                        'rel' => 'tooltip',
                        'title' => $this->translator->trans('datatables.actions.new'),
                        'class' => 'btn btn-primary',
                        'role' => 'button'
                    ),
                )*/
            )
        ));

        $this->features->set(array(
            'auto_width' => true,
            'defer_render' => false,
            'info' => true,
            'jquery_ui' => false,
            'length_change' => true,
            'ordering' => true,
            'paging' => true,
            'processing' => true,
            'scroll_x' => false,
            'scroll_y' => '',
            'searching' => true,
            'state_save' => false,
            'delay' => 0,
            'extensions' => array(
                'responsive' => true
            ),
            'highlight' => false,
            'highlight_color' => 'red'
        ));

        $this->ajax->set(array(
            'url' => $this->router->generate('human_results'),
            'type' => 'GET',
            'pipeline' => 0
        ));

        $this->options->set(array(
            'display_start' => 0,
            'defer_loading' => -1,
            'dom' => 'lfrtip',
            'length_menu' => array(10, 25, 50, 100),
            'order_classes' => true,
            'order' => array(array(0, 'asc')),
            'order_multi' => true,
            'page_length' => 10,
            'paging_type' => Style::FULL_NUMBERS_PAGINATION,
            'renderer' => '',
            'scroll_collapse' => false,
            'search_delay' => 0,
            'state_duration' => 7200,
            'stripe_classes' => array(),
            'class' => Style::BOOTSTRAP_3_STYLE,
            'individual_filtering' => false,
            'individual_filtering_position' => 'head',
            'use_integration_options' => true,
            'force_dom' => false,
            'row_id' => 'id'
        ));

        $this->columnBuilder
            ->add('id', 'column', array(
                'title' => 'ID',
            ))
            ->add('fullName', 'column', array(
                'title' => 'Name',
            ))
            ->add('uniqueId', 'column', array(
                'title' => 'Unique ID',
            ))
            ->add('dateOfBirth', 'datetime', array(
                'title' => 'Date Of Birth',
                'date_format' => 'll'
            ))
            /*->add('dobFlag', 'boolean', array(
                'title' => 'DobFlag',
            ))*/
            ->add('sex', 'column', array(
                'title' => 'Sex',
            ))
            ->add('age', 'column', array(
                'title' => 'Age',
            ))
            ->add('maritalStatus', 'column', array(
                'title' => 'Marital Status',
            ))
           /* ->add('picture', 'column', array(
                'title' => 'Picture',
            ))*/
            ->add('verified', 'boolean', array(
                'title' => 'Verified',
            ))
            ->add('createdAt', 'datetime', array(
                'title' => 'Created At',
            ))
           /* ->add('updatedAt', 'datetime', array(
                'title' => 'Updated At',
            ))*/
           /* ->add('houseHold.id', 'column', array(
                'title' => 'HouseHold ID',
            ))*/
            /*->add('houseHold.systemId', 'column', array(
                'title' => 'HouseHold SystemId',
            ))*/
            ->add('houseHold.friendlyName', 'column', array(
                'title' => 'Friendly Name',
            ))
            ->add('houseHold.vulnerable', 'column', array(
                'title' => 'Vulnerable',
            ))

            ->add('houseHoldRole.role', 'column', array(
                'title' => 'Role',
            ))

            ->add(null, 'action', array(
                'title' => $this->translator->trans('datatables.actions.title'),
                'actions' => array(
                    array(
                        'route' => 'human_show',
                        'route_parameters' => array(
                            'id' => 'id'
                        ),
                        'label' => $this->translator->trans('datatables.actions.show'),
                        'attributes' => array(
                            'rel' => 'tooltip',
                            'title' => $this->translator->trans('datatables.actions.show'),
                            'class' => 'btn btn-primary btn-xs',
                            'role' => 'button'
                        ),
                    )
                    /*array(
                        'route' => 'human_show',
                        'route_parameters' => array(
                            'id' => 'id'
                        ),
                        'label' => $this->translator->trans('datatables.actions.edit'),
                        'attributes' => array(
                            'rel' => 'tooltip',
                            'title' => $this->translator->trans('datatables.actions.edit'),
                            'class' => 'btn btn-primary btn-xs',
                            'role' => 'button'
                        ),
                    )*/
                )
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return 'Acm\DatacollectorBundle\Entity\Human';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'human_datatable';
    }
}
