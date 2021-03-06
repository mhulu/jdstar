<?php

return [
	'name' => 'asdf',
	// 默认代理器名称
	'Default' => 'Bech',
	//  短信验证码长度
	'AuthcodeLength' => 4,
	// 信息模板，各个代理商应该统一
	'Templates' => [
		'auth' => '【微脉事】您的验证码是：{num}，请在5分钟内完成验证',
		'success' => '您已成功注册，「半亩方塘一鉴开，天光云影共徘徊」，祝您使用愉快【微脉事】',
		'danger' => '您的账号信息刚刚被修改，如果不是本人操作请尽快到系统查看【微脉事】',
		'warning' => '您有新的事务等待处理，请登录查看【微脉事】',
		'error' => '您的账号频繁登录错误并被系统暂时锁定，如果不是本人操作请尽快到系统查看【微脉事】',
		'info' => '您的系统有新消息，请登录查看【微脉事】',
		'wxAuthorized' => '您的公众号已成功授权，「半亩方塘一鉴开，天光云影共徘徊」，祝您使用愉快。【微脉事】',
		'wxAuthorizationCancelled' => '您的公众号刚刚取消了授权，「人分千里外，兴在一杯中」，期待与您再次重逢。【微脉事】',
		'wxAuthorizationChanged' => '您的公众号刚刚修改了授权，请进入后台进行确认。【微脉事】',
	],
	/*
		         * -----------------------------------
		         * bechSMS
		         * -----------------------------------
		         * website:http://http://sms.bechtech.cn/
	*/
	'Bech' => [
		'Url' => env('BECH_URL', 'your-url'),
		'Params' => [
			'akey' => env('BECH_AKEY', 'your-access-key'),
			'skey' => env('BECH_SKEY', 'your-secret-key'),
		],
		'ErrorCode' => [
			'03' => '用户名密码错误',
			'04' => '短信余额不足',
			'05' => '短信内容含有限制词',
			'06' => '短信内容不合法',
			'07' => '发送频繁，请过段时间再试',
			'13' => '用户账户已被冻结',
			'98' => '发送内容与免审模板不一致',
			'99' => '短信服务器升级中，请稍后再试',
			'100' => '短信服务器例行维护，请稍后再试',
		],
	],
];
