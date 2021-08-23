<?php

return [
    'title' => 'Paysafecard payment',

    'nav' => [
      'pending' => 'Pending',
    ],

    'fields' => [
        'code' => 'Code',

        'pin' => '16 digits paysafecard code',
    ],

    'actions' => [
        'accept' => 'Accept',
        'refuse' => 'Refuse',
    ],

    'accept' => [
        'price' => 'What is the amount in :currency of the paysafecard ?',
        'money' => 'How much money the user should receive ?',
    ],

    'duplicate' => 'This code has already been used or is pending verification.',

    'status' => [
        'pending' => 'Your code has been saved and will be validated shortly.',

        'accepted' => 'The paysafecard has been accepted.',
        'refused' => 'The paysafecard has been refused.',
    ],

    'notifications' => [
        'accepted' => 'Your paysafecard has been accepted and you received :money.',
        'refused' => 'Your paysafecard :code has been refused.',
    ],

    'widget' => [
        'pending' => 'A new PaySafeCard code is awaiting confirmation !',
        'accepted' => 'A PaySafeCard code has just been validated !',
        'refused' => 'A PaySafeCard code has just been refused !',
        'pin' => 'PaySafeCard code',
        'user' => 'Users',
        'money' => 'Payment amount',
        'amount' => 'Reload amount',
    ],

    'info' => 'This plugin requires you to confirm each paysafecard payments manually.',
    'site_money' => 'In order to paysafecard manual to work, you must enable purchases with the site\'s money in the <a href=":url">shop\'s settings</a>.',
];
