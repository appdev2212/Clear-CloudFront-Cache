<?php
/*
  Plugin Name: CloudFrontCacheClear
  Plugin URI:
  Description: CloudFrontのキャッシュをクリアする
  Version: 1.0.0
  Author: Yamaimo
  Author URI:https://it.kensan.net/
  License: GPLv2
 */
if (is_plugin_active('staticpress-s3/plugin.php')) {
	//有効状態なら実行する内容
} else {
	include('aws.phar');	
}
use Aws\CloudFront\CloudFrontClient;
class CloudFrontCacheClearExe
{


    function exe($distribute)
    {
        if (is_admin() && is_user_logged_in()) {

            try {
                $cloudFront = CloudFrontClient::factory([
                'region'  => 'ap-northeast-1',
                ]);


                $cloudFront->createInvalidation([
                     'DistributionId' => $distribute,
                         'CallerReference' => strval(time()),
                         'Paths' => (object)[
                             'Quantity' => 1,
                             'Items' =>  (object) array('/*')
                         ]
                    ]);
            } catch (Exception $e) {
                $errorMsg = $e->getMessage();
            }
            // 画面にメッセージを表示
            if(isset($errorMsg)){
                $message_html = '<div class="notice notice-success is-dismissible">';
                $message_html .='<p>キャッシュ削除に失敗しました</p>';
                $message_html .='<p>'.$errorMsg.'</p>';
                $message_html .='</div>';
            } else {
                $message_html =<<<EOF
<div class="notice notice-success is-dismissible">
  <p>
          キャッシュをクリアに成功しました！
  </p>
</div>
EOF;

            }
            print $message_html;
        }

	}
}

           
