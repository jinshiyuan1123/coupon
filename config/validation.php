<?php

return [
    'member' => [
        'register_one' => [
            'name' => [
                'name' => '用户名',
                'rules' => 'required|min:7|max:10|unique:members',
                'message' => ['min' => '用户名最少为7位', 'max' => '用户名最多为10位','unique' => '该名称已存在']
            ],
            'password' => [
                'name' => '注册密码',
                'rules' => 'required|min:6|max:12|confirmed',
                'message' => ['min' => '密码最少为6位', 'max' => '密码最多为12位','confirmed' => '两次密码输入不一致']
            ],
            'qk_pwd' => [
                'name' => '取款密码',
                'rules' => 'required|numeric|min:6',
                'message' => []
            ],
            'check1' => [
                'name' => '条款一',
                'rules' => 'required',
                'message' => ['required' => '请同意勾选条款一']
            ],
            'check2' => [
                'name' => '条款二',
                'rules' => 'required',
                'message' => ['required' => '请同意勾选条款二']
            ],
        ],
        'register_two' => [
            'real_name' => [
                'name' => '真实姓名',
                'rules' => 'required|max:255',
                'message' => []
            ],
            'gender' => [
                'name' => '性别',
                'rules' => 'required',
                'message' => ['required' => '请选择 性别']
            ],
            'phone' => [
                'name' => '手机号码',
                'rules' => 'required|regex:/^1[34578]\d{9}$/',
                'message' => ['required' => '请填写 手机号码','regex'=> '请填写 正确的手机号码']
            ],
            'qq' => [
                'name' => '联系QQ',
                'rules' => 'required',
                'message' => []
            ],
            'email' => [
                'name' => '邮箱',
                'rules' => 'required|email|max:255|unique:members',
                'message' => ['unique' => '邮箱已使用']
            ],
            'qk_pwd' => [
                'name' => '取款密码',
                'rules' => 'required|numeric|min:6',
                'message' => []
            ]
        ],
        'login' => [
            'name' => [
                'name' => '用户名',
                'rules' => 'required',
                'message' => []
            ],
            'password' => [
                'name' => '注册密码',
                'rules' => 'required',
                'message' => []
            ],
        ],
        'update_qk_password' => [
            'old_password' => [
                'name' => '原密码',
                'rules' => 'required|min:6',
                'message' => []
            ],
            'password' => [
                'name' => '新密码',
                'rules' => 'required|min:6|confirmed',
                'message' => ['confirmed' => '两次密码输入不一致']
            ],
        ],
        'update_login_password' => [
            'old_password' => [
                'name' => '原密码',
                'rules' => 'required|min:6',
                'message' => []
            ],
            'password' => [
                'name' => '新密码',
                'rules' => 'required|min:6|confirmed',
                'message' => ['confirmed' => '两次密码输入不一致']
            ],
        ],
        'update_bank_info' => [
            'bank_name' => [
                'name' => '收款银行',
                'rules' => 'required',
                'message' => ['required' => '请选择 收款银行']
            ],
            'bank_address' => [
                'name' => '开户地址',
                'rules' => 'required',
                'message' => []
            ],
            'bank_branch_name' => [
                'name' => '开户网点',
                'rules' => 'required',
                'message' => []
            ],
            'bank_username' => [
                'name' => '开户姓名',
                'rules' => 'required',
                'message' => []
            ],
            'bank_card' => [
                'name' => '银行账号',
                'rules' => 'required',
                'message' => []
            ],
        ],
        'post_weixin_pay' => [
            'money' => [
                'name' => '汇款金额',
                'rules' => 'required',
                'message' => []
            ],
            'account' => [
                'name' => '汇款账号',
                'rules' => 'required',
                'message' => []
            ],
            'paytime' => [
                'name' => '汇款时间',
                'rules' => 'required',
                'message' => []
            ]
        ],
        'post_ali_pay' => [
            'money' => [
                'name' => '汇款金额',
                'rules' => 'required',
                'message' => []
            ],
            'account' => [
                'name' => '汇款账号',
                'rules' => 'required',
                'message' => []
            ],
            'paytime' => [
                'name' => '汇款时间',
                'rules' => 'required',
                'message' => []
            ]
        ],
        'post_bank_pay' => [
            'money' => [
                'name' => '汇款金额',
                'rules' => 'required',
                'message' => []
            ],
            'payment_desc' => [
                'name' => '付款银行',
                'rules' => 'required',
                'message' => ['required' => '请选择 付款银行']
            ],
            'name' => [
                'name' => '付款户名',
                'rules' => 'required',
                'message' => []
            ],
            'account' => [
                'name' => '付款账号',
                'rules' => 'required',
                'message' => []
            ],
            'paytime' => [
                'name' => '汇款时间',
                'rules' => 'required',
                'message' => []
            ]
        ],
        'post_draw' => [
            'money' => [
                'name' => '取款金额',
                'rules' => 'required',
                'message' => []
            ],
            'qk_pwd' => [
                'name' => '取款密码',
                'rules' => '',
                'message' => []
            ],
        ],
        'post_transfer' => [
            'account2' => [
                'name' => '游戏平台',
                'rules' => 'required',
                'message' => ['required' => '请选择 游戏平台']
            ],
            'money' => [
                'name' => '转换金额',
                'rules' => 'required',
                'message' => []
            ],
            'transfer_type' => [
                'name' => '转换类型',
                'rules' => 'required',
                'message' => ['required' => '请选择 转换类型']
            ],
        ],
        'post_feedback' => [
            'type' => [
                'name' => '反馈类型',
                'rules' => 'required',
                'message' => ['required' => '请选择 反馈类型']
            ],
            'content' => [
                'name' => '反馈内容',
                'rules' => 'required',
                'message' => []
            ],
            'phone' => [
                'name' => '手机号码',
                'rules' => 'required|regex:/^1[34578]\d{9}$/',
                'message' => ['required' => '请填写 手机号码','regex'=> '请填写 正确的手机号码']
            ]
        ],
        'update' => [
//            'password' => [
//                'name' => '登录密码',
//                'rules' => 'min:6|max:12',
//                'message' => []
//            ],
//            'qk_pwd' => [
//                'name' => '取款密码',
//                'rules' => 'numeric|min:6',
//                'message' => []
//            ]
            'phone' => [
                'name' => '手机号码',
                'rules' => 'required|regex:/^1[34578]\d{9}$/',
                'message' => ['required' => '请填写 手机号码','regex'=> '请填写 正确的手机号码']
            ],
            'email' => [
                'name' => '邮箱',
                'rules' => 'required|email|max:255',
                'message' => []
            ],
        ]
    ],
    'fs_level' => [
        'store' => [
            'title' => [
                'name' => '标题',
                'rules' => 'required',
                'message' => ['required' => '请输入 标题']
            ],
            'businessname' => [
                'name' => '商家名称',
                'rules' => 'required',
                'message' => ['required' => '请输入 商家名称']
            ],
            'decrease' => [
                'name' => '免单金额',
                'rules' => 'required',
                'message' => []
            ],
            'begintime' => [
                'name' => '开始时间',
                'rules' => 'required',
                'message' => []
            ],
            'endtime' => [
                'name' => '结束时间',
                'rules' => 'required',
                'message' => []
            ],
			'score' => [
                'name' => '兑换积分',
                'rules' => 'required',
                'message' => []
            ],
        ]
    ],
    'shop' => [
        'store' => [
            'shoptitle' => [
                'name' => '标题',
                'rules' => 'required',
                'message' => ['required' => '请输入 标题']
            ],
            'imgurl' => [
                'name' => '图片',
                'rules' => 'required',
                'message' => ['required' => '请选择 图片']
            ],
            'score' => [
                'name' => '积分',
                'rules' => 'required',
                'message' => []
            ],
        ]
    ],	
    'black_list_ip' => [
        'store' => [
            'ip' => [
                'name' => 'IP地址',
                'rules' => 'required|ip',
                'message' => []
            ]
        ]
    ],
    'recharge' => [
        'confirm' => [
            'money' => [
                'name' => '充值金额',
                'rules' => 'required|min:1',
                'message' => []
            ],
            'diff_money' => [
                'name' => '赠送金额',
                'rules' => 'min:1',
                'message' => []
            ],
        ]
    ],
    'yj_level' => [
        'store' => [
            'level' => [
                'name' => '佣金等级',
                'rules' => 'required',
                'message' => ['required' => '请选择 佣金等级']
            ],
            'name' => [
                'name' => '等级名称',
                'rules' => 'required',
                'message' => []
            ],
            'min' => [
                'name' => '最小金额',
                'rules' => 'required',
                'message' => []
            ],
            'num' => [
                'name' => '活跃用户数量',
                'rules' => 'required|min:1',
                'message' => []
            ],
            'rate' => [
                'name' => '佣金比例',
                'rules' => 'required',
                'message' => []
            ],
        ]
    ],
    'send_daili_money' => [
        'store' => [
            'top_id' => [
                'name' => '代理',
                'rules' => 'required',
                'message' => ['required' => '请选择代理']
            ],
        ]
    ],
    'send_fs' => [
        'store' => [
            'member_id' => [
                'name' => '用户',
                'rules' => 'required',
                'message' => ['required' => '请选择用户']
            ],
        ]
    ],
    'member_daili' => [
        's_store' => [
            'member_id' => [
                'name' => '会员',
                'rules' => 'required',
                'message' => ['required' => '请选择 成为代理的会员']
            ]
        ]
    ],
    'api' => [
        'store' => [
            'api_name' => [
                'name' => '接口名称',
                'rules' => 'required',
                'message' => []
            ],
            'api_money' => [
                'name' => '接口余额',
                'rules' => 'required|min:0',
                'message' => []
            ],
        ]
    ],
    'system_notice' => [
        'store' => [
//            'title' => [
//                'name' => '标题',
//                'rules' => 'required',
//                'message' => []
//            ],
            'content' => [
                'name' => '内容',
                'rules' => 'required',
                'message' => []
            ],
        ]
    ],
    'message' => [
        'store' => [
            'title' => [
                'name' => '标题',
                'rules' => 'required',
                'message' => []
            ],
            'content' => [
                'name' => '内容',
                'rules' => 'required|min:0',
                'message' => []
            ],
            'send_member' => [
                'name' => '发送的用户',
                'rules' => 'required',
                'message' => ['required' => '请选择 发放的用户']
            ],
        ],
        'update' => [
            'title' => [
                'name' => '标题',
                'rules' => 'required',
                'message' => []
            ],
            'content' => [
                'name' => '内容',
                'rules' => 'required|min:0',
                'message' => []
            ]
        ]
    ],
    'bank_card' => [
        'store' => [
            'bank_id' => [
                'name' => '开户行',
                'rules' => 'required',
                'message' => []
            ],
            'username' => [
                'name' => '持卡人姓名',
                'rules' => 'required',
                'message' => []
            ],
            'card_no' => [
                'name' => '卡号',
                'rules' => 'required',
                'message' => []
            ]
        ]
    ],
    'activity' => [
        'store' => [
            'title' => [
                'name' => '活动标题',
                'rules' => 'required',
                'message' => []
            ],
//            'api' => [
//                'name' => '参与接口',
//                'rules' => 'required',
//                'message' => ['required' => '请选择 参与的接口']
//            ]
        ]
    ],
    'user' => [
        'personal' => [
            'name' => [
                'name' => '用户名',
                'rules' => 'required',
                'message' => []
            ],
            'email' => [
                'name' => '邮箱',
                'rules' => 'required|email',
                'message' => ['email' => '请填写 正确的邮箱地址']
            ],
//            'password' => [
//                'name' => '密码',
//                'rules' => 'min:6',
//                'message' => ['min' => '请至少输入6位字符密码']
//            ],
        ],
        'store' => [
            'name' => [
                'name' => '用户名',
                'rules' => 'required',
                'message' => []
            ],
            'email' => [
                'name' => '邮箱',
                'rules' => 'required|email',
                'message' => ['email' => '请填写 正确的邮箱地址']
            ],
            'password' => [
                'name' => '密码',
                'rules' => 'required|min:6',
                'message' => ['min' => '请至少输入6位字符密码']
            ],
        ],
        'update' => [
            'name' => [
                'name' => '用户名',
                'rules' => 'required',
                'message' => []
            ],
            'email' => [
                'name' => '邮箱',
                'rules' => 'required|email',
                'message' => ['email' => '请填写 正确的邮箱地址']
            ],
//            'password' => [
//                'name' => '密码',
//                'rules' => 'min:6',
//                'message' => ['min' => '请至少输入6位字符密码']
//            ],
        ]
    ],
    'role' => [
        'store' => [
            'name' => [
                'name' => '角色名',
                'rules' => 'required',
                'message' => []
            ]
        ],
        'relation' => [
            'routers' => [
                'name' => '权限',
                'rules' => 'required',
                'message' => ['']
            ]
        ]
    ],
    'game_list' => [
        'store' => [
            'name' => [
                'name' => '游戏名称',
                'rules' => 'required',
                'message' => []
            ],
            'api_id' => [
                'name' => '所属接口',
                'rules' => 'required',
                'message' => ['required' => '请选择 所属接口']
            ],
            'game_id' => [
                'name' => '游戏代码',
                'rules' => 'required',
                'message' => []
            ],
            'game_type' => [
                'name' => '游戏类型',
                'rules' => 'required',
                'message' => ['required' => '请选择 游戏类型']
            ],
            'client_type' => [
                'name' => '游戏平台',
                'rules' => 'required',
                'message' => ['required' => '请选择 游戏平台']
            ],
            'sort' => [
                'name' => '排序',
                'rules' => 'required',
                'message' => []
            ]
        ]
    ],
    'wap' => [
        'login' => [
            'name' => [
                'name' => '用户名',
                'rules' => 'required',
                'message' => []
            ],
            'password' => [
                'name' => '注册密码',
                'rules' => 'required',
                'message' => []
            ],
        ],
        'register' => [
           /* 'name' => [
                'name' => '用111户名',
                'rules' => 'required|min:11|max:11|unique:members',
                'message' => ['min' => '用户名最少为11位', 'max' => '用户名最多为11位','unique' => '该名称已存在']
            ],
            'password' => [
                'name' => '注册11密码',
                'rules' => 'required|min:6|max:12|confirmed',
                'message' => ['min' => '密码最少为6位', 'max' => '密码最多为12位','confirmed' => '两次密码输入不一致']
            ],
            'real_name' => [
                'name' => '真实111姓名',
                'rules' => 'required|max:255',
                'message' => []
            ],
            'qk_pwd' => [
                'name' => '取款111密码',
                'rules' => 'required|numeric|min:6',
                'message' => ['min' => '取款密码 为6位数字']
            ]*/
			'name' => [
                'name' => '用手机号码',
                'rules' => 'required|min:11|max:11|unique:members',
                'message' => ['min' => '用手机号码最少为11位', 'max' => '用手机号码最大为11位','unique' => '该名称已存在']
            ],
			'code' => [
                'name' => '手机验证码',
                'rules' => 'required|min:4|max:6',
                'message' => ['min' => '手机验证码长度不正确', 'max' => '手机验证码长度不正确']
            ],
			'password' => [
                'name' => '密码',
                'rules' => 'required|min:8|max:16',
                'message' => ['min' => '密码长度不能少于6位', 'max' => '密码长度不能超出16位']
            ],
			'nichen' => [
                'name' => '昵称',
                'rules' => 'required|min:1|max:10',
                'message' => ['min' => '请输入昵称', 'max' => '昵称不能超过10位']
            ] 	
        ],
        'post_transfer' => [
            'out_account' => [
                'name' => '转出账户',
                'rules' => 'required',
                'message' => ['required' => '请选择 转出账户']
            ],
            'in_account' => [
                'name' => '转入账户',
                'rules' => 'required',
                'message' => ['required' => '请选择 转入账户']
            ],
            'money' => [
                'name' => '转账金额',
                'rules' => 'required',
                'message' => []
            ]
        ],
        'post_weixin_pay' => [
            'money' => [
                'name' => '汇款金额',
                'rules' => 'required',
                'message' => []
            ],
            'account' => [
                'name' => '汇款账号',
                'rules' => 'required',
                'message' => []
            ],
            'paytime' => [
                'name' => '汇款时间',
                'rules' => 'required',
                'message' => []
            ]
        ],
        'post_ali_pay' => [
            'money' => [
                'name' => '汇款金额',
                'rules' => 'required',
                'message' => []
            ],
            'account' => [
                'name' => '汇款账号',
                'rules' => 'required',
                'message' => []
            ],
            'paytime' => [
                'name' => '汇款时间',
                'rules' => 'required',
                'message' => []
            ]
        ],
        'post_bank_pay' => [
            'money' => [
                'name' => '汇款金额',
                'rules' => 'required',
                'message' => []
            ],
            'payment_desc' => [
                'name' => '付款银行',
                'rules' => 'required',
                'message' => ['required' => '请选择 付款银行']
            ],
            'name' => [
                'name' => '付款户名',
                'rules' => 'required',
                'message' => []
            ],
            'account' => [
                'name' => '付款账号',
                'rules' => 'required',
                'message' => []
            ],
            'paytime' => [
                'name' => '汇款时间',
                'rules' => 'required',
                'message' => []
            ]
        ],
        'update_bank_info' => [
            'bank_name' => [
                'name' => '收款银行',
                'rules' => 'required',
                'message' => ['required' => '请选择 收款银行']
            ],
            'bank_address' => [
                'name' => '开户地址',
                'rules' => 'required',
                'message' => []
            ],
//            'bank_branch_name' => [
//                'name' => '开户网点',
//                'rules' => 'required',
//                'message' => []
//            ],
//            'bank_username' => [
//                'name' => '开户姓名',
//                'rules' => 'required',
//                'message' => []
//            ],
            'bank_card' => [
                'name' => '银行账号',
                'rules' => 'required',
                'message' => []
            ],
        ],
        'post_drawing' => [
            'money' => [
                'name' => '取款金额',
                'rules' => 'required',
                'message' => []
            ],
            'qk_pwd' => [
                'name' => '取款密码',
                'rules' => 'required',
                'message' => []
            ],
        ],
        'update_qk_password' => [
            'old_password' => [
                'name' => '原密码',
                'rules' => 'required|min:6',
                'message' => []
            ],
            'password' => [
                'name' => '新密码',
                'rules' => 'required|min:6|confirmed',
                'message' => ['confirmed' => '两次密码输入不一致']
            ],
        ],
        'update_login_password' => [
            'old_password' => [
                'name' => '原密码',
                'rules' => 'required|min:6',
                'message' => []
            ],
            'password' => [
                'name' => '新密码',
                'rules' => 'required|min:6|confirmed',
                'message' => ['confirmed' => '两次密码输入不一致']
            ],
        ],
		'post_set' => [
            'Businessname' => [
                'name' => '商家名称',
                'rules' => 'required|min:1|max:20',
                'message' => ['min' => '请输入商家名称', 'max' => '商家名称不能超过20位']
            ],
			'Businessaddress' => [
                'name' => '商家地址',
                'rules' => 'required|min:1|max:100',
                'message' => ['min' => '商家地址', 'max' => '商家地址不能超过100位']
            ], 				
            'Businessphone' => [
                'name' => '手机号码',
                'rules' => 'required|regex:/^1[34578]\d{9}$/',
                'message' => ['required' => '请填写 手机号码','regex'=> '请填写 正确的手机号码']
            ],				
		],
		'post_card' => [
            'couponstitle' => [
                'name' => '名称',
                'rules' => 'required|min:1|max:6',
                'message' => ['min' => '请输入名称', 'max' => '名称不能超过6位']
            ],
			'term' => [
                'name' => '条件',
                'rules' => 'required|integer',
                'message' => ['required' => '请填写 使用条件','integer'=> '使用条件必须为整数']
            ], 				
			'decrease' => [
                'name' => '优惠金额',
                'rules' => 'required|integer',
                'message' => ['required' => '请填写 优惠金额','integer'=> '使用优惠金额必须为整数']
            ], 
			'cn_begin' => [
                'name' => '开始时间',
                'rules' => 'required',
                'message' => []
            ], 	
			'cn_end' => [
                'name' => '结束时间',
                'rules' => 'required',
                'message' => []
            ], 
            'info' => [
                'name' => '使用说明',
                'rules' => 'max:400',
                'message' => [ 'max' => '名称不能超过100位字符']
            ],			
		],		
		'post_cardinfo' =>[
            'couponname' => [
                'name' => '名称',
                'rules' => 'required',
                'message' => []
            ],		
            'term' => [
                'name' => '满',
                'rules' => 'required|integer',
                'message' => ['required' => '请填写 使用条件','integer'=> '使用条件只能为数字']
            ],	
            'decrease' => [
                'name' => '减',
                'rules' => 'required|integer',
                'message' => ['required' => '请填写 减扣金额','integer'=> '减扣金额只能为数字']
            ],
            'begintime' => [
                'name' => '开始时间',
                'rules' => 'required',
                'message' => ['required' => '选择 开始时间']
            ],	
            'endtime' => [
                'name' => '结束时间',
                'rules' => 'required',
                'message' => ['required' => '选择 结束时间']
            ],			
		],
       'post_agent_apply' => [
            'real_name' => [
                'name' => '姓名',
                'rules' => 'required',
                'message' => []
            ],
            'Businessname' => [
                'name' => '商家名称',
                'rules' => 'required',
                'message' => []
            ],
            'Businessaddress' => [
                'name' => '商家地址',
                'rules' => 'required',
                'message' => []
            ],				
            'set_phone' => [
                'name' => '手机号码',
                'rules' => 'required|regex:/^1[34578]\d{9}$/',
                'message' => ['required' => '请填写 手机号码','regex'=> '请填写 正确的手机号码']
            ],
            'code' => [
                'name' => '验证码',
                'rules' => 'required',
                'message' => []
            ],	
            'idcard' => [
                'name' => '身份证',
                'rules' => 'required',
                'message' => ['required' => '请上传 身份证']
            ],	
            'Business' => [
                'name' => '营业执照',
                'rules' => 'required',
                'message' => ['required' => '请上传 营业执照']
            ]
        ],
        'post_set_phone' => [
            'phone' => [
                'name' => '手机号码',
                'rules' => 'required|regex:/^1[34578]\d{9}$/',
                'message' => ['required' => '请填写 手机号码','regex'=> '请填写 正确的手机号码']
            ],
        ]
    ],
    'member_offline' => [
        'store' => [
            'name' => [
                'name' => '用户名',
                'rules' => 'required|min:7|max:10|unique:members',
                'message' => ['min' => '用户名最少为7位', 'max' => '用户名最多为10位','unique' => '该名称已存在']
            ],
        ]
    ]


];