<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 10-Sep-20
 * Time: 10:24 AM
 */
return [
    'ticket' => [

        'status' => [
            'available' => 'available',
            'in' => 'in',
            'out' => 'out',
            'cancelled' => 'cancelled',
        ],

        'tag' => [
            'regular' => 'regular',
            'vip' => 'vip',
            'guest' => 'guest',
        ],
		
    ],
	
	'user' => [
		'roles' => [
			'adminitrator' => 'Administrator',
			'agent_in' => 'Agent_in',
			'agent_out' => 'Agent_out',
			'supervisor' => 'Supervisor',
			'bar' => 'Bar',
			'regular' => 'Regular',
		]
	]

];