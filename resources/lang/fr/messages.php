<?php

return [
    'title' => 'Paiement Paysafecard',

    'nav' => [
        'pending' => 'En attente',
    ],

    'fields' => [
        'code' => 'Code',

        'pin' => 'Code paysafecard à 16 chiffres',
    ],

    'actions' => [
        'accept' => 'Accepter',
        'refuse' => 'Refuser',
    ],

    'accept' => [
        'price' => 'Quel est le montant en :currency de la paysafecard ?',
        'money' => 'Combien d\'argent l\'utilisateur doit-il recevoir ?',
    ],

    'duplicate' => 'Ce code a déjà été utilisé ou est en attente de vérification.',

    'status' => [
        'pending' => 'Votre code a été enregistré et sera validé prochainement.',

        'accepted' => 'La paysafecard a été acceptée.',
        'refused' => 'La paysafecard a été refusée.',
    ],

    'notifications' => [
        'accepted' => 'Votre paysafecard a été acceptée et vous avez reçu :money.',
        'refused' => 'Votre paysafecard :code a été refusée.',
    ],

    'widget' => [
        'pending' => 'Un nouveau code PaySafeCard est en attente de confirmation !',
        'pin' => 'Code paysafecard',
        'user' => 'Utilisateurs',
    ],

    'info' => 'Ce plugin vous demande de confirmer chaque paiement paysafecard manuellement.',
    'site_money' => 'Pour que le manuel paysafecard fonctionne, vous devez activer les achats avec l\'argent du site dans les <a href=":url">paramètres de la boutique</a>.',
];
