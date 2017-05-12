<?php

$config = [
    'clientRegister'       =>  [

                                            [
                                                'field' => 'firstname',
                                                'label' => 'First Name',
                                                'rules' => 'required',
                                            ],
                                            [
                                                'field' => 'lastname',
                                                'label' => 'Last Name',
                                                'rules' => 'required',
                                            ],
                                            [
                                                'field' => 'address',
                                                'label' => 'Address',
                                                'rules' => 'required',
                                            ],
                                            [
                                                'field' => 'email',
                                                'label' => 'Email',
                                                'rules' => 'required|valid_email|is_unique[user.email]',
                                            ]

                                ],

    'createInvoice'       =>  [

                                            [
                                                'field' => 'sum',
                                                'label' => 'Sum',
                                                'rules' => 'required|integer',
                                            ],
                                            [
                                                'field' => 'title',
                                                'label' => 'Title',
                                                'rules' => 'required',
                                            ],
                                            [
                                                'field' => 'description',
                                                'label' => 'Description',
                                                'rules' => 'required',
                                            ],
                                            [
                                                'field' => 'ico',
                                                'label' => 'ICO',
                                                'rules' => 'required|min_length[8]|max_length[8]|numeric',
                                            ],
                                            [
                                                'field' => 'dic',
                                                'label' => 'DIC',
                                                'rules' => 'required|min_length[10]|max_length[10]|numeric',
                                            ]

                                ]
];