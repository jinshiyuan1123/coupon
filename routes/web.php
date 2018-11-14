<?php
//二级域名指向
Route::group(['domain' => '127.0.0.3'],function ($router)
{
    $router->get('/', 'Admin\AuthController@getLogin')->name('admin.init');
});
Route::group(['domain' => 'http://localhost'],function ($router)
{
    $router->get('/', 'Wap\IndexController@index')->name('wap.index');
});





//手机
Route::group(['prefix' => 'm','namespace' => 'Wap', 'middleware' => 'web.maintain'],function ($router)
{
    $router->get('/', 'IndexController@index')->name('wap.index');


    $router->get('login', 'LoginController@showLoginForm')->name('wap.login');

    $router->post('login', 'LoginController@postLogin')->name('wap.login.post');
    $router->any('logout', 'LoginController@logout')->name('wap.logout');

    $router->get('register', 'IndexController@register')->name('wap.register');
    $router->post('register', 'IndexController@postRegister')->name('wap.register.post');


	
	$router->get('moments','IndexController@moments')->name('wap.moments');
	$router->get('moments1','IndexController@moments1')->name('wap.moments1');


	//免单中心
    $router->get('activity_list', 'IndexController@activity_list')->name('wap.activity_list');
	$router->get('activity_shop', 'IndexController@activity_shop')->name('wap.activity_shop');
	$router->get('activity_hb', 'IndexController@activity_hb')->name('wap.activity_hb');
    $router->get('activity_detail/{id}', 'IndexController@activity_detail')->name('wap.activity_detail');
    //优惠券详情
    $router->get('ucardinfo/{id}', 'IndexController@ucardinfo')->name('wap.ucardinfo');	
    //需要登录
    Route::group(['middleware' => 'auth.member:member'],function ($router){
    //导航
    $router->get('nav', 'IndexController@nav')->name('wap.nav');		
        //
        $router->get('userinfo', 'IndexController@userinfo')->name('wap.userinfo');
		//使用优惠券
        $router->get('usecard/{id}', 'IndexController@usecard')->name('wap.usecard');	
        //兑换免单劵
        $router->get('activity_list/{id}', 'IndexController@activity_list_id')->name('wap.activity_list_id');	
        $router->get('activity_shop/{id}', 'IndexController@activity_shop_id')->name('wap.activity_shop_id');	
        $router->get('activity_hb/{id}', 'IndexController@activity_hb_id')->name('wap.activity_hb_id');	   
        $router->post('activity_list/{id}', 'IndexController@postactivity_list_id')->name('wap.postactivity_list_id');	
        $router->post('activity_shop/{id}', 'IndexController@postactivity_shop_id')->name('wap.postactivity_shop_id');	
        $router->post('activity_hb/{id}', 'IndexController@postactivity_hb_id')->name('wap.postactivity_hb_id');	  		
        //商家中心
        $router->get('agent', 'IndexController@agent')->name('wap.agent');
		$router->get('card', 'IndexController@card')->name('wap.card');
		$router->get('addcard', 'IndexController@addcard')->name('wap.addcard');
		$router->post('postaddcard', 'IndexController@postaddcard')->name('wap.postaddcard');
		$router->get('cardinfo/{id}', 'IndexController@cardinfo')->name('wap.cardinfo');
        $router->get('agent_apply', 'IndexController@agent_apply')->name('wap.agent_apply');
        $router->post('agent_apply', 'IndexController@post_agent_apply')->name('wap.post_agent_apply');
		$router->get('Businessupload', 'IndexController@Businessupload')->name('wap.Businessupload');
        $router->post('post_Businessupload', 'IndexController@post_Businessupload')->name('wap.post_Businessupload');
		$router->get('set', 'IndexController@set')->name('wap.set');
		$router->post('set', 'IndexController@postset')->name('wap.postset');
        //设置手机
        $router->get('set_phone', 'IndexController@set_phone')->name('wap.set_phone');
		$router->get('set_phone_code', 'IndexController@set_phone_code')->name('wap.set_phone_code');
        $router->post('set_phone', 'IndexController@post_set_phone')->name('wap.post_set_phone');
        //设置昵称
		$router->get('set_nichen', 'IndexController@set_nichen')->name('wap.set_nichen');
		$router->post('set_nichen', 'IndexController@post_set_nichen')->name('wap.post_set_nichen');
        $router->get('bind_bank', 'IndexController@bind_bank')->name('wap.bind_bank');
        $router->post('bind_bank', 'IndexController@post_bind_bank')->name('wap.post_bind_bank');
		//收货地址
        $router->get('address', 'IndexController@address')->name('wap.address');
        $router->post('address', 'IndexController@post_address')->name('wap.post_address');		
		//头像上传
		$router->get('upload', 'IndexController@upload')->name('wap.upload');
        $router->any('uploads', 'IndexController@uploadImages')->name('wap.uploads');
		$router->post('post_upload', 'IndexController@post_upload')->name('wap.post_upload');
		//我的优惠券
        $router->get('mycard', 'IndexController@mycard')->name('wap.mycard'); 
		//我的商品订单
        $router->get('myshop', 'IndexController@myshop')->name('wap.myshop'); 	
		//我的商品订单
        $router->get('mymiandan', 'IndexController@mymiandan')->name('wap.mymiandan'); 			
		//我的红包
        $router->get('myhb', 'IndexController@myhb')->name('wap.myhb'); 			
		//我的积分
        $router->get('myscore', 'IndexController@myscore')->name('wap.myscore');  
		//我的动态
		$router->get('mymoments', 'IndexController@mymoments')->name('wap.mymoments'); 
		$router->get('mymoments/{id}', 'IndexController@mymomentsc')->name('wap.mymomentsc'); 
		$router->post('mymoments', 'IndexController@postmymomentsc')->name('wap.postmymomentsc'); 
		$router->post('delectmymoments/{id}', 'IndexController@delectmymoments')->name('wap.delectmymoments'); 
		//发布动态
		$router->get('release_moments', 'IndexController@releasemoments')->name('wap.releasemoments'); 
		$router->post('release_moments', 'IndexController@postreleasemoments')->name('wap.postreleasemoments'); 
		//点赞或取消点赞
		$router->get('zan/{id}', 'IndexController@zan')->name('wap.zan'); 
        //我的留言messag
    	$router->get('mymessage', 'IndexController@mymessage')->name('wap.mymessage');
        //ad
		$router->get('ad', 'IndexController@ad')->name('wap.ad');
        //设置
        $router->get('drawing', 'IndexController@drawing')->name('wap.drawing');
        $router->post('drawing', 'IndexController@post_drawing')->name('wap.post_drawing');
		$router->get('drawing_record', 'IndexController@drawing_record')->name('wap.drawing_record');
        //提款
        $router->get('draw', 'IndexController@draw')->name('wap.draw');
        $router->post('post_draw', 'IndexController@post_draw')->name('wap.post_draw');
        $router->get('draw_record', 'IndexController@draw_record')->name('wap.draw_record');
        $router->get('game_record', 'IndexController@game_record')->name('wap.game_record');
        $router->get('recharge_record', 'IndexController@recharge_record')->name('wap.recharge_record');
        $router->get('transfer_record', 'IndexController@transfer_record')->name('wap.transfer_record');
        //
        $router->get('daili_money_log', 'IndexController@daili_money_log')->name('wap.daili_money_log');
        $router->get('member_offline', 'IndexController@member_offline')->name('wap.member_offline');
        $router->get('member_offline_recharge', 'IndexController@member_offline_recharge')->name('wap.member_offline_recharge');
        $router->get('member_offline_drawing', 'IndexController@member_offline_drawing')->name('wap.member_offline_drawing');
        $router->get('member_offline_sy', 'IndexController@member_offline_sy')->name('wap.member_offline_sy');

        //充值
        $router->get('recharge', 'IndexController@recharge')->name('wap.recharge');

        $router->get('recharge_record', 'IndexController@recharge_record')->name('wap.recharge_record');

        $router->get('reset_password', 'IndexController@reset_password')->name('wap.reset_password');
        $router->post('reset_login_password', 'IndexController@reset_login_password')->name('wap.reset_login_password');
        $router->post('reset_qk_password', 'IndexController@reset_qk_password')->name('wap.reset_qk_password');

        $router->get('transfer', 'IndexController@transfer')->name('wap.transfer');
        $router->post('transfer', 'IndexController@post_transfer')->name('wap.post_transfer');

        $router->get('transfer_record', 'IndexController@transfer_record')->name('wap.transfer_record');
    });


});
Route::group(['domain' => '127.0.0.3', 'prefix' => 'admin','namespace' => 'Admin'],function ($router){

    Route::get('/login', ['as' => 'admin.login','uses' => 'AuthController@getLogin']);
    Route::post('/login', ['as' => 'admin.login.post','uses' => 'AuthController@postLogin']);
    Route::get('/loginOut', ['as' => 'admin.login.out','uses' => 'AuthController@getLoginOut']);
    //需要登录
    Route::group(['middleware' => ['authorize']], function($router){
        //后台首页
        $router->get('/', 'AdminController@index')->name('admin.index');
        $router->get('hk_notice', 'AdminController@hk_notice')->name('admin.hk_notice');
        $router->get('tk_notice', 'AdminController@tk_notice')->name('admin.tk_notice');
        //系统设置
        //个人资料
        Route::resource("user", 'UserController');
        Route::get('personal', ['as' => 'user.personal', 'uses' => 'UserController@getPersonal']);
        Route::post('personal', ['as' => 'user.personal.post', 'uses' => 'UserController@postPersonal']);
        //管理组
        Route::get('role/relation/{id}', ['as' => 'role.relation', 'uses' => 'RoleController@showRelation']);
        Route::post('role/relation/{id}', ['as' => 'role.relation.post', 'uses' => 'RoleController@relation']);
        Route::resource("role", 'RoleController');
        //系统配置
        Route::get('bank_card/check/{id}/{status}', 'BankCardController@check')->name('bank_card.check');
        Route::resource("bank_card", 'BankCardController');
        Route::resource("system_config", 'SystemConfigController');
        Route::resource("black_list_ip", 'BlackListIpController');
        Route::resource("admin_action_money_log", 'AdminActionMoneyLogController');


        //会员管理
        Route::get('member/check/{id}/{status}', 'MemberController@check')->name('member.check');
        Route::get('member/assign/{id}', 'MemberController@assign')->name('member.assign');
        Route::post('member/assign/{id}', 'MemberController@post_assign')->name('member.post_assign');
        //
        Route::get('member/showGameRecordInfo/{id}', 'MemberController@showGameRecordInfo')->name('member.showGameRecordInfo');
        Route::get('member/showRechargeInfo/{id}', 'MemberController@showRechargeInfo')->name('member.showRechargeInfo');
        Route::get('member/showDrawingInfo/{id}', 'MemberController@showDrawingInfo')->name('member.showDrawingInfo');
        Route::get('member/showDividendInfo/{id}', 'MemberController@showDividendInfo')->name('member.showDividendInfo');
        Route::get('member/checkBalance/{id}', 'MemberController@checkBalance')->name('member.checkBalance');
        Route::get('member/showTransfer/{id}', 'MemberController@showTransfer')->name('member.showTransfer');
        Route::resource('member', 'MemberController');
        //
        Route::resource('dividend', 'DividendController');
        //
        Route::resource('member_login_log', 'MemberLoginLogController');
        //
        Route::resource('game_record', 'GameRecordController');
        //
        Route::resource('transfer', 'TransferController');


        //免单
        Route::resource('fs_level', 'FsLevelController');
		Route::resource('shop', 'ShopController');
		Route::resource('miandanuser', 'MiandanuserController');
		Route::resource('shopuser', 'ShopuserController');
        Route::resource('send_fs', 'SendFsController');
        Route::resource('fs', 'FsController');


        //商家
        //商家审核
        Route::resource('member_daili_apply', 'MemberDailiApplyController');
        //商家列表
        Route::resource('member_daili', 'MemberDailiController');
		Route::get('member_daili/department/{id}', 'MemberDailiController@department')->name('member_daili.department');
		Route::post('member_daili/department/{id}', 'MemberDailiController@postdepartment')->name('member_daili.department');
		Route::get('member_daili/deletedepartment/{id}', 'MemberDailiController@deletedepartment')->name('member_daili.deletedepartment');
		Route::get('member_daili/department2/{id}', 'MemberDailiController@department2')->name('member_daili.department2');
		Route::post('member_daili/department2/{id}', 'MemberDailiController@postdepartment2')->name('member_daili.department2');
		Route::get('member_daili/deletedepartment2/{id}', 'MemberDailiController@deletedepartment2')->name('member_daili.deletedepartment2');
        //优惠券
        Route::resource('member_offline', 'MemberOfflineController');
		Route::get('member_offline/classtwo/{id}', 'MemberOfflineController@classtwo')->name('member_offline.classtwo');
		Route::post('member_offline/classtwo/{id}', 'MemberOfflineController@addclasstwo')->name('member_offline.addclasstwo');
		Route::post('member_offline', 'MemberOfflineController@adddepartment')->name('member_offline.adddepartment');
        //
        Route::resource('member_offline_recharge', 'MemberOfflineRechargeController');
        //
        Route::resource('member_offline_drawing', 'MemberOfflineDrawingController');
        //
        Route::resource('member_offline_dividend', 'MemberOfflineDividendController');
        //
        Route::resource('member_offline_game_record', 'MemberOfflineGameRecordController');
        //
        Route::get('daili_money_log/show_by_id/{id}', 'DailiMoneyLogController@show_by_id')->name('daili_money_log.show_by_id');
        Route::resource('daili_money_log', 'DailiMoneyLogController');
        //
        Route::resource('send_daili_money', 'SendDailiMoneyController');
        //
        Route::resource('yj_level', 'YjLevelController');

        //财务
        //充值、存款列表
        //微信
        Route::put('recharge_weixin/confirm/{id}', 'RechargeWeixinController@confirm')->name('recharge_weixin.confirm');//确认汇款成功
        Route::resource('recharge_weixin', 'RechargeWeixinController');
        //支付宝
        Route::put('recharge_ali/confirm/{id}', 'RechargeAliController@confirm')->name('recharge_ali.confirm');//确认汇款成功
        Route::resource('recharge_ali', 'RechargeAliController');
        //银行卡
        Route::put('recharge_bank/confirm/{id}', 'RechargeBankController@confirm')->name('recharge_bank.confirm');//确认汇款成功
        Route::resource('recharge_bank', 'RechargeBankController');

        Route::put('recharge/confirm/{id}', 'RechargeController@confirm')->name('recharge.confirm');//确认汇款成功
        Route::resource('recharge', 'RechargeController');
        //提款
        Route::put('drawing/confirm/{id}', 'DrawingController@confirm')->name('drawing.confirm');//确认提款成功
        Route::resource('drawing', 'DrawingController');
        //
        Route::get('activity/check/{id}/{status}', 'ActivityController@check')->name('activity.check');
        Route::resource('activity', 'ActivityController');
		Route::resource('moments', 'MomentsController');





    });
});

//发送短信验证码
Route::get('v_sms', 'Web\WebBaseController@sendSms')->name('sendSms');