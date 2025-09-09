<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rss extends CI_Controller {	
	public function index()
	{
		header("Content-Type: application/rss+xml; charset=UTF-8");
		echo '<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
  <channel>
    <title>대낙팡 - 피파대낙 최저가 500원부터</title>
    <link>https://xn--b20bo9bb72c.com/</link>
    <description><![CDATA[
      피파대낙 최저가 500원부터! 제일 빠른 피파대낙사이트는 대낙팡! FC온라인대낙 & 피파온라인4 PC방 버닝 이벤트 피파대리업체 대리팡 피파대낙업체 대낙팡 추천
    ]]></description>
    <language>ko</language>
    <pubDate>'.date("r").'</pubDate>
    <managingEditor>item_pang@naver.com</managingEditor>

    <item>
      <title>대낙팡 - 피파대낙 최저가 500원부터</title>
      <link>https://xn--b20bo9bb72c.com</link>
      <description><![CDATA[
        피파대낙 최저가 500원부터! 제일 빠른 피파대낙사이트는 대낙팡! FC온라인대낙 & 피파온라인4 PC방 버닝 이벤트 피파대리업체 대리팡 피파대낙업체 대낙팡 추천
      ]]></description>
      <category>피파대낙</category>
      <author>대낙팡</author>
      <guid isPermaLink="true">https://xn--b20bo9bb72c.com/</guid>
      <pubDate>'.date("r").'</pubDate>
    </item>
  </channel>
</rss>';
		
				
	}
}


