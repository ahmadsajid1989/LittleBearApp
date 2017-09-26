<?php

namespace Acm\DatacollectorBundle\Datatables;

use Sg\DatatablesBundle\Datatable\AbstractDatatable;
use Sg\DatatablesBundle\Datatable\Style;
use Sg\DatatablesBundle\Datatable\Column\Column;
use Sg\DatatablesBundle\Datatable\Column\BooleanColumn;
use Sg\DatatablesBundle\Datatable\Column\ActionColumn;
use Sg\DatatablesBundle\Datatable\Column\MultiselectColumn;
use Sg\DatatablesBundle\Datatable\Column\VirtualColumn;
use Sg\DatatablesBundle\Datatable\Column\DateTimeColumn;
use Sg\DatatablesBundle\Datatable\Column\ImageColumn;
use Sg\DatatablesBundle\Datatable\Filter\TextFilter;
use Sg\DatatablesBundle\Datatable\Filter\NumberFilter;
use Sg\DatatablesBundle\Datatable\Filter\SelectFilter;
use Sg\DatatablesBundle\Datatable\Filter\DateRangeFilter;
use Sg\DatatablesBundle\Datatable\Editable\CombodateEditable;
use Sg\DatatablesBundle\Datatable\Editable\SelectEditable;
use Sg\DatatablesBundle\Datatable\Editable\TextareaEditable;
use Sg\DatatablesBundle\Datatable\Editable\TextEditable;

/**
 * Class HumanDatatable
 *
 * @package Acm\DatacollectorBundle\Datatables
 */
class HumanDatatable extends AbstractDatatable
{
    /**
     * {@inheritdoc}
     */
    public function buildDatatable(array $options = array())
    {
        /*$this->language->set(array(
            'cdn_language_by_locale' => true
            //'language' => 'de'
        ));*/

        $this->language->set(array(
            'cdn_language_by_locale' => true,
        ));
        $this->ajax->set(array());
        $this->options->set(array(
            'classes' => Style::BOOTSTRAP_3_STYLE,
            'individual_filtering' => true,
            'individual_filtering_position' => 'head',
            'order_cells_top' => true,

            'dom' => 'Bfrtip',
        ));
        $this->features->set(array());



        //$users = $this->em->getRepository('AcmDatacollectorBundle:User')->findAll();

        $this->columnBuilder
            ->add('id', Column::class, array(
                'title' => 'Id',
                ))
            ->add('fullName', Column::class, array(
                'title' => 'Full Name',
                ))
            ->add('uniqueId', Column::class, array(
                'title' => 'UniqueId',
                ))
            /*->add('dateOfBirth', Column::class, array(
                'title' => 'DateOfBirth',
                ))
            ->add('dobFlag', BooleanColumn::class, array(
                'title' => 'DobFlag',
                ))
            ->add('sex', Column::class, array(
                'title' => 'Sex',
                ))
            ->add('age', Column::class, array(
                'title' => 'Age',
                ))
            ->add('maritalStatus', Column::class, array(
                'title' => 'MaritalStatus',
                ))*/
            /*->add('picture', Column::class, array(
                'title' => 'Picture',
                ))*/
            /*->add('verified', BooleanColumn::class, array(
                'title' => 'Verified',
                ))
            ->add('createdAt', DateTimeColumn::class, array(
                'title' => 'CreatedAt',
                ))
            ->add('updatedAt', DateTimeColumn::class, array(
                'title' => 'UpdatedAt',
                ))
            ->add('houseHold.id', Column::class, array(
                'title' => 'HouseHold Id',
                ))*/
            /*->add('houseHold.systemId', Column::class, array(
                'title' => 'HouseHold SystemId',
                ))
            ->add('houseHold.friendlyName', Column::class, array(
                'title' => 'HouseHold FriendlyName',
                ))
            ->add('houseHold.vulnerable', Column::class, array(
                'title' => 'HouseHold Vulnerable',
                ))
            ->add('houseHold.updatedAt', Column::class, array(
                'title' => 'HouseHold UpdatedAt',
                ))
            ->add('houseHoldRole.id', Column::class, array(
                'title' => 'HouseHoldRole Id',
                ))
            ->add('houseHoldRole.role', Column::class, array(
                'title' => 'HouseHoldRole Role',
                ))
            ->add('houseHoldRole.roleSlug', Column::class, array(
                'title' => 'HouseHoldRole RoleSlug',
                ))*/
            /*->add(null, ActionColumn::class, array(
                'title' => $this->translator->trans('sg.datatables.actions.title'),
                'actions' => array(
                    array(
                        'route' => 'human_show',
                        'route_parameters' => array(
                            'id' => 'id'
                        ),
                        'label' => $this->translator->trans('sg.datatables.actions.show'),
                        'icon' => 'glyphicon glyphicon-eye-open',
                        'attributes' => array(
                            'rel' => 'tooltip',
                            'title' => $this->translator->trans('sg.datatables.actions.show'),
                            'class' => 'btn btn-primary btn-xs',
                            'role' => 'button'
                        ),
                    ),
                    array(
                        'route' => 'human_edit',
                        'route_parameters' => array(
                            'id' => 'id'
                        ),
                        'label' => $this->translator->trans('sg.datatables.actions.edit'),
                        'icon' => 'glyphicon glyphicon-edit',
                        'attributes' => array(
                            'rel' => 'tooltip',
                            'title' => $this->translator->trans('sg.datatables.actions.edit'),
                            'class' => 'btn btn-primary btn-xs',
                            'role' => 'button'
                        ),
                    )
                )
            ))*/
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
