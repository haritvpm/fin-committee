<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'exMember' => [
        'title'          => 'ExMember',
        'title_singular' => 'ExMember',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'index'                   => 'Sl',
            'index_helper'            => ' ',
            'name'                    => 'Name',
            'name_helper'             => ' ',
            'address'                 => 'Address',
            'address_helper'          => ' ',
            'place'                   => 'Place',
            'place_helper'            => ' ',
            'district'                => 'District',
            'district_helper'         => ' ',
            'user'                    => 'User',
            'user_helper'             => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'distance_oneside'        => 'Distance OneWay',
            'distance_oneside_helper' => ' ',
            'ta_calculated'           => 'TA Calculated',
            'A_calculated_helper'    => ' ',
            'ta_eligible'             => 'TA Eligible',
            'ta_eligible_helper'      => ' ',
            'honorarium'              => 'Honorarium',
            'honorarium_helper'       => ' ',
            'amount_payable'          => 'Amount Payable',
            'amount_payable_helper'   => ' ',
            'amount_paid'             => 'Paid?',
            'amount_paid_helper'      => ' ',
            'created_by'              => 'Created By',
            'created_by_helper'       => ' ',
            'actual_amount_paid'        => 'Actual Amount Paid',
            'actual_amount_paid_helper' => ' ',
            'amount_words'  => 'Amount(Words)',
        ],
    ],
    'allocation' => [
        'title'          => 'Allocation',
        'title_singular' => 'Allocation',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'user'                   => 'User',
            'user_helper'            => ' ',
            'allotted_amount'        => 'Allotted Amount',
            'allotted_amount_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],

];
