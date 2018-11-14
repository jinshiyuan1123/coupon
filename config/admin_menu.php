<?php

return [
    'system' =>[
        'name' => '系统管理',
        'icon' => 'fa fa-cog',
        'router' => '',
        'is_hide' => 1,
        'submenus' => [
            [
                'title' => '管理员列表',
                'router' => 'user.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '新增管理员',
                        'router' => 'user.store'
                    ],
                    [
                        'name' => '编辑管理员',
                        'router' => 'user.update'
                    ]
                ]
            ],
            [
                'title' => '管理组',
                'router' => 'role.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '新增管理组',
                        'router' => 'role.store'
                    ],
                    [
                        'name' => '编辑管理组',
                        'router' => 'role.update'
                    ],
                    [
                        'name' => '关联权限',
                        'router' => 'role.update'
                    ]
                ]
            ],
            [
                'title' => '修改余额记录',
                'router' => 'admin_action_money_log.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [

                ]
            ],
            [
                'title' => '系统设置',
                'router' => 'system_config.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '编辑系统设置',
                        'router' => 'system_config.update'
                    ]
                ]
            ],

        ]
    ],
    'member' => [
        'name' => '用户管理',
        'icon' => 'fa fa-users',
        'router' => '',
        'is_hide' => 1,
        'submenus' => [
            [
                'title' => '用户列表',
                'router' => 'member.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '查看用户',
                        'router' => 'member.show'
                    ],
                    [
                        'name' => '编辑用户',
                        'router' => 'member.update'
                    ],
                    [
                        'name' => '禁用用户',
                        'router' => 'member.check'
                    ],
                    [
                        'name' => '删除用户',
                        'router' => 'member.destroy'
                    ]
                ]
            ],

            [
                'title' => '登录日志',
                'router' => 'member_login_log.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [

                ]
            ]

        ]
    ],
    'money' => [
        'name' => '财务管理',
        'icon' => 'fa fa-money',
        'router' => '',
        'is_hide' => 1,
        'submenus' => [

            [
                'title' => '提款',
                'router' => 'drawing.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '确认提款',
                        'router' => 'drawing.confirm'
                    ],
                    [
                        'name' => '不同意提款',
                        'router' => 'drawing.update'
                    ],
                ]
            ]
        ]
    ],
    'daili' => [
        'name' => '商家管理',
        'icon' => 'fa fa-list',
        'router' => '',
        'is_hide' => 1,
        'submenus' => [
            [
                'title' => '分类管理',
                'router' => 'member_daili.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '新增分类',
                        'router' => 'member_daili.store'
                    ],
                    [
                        'name' => '编辑分类',
                        'router' => 'member_daili.update'
                    ],
                    [
                        'name' => '删除分类',
                        'router' => 'member_daili.destroy'
                    ]
                ]
            ],		
            [
                'title' => '商家审核',
                'router' => 'member_daili_apply.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '审核商家',
                        'router' => 'member_daili_apply.show'
                    ],
                    [
                        'name' => '编辑商家',
                        'router' => 'member_daili_apply.update'
                    ]
                ]
            ],
            [
                'title' => '商家列表',
                'router' => 'member_daili.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '新增商家',
                        'router' => 'member_daili.store'
                    ],
                    [
                        'name' => '编辑商家',
                        'router' => 'member_daili.update'
                    ],
                    [
                        'name' => '删除商家',
                        'router' => 'member_daili.destroy'
                    ]
                ]
            ],
            [
                'title' => '优惠劵审核',
                'router' => 'member_offline.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [

                ]
            ],
            [
                'title' => '优惠券列表',
                'router' => 'member_offline_recharge.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [

                ]
            ],
            [
                'title' => '使用记录',
                'router' => 'member_offline_drawing.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [

                ]
            ]
        ]
    ],
    'fs' => [
        'name' => '免单管理',
        'icon' => 'fa fa-gg',
        'router' => '',
        'is_hide' => 1,
        'submenus' => [
            [
                'title' => '免单劵列表',
                'router' => 'fs_level.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '新增免单劵',
                        'router' => 'fs_level.store'
                    ],
                    [
                        'name' => '编辑免单劵',
                        'router' => 'fs_level.update'
                    ],
                    [
                        'name' => '删除免单劵',
                        'router' => 'fs_level.destroy'
                    ]
                ]
            ],	
            [
                'title' => '免单兑换',
                'router' => 'miandanuser.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '免单审核',
                        'router' => 'miandanuser.store'
                    ]
                ]
            ],
            [
                'title' => '商品列表',
                'router' => 'shop.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '新增商品',
                        'router' => 'shop.store'
                    ],
                    [
                        'name' => '编辑商品',
                        'router' => 'shop.update'
                    ],
                    [
                        'name' => '删除商品',
                        'router' => 'shop.destroy'
                    ]
                ]
            ],
            [
                'title' => '商品兑换',
                'router' => 'shopuser.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '商品审核',
                        'router' => 'shopuser.store'
                    ]
                ]
            ],			
            [
                'title' => '红包列表',
                'router' => 'fs.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [

                ]
            ]
        ]
    ],
    'activity' => [
        'name' => '朋友圈管理',
        'icon' => 'fa fa-map-o',
        'router' => '',
        'is_hide' => 1,
        'submenus' => [
            [
                'title' => '朋友圈审核',
                'router' => 'activity.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '新增活动',
                        'router' => 'activity.store'
                    ],
                    [
                        'name' => '编辑活动',
                        'router' => 'activity.update'
                    ],
                    [
                        'name' => '删除活动',
                        'router' => 'activity.destroy'
                    ]
                ]
            ],
            [
                'title' => '朋友圈列表',
                'router' => 'moments.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 1,
                'actions' => [
                    [
                        'name' => '新增活动',
                        'router' => 'moments.store'
                    ],
                    [
                        'name' => '编辑活动',
                        'router' => 'moments.update'
                    ],
                    [
                        'name' => '删除活动',
                        'router' => 'moments.destroy'
                    ]
                ]
            ]
        ]
    ],

    'personal' => [
        'name' => '个人资料',
        'icon' => 'fa fa-paper-plane-o',
        'router' => '',
        'is_hide' => 0,
        'submenus' => [
            [
                'title' => '个人资料',
                'router' => 'personal.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 0,
                'actions' => [
                    [
                        'name' => '编辑个人资料',
                        'router' => 'user.personal.post'
                    ]
                ]
            ]
        ]
    ]
];