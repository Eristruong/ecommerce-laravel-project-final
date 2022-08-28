<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <!-- NAME: 1 COLUMN -->
        <!--[if gte mso 15]>
        <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>*|MC:SUBJECT|*</title>
        <link rel="stylesheet" href="{{ asset('public/frontend/mail/mail.css') }}">
   
</head>
    <body>
        <!--*|IF:MC_PREVIEW_TEXT|*-->
        <!--[if !gte mso 9]><!----><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;">Đơn hàng của bạn từ : </span><!--<![endif]-->
        <!--*|END:IF|*-->
        <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                        <!-- BEGIN TEMPLATE // -->
                        <!--[if (gte mso 9)|(IE)]>
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                        <tr>
                        <td align="center" valign="top" width="600" style="width:600px;">
                        <![endif]-->
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                            <tr>
                                <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnBoxedTextBlock" style="min-width:100%;">
    <!--[if gte mso 9]>
	<table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
	<![endif]-->
	<tbody class="mcnBoxedTextBlockOuter">
        <tr>
            <td valign="top" class="mcnBoxedTextBlockInner">
                
				<!--[if gte mso 9]>
				<td align="center" valign="top" ">
				<![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnBoxedTextContentContainer">
                    <tbody><tr>
                        
                        <td style="padding-top:9px; padding-left:18px; padding-bottom:9px; padding-right:18px;">
                        
                            <table border="0" cellspacing="0" class="mcnTextContentContainer" width="100%" style="min-width: 100% !important;background-color: #EA5B3A;">
                                <tbody><tr>
                                    <td valign="top" class="mcnTextContent" style="padding: 18px;color: #FFFFFF;font-family: Helvetica;font-size: 14px;font-weight: normal;text-align: center;">
                                        <span style="font-size:20px"><strong>Website cung cấp linh kiện máy tính</strong></span>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
				<!--[if gte mso 9]>
				</td>
				<![endif]-->
                
				<!--[if gte mso 9]>
                </tr>
                </table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                
                                    
                                        <img align="center" alt="" src="https://mcusercontent.com/2dbe3b736533c19a039134b13/images/3d2dbb97-7bc0-4178-93c6-8ec3ad2aec10.jpg" width="157.92000000000002" style="max-width:1200px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                    
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px;color: #D12A08;">
                        
                            <h1><span style="color:#A52A2A">Thông tin đơn hàng của {{ $name }}&nbsp;!</span></h1>
<br>
<em><strong>
	@foreach ($billdetails as $item)
	- Sản phẩm : {{ $item['productInfo']->productName }} <br>
	- Đơn giá : {{ number_format($item['productInfo']->listPrice) }} vn₫ <br>
	- Số lượng sản phẩm : {{ $item['quanty'] }}<br>
		
	@endforeach	
- Số điện thoại : {{ $phonenumber }} <br>
- Ngày đặt hàng : {{ $date }} <br>
- Bạn đang có {{ $bills->totalQuanty }} sản phẩm trong đơn hàng <br>
- Tổng số tiền thanh toán của bạn là {{ number_format($bills->totalPrice) }} vn₫ </strong></em><br>
<br>
Đơn hàng của bạn đang trong quá trình xác nhận. Cảm ơn bạn đã tin tưởng đặt mua sản phẩm từ chúng tôi !<br>
Xem thông tin và tình trạng của đơn hàng tại đây:<br>
&nbsp;
                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;">
    <tbody class="mcnButtonBlockOuter">
        <tr>
            <td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" valign="top" align="center" class="mcnButtonBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border: 1px none;border-radius: 50px;background-color: #EB3A6C;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: &quot;Comic Sans MS&quot;, &quot;Marker Felt-Thin&quot;, Arial, sans-serif; font-size: 16px; padding: 18px;">
                                <a class="mcnButton " title="Xem đơn hàng của bạn" href="http://localhost:8080/weblinhkien/info/1" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Xem đơn hàng của bạn</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px;color: #EA5B3A;">
                        
                            <div style="text-align: center;"><span style="font-size:11px"><strong>Liên hệ với chúng tôi</strong></span>.</div>

                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowBlock" style="min-width:100%;">
    <tbody class="mcnFollowBlockOuter">
        <tr>
            <td align="center" valign="top" style="padding:9px" class="mcnFollowBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentContainer" style="min-width:100%;">
    <tbody><tr>
        <td align="center" style="padding-left:9px;padding-right:9px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnFollowContent">
                <tbody><tr>
                    <td align="center" valign="top" style="padding-top:9px; padding-right:9px; padding-left:9px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0">
                            <tbody><tr>
                                <td align="center" valign="top">
                                    <!--[if mso]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                    <![endif]-->
                                    
                                        <!--[if mso]>
                                        <td align="center" valign="top">
                                        <![endif]-->
                                        
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked" style="display:inline;">
                                                 
                                                <tbody><tr>
                                                    <td align="center" valign="top" class="mcnFollowIconContent" style="padding-right:10px; padding-bottom:9px;">
                                                        <a href="http://plus.google.com" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-googleplus-96.png" alt="Google Plus" class="mcnFollowBlockIcon" width="48" style="width:48px; max-width:48px; display:block;"></a>
                                                    </td>
                                                </tr>
                                                
                                                
                                            </tbody></table>
                                        
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                        <!--[if mso]>
                                        <td align="center" valign="top">
                                        <![endif]-->
                                        
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked" style="display:inline;">
                                                 
                                                <tbody><tr>
                                                    <td align="center" valign="top" class="mcnFollowIconContent" style="padding-right:10px; padding-bottom:9px;">
                                                        <a href="http://www.facebook.com/phuclb2306" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-96.png" alt="Facebook" class="mcnFollowBlockIcon" width="48" style="width:48px; max-width:48px; display:block;"></a>
                                                    </td>
                                                </tr>
                                                
                                                
                                            </tbody></table>
                                        
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                        <!--[if mso]>
                                        <td align="center" valign="top">
                                        <![endif]-->
                                        
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked" style="display:inline;">
                                                 
                                                <tbody><tr>
                                                    <td align="center" valign="top" class="mcnFollowIconContent" style="padding-right:10px; padding-bottom:9px;">
                                                        <a href="http://weblinhkien.tk" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-96.png" alt="Website" class="mcnFollowBlockIcon" width="48" style="width:48px; max-width:48px; display:block;"></a>
                                                    </td>
                                                </tr>
                                                
                                                
                                            </tbody></table>
                                        
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                        <!--[if mso]>
                                        <td align="center" valign="top">
                                        <![endif]-->
                                        
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked" style="display:inline;">
                                                 
                                                <tbody><tr>
                                                    <td align="center" valign="top" class="mcnFollowIconContent" style="padding-right:0; padding-bottom:9px;">
                                                        <a href="mailto:tsphuc.19it6@vku.udn.vn" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-forwardtofriend-96.png" alt="Email" class="mcnFollowBlockIcon" width="48" style="width:48px; max-width:48px; display:block;"></a>
                                                    </td>
                                                </tr>
                                                
                                                
                                            </tbody></table>
                                        
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                    <!--[if mso]>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table>

            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                        
                            Đây là thư được gửi tự đông vui lòng không phản hồi lại email này !<br>
<em>Copyright ©&nbsp; Website linh kien All rights reserved.</em><br>
&nbsp;


<div class="selection_img_search" id="image_search" style="visibility: hidden;">&nbsp;</div>

                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                    <tbody><tr>
                        <td>
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                        </table>
                        <!--[if (gte mso 9)|(IE)]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                        <!-- // END TEMPLATE -->
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>
