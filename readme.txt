=== My Custom Style Css Manager ===
Contributors: yamaimo
Tags: cloudfront, aws
Requires at least: 6.1.1
Tested up to: 6.1.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Requires PHP: 7.0

Clear CloudFront Cache

== Description ==


It is a plugin that can easily delete the CloudFront cache.
Setting is easy with only 2 steps.
* Configure IAM
* Set a CloudFront distribution ID for this plugin


== Installation ==

1. From the WP admin panel, click “Plugins” -> “Add new”.
2. In the browser input box, type “Clear CloudFront Cache”.
3. Select the “Clear CloudFront Cache” plugin and click “Install”.
4. Activate the plugin.
5. Set IAM for AWS resources where WordPress is running
IAM setting example
{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Sid": "VisualEditor0",
            "Effect": "Allow",
            "Action": "cloudfront:CreateInvalidation",
            "Resource": "*"
        }
    ]
}
6. Set a CloudFront distribution ID for this plugin

== Frequently asked questions ==



== Screenshots ==



== Changelog ==



== Upgrade notice ==



== Arbitrary section 1 ==
