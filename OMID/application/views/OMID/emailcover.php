<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Simples-Minimalistic Responsive Template</title>

      <style type="text/css">

         /* Client-specific Styles */
         #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
         body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;font-family: 'Droid';}
         /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
         .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
         .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.*/
         /*#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}*/
         img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
         a img {border:none;}
         .image_fix {display:block;}
         p {margin: 0px 0px !important;}
         table td {border-collapse: collapse;}
         table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
         a {color: #0a8cce;text-decoration: none;text-decoration:none!important;}
         /*STYLES*/
         table[class=full] { width: 100%; clear: both; }
         /*IPAD STYLES*/
         @media only screen and (max-width: 640px) {
         a[href^="tel"], a[href^="sms"] {
         text-decoration: none;
         color: #0a8cce; /* or whatever your want */
         pointer-events: none;
         cursor: default;
         }
         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
         text-decoration: default;
         color: #0a8cce !important;
         pointer-events: auto;
         cursor: default;
         }
         table[class=devicewidth] {width: 440px!important;text-align:center!important;}
         table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
         img[class=banner] {width: 440px!important;height:220px!important;}
         img[class=colimg2] {width: 440px!important;height:220px!important;}


         }
         /*IPHONE STYLES*/
         @media only screen and (max-width: 480px) {
         a[href^="tel"], a[href^="sms"] {
         text-decoration: none;
         color: #0a8cce; /* or whatever your want */
         pointer-events: none;
         cursor: default;
         }
         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
         text-decoration: default;
         color: #0a8cce !important;
         pointer-events: auto;
         cursor: default;
         }
         table[class=devicewidth] {width: 280px!important;text-align:center!important;}
         table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
         img[class=banner] {width: 280px!important;height:140px!important;}
         img[class=colimg2] {width: 280px!important;height:140px!important;}
         td[class=mobile-hide]{display:none!important;}
         td[class="padding-bottom25"]{padding-bottom:25px!important;}

         }
      </style>
   </head>
   <body>
<!-- Start of preheader -->
<!--<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="preheader" >-->
<!--   <tbody>-->
<!--      <tr>-->
<!--         <td>-->
<!--            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">-->
<!--               <tbody>-->
<!--                  <tr>-->
<!--                     <td width="100%">-->
<!--                        <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">-->
<!--                           <tbody>-->
<!--                              <!-- Spacing -->
<!--                              <tr>-->
<!--                                 <td width="100%" height="10"></td>-->
<!--                              </tr>-->
<!--                              <!-- Spacing -->
<!--                              <tr>-->
<!--                                 <td>-->
<!--                                    <table width="100" align="left" border="0" cellpadding="0" cellspacing="0">-->
<!--                                       <tbody>-->
<!--                                          <tr>-->
<!--                                             <td align="left" valign="middle" style="font-size: 12px;color: #666666" st-content="viewonline" class="mobile-hide">-->
<!--                                                <a href="#" style="text-decoration: none; color: #666666">مشاهاده وب سایت</a>-->
<!--                                             </td>-->
<!--                                          </tr>-->
<!--                                       </tbody>-->
<!--                                    </table>-->
<!--                                    <table width="100" align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidth">-->
<!--                                       <tbody>-->
<!--                                          <tr>-->
<!--                                             <td width="30" height="30" align="right">-->
<!--                                                <div class="imgpop">-->
<!--                                                   <a target="_blank" href="#">-->
<!--                                                   <img src="../../images/email/facebook.png" alt="" border="0" width="30" height="30" style="display:block; border:none; outline:none; text-decoration:none;">-->
<!--                                                   </a>-->
<!--                                                </div>-->
<!--                                             </td>-->
<!--                                             <td align="left" width="20" style="font-size:1px; line-height:1px;">&nbsp;</td>-->
<!--                                             <td width="30" height="30" align="center">-->
<!--                                                <div class="imgpop">-->
<!--                                                   <a target="_blank" href="#">-->
<!--                                                   <img src="img/twitter.png" alt="" border="0" width="30" height="30" style="display:block; border:none; outline:none; text-decoration:none;">-->
<!--                                                   </a>-->
<!--                                                </div>-->
<!--                                             </td>-->
<!--                                             <td align="left" width="20" style="font-size:1px; line-height:1px;">&nbsp;</td>-->
<!--                                             <td width="30" height="30" align="center">-->
<!--                                                <div class="imgpop">-->
<!--                                                   <a target="_blank" href="#">-->
<!--                                                   <img src="img/linkedin.png" alt="" border="0" width="30" height="30" style="display:block; border:none; outline:none; text-decoration:none;">-->
<!--                                                   </a>-->
<!--                                                </div>-->
<!--                                             </td>-->
<!--                                          </tr>-->
<!--                                       </tbody>-->
<!--                                    </table>-->
<!--                                 </td>-->
<!--                              </tr>-->
<!--                              <!-- Spacing -->
<!--                              <tr>-->
<!--                                 <td width="100%" height="10"></td>-->
<!--                              </tr>-->
<!--                              <!-- Spacing -->
<!--                           </tbody>-->
<!--                        </table>-->
<!--                     </td>-->
<!--                  </tr>-->
<!--               </tbody>-->
<!--            </table>-->
<!--         </td>-->
<!--      </tr>-->
<!--   </tbody>-->
<!--</table>-->
<!-- End of preheader -->
<!-- Start of header -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header">
   <tbody>
      <tr>
         <td>
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
               <tbody>
                  <tr>
                     <td width="100%">
                        <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                           <tbody>
                              <!-- Spacing -->
                              <tr>
                                 <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td>
                                    <!-- logo -->
                                    <table width="140" align="center" border="0" cellpadding="0" cellspacing="0" class="devicewidth">
                                       <tbody>
                                          <tr>
                                             <td width="169" height="45" align="center">
                                                <div class="imgpop">
                                                   <a target="_blank" href="#">
                                                   <img src="http://cdn.persiangig.com/preview/5RmfCseBLv/omid.png" alt="" border="0" width="280" height="140" style="display:block; border:none; outline:none; text-decoration:none;">
                                                   </a>
                                                </div>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <!-- end of logo -->
                                 </td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                              </tr>
                              <!-- Spacing -->
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of Header -->
<!-- Start of main-banner -->
<!--<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="banner">-->
<!--   <tbody>-->
<!--      <tr>-->
<!--         <td>-->
<!--            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">-->
<!--               <tbody>-->
<!--                  <tr>-->
<!--                     <td width="100%">-->
<!--                        <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth">-->
<!--                           <tbody>-->
<!--                              <tr>-->
<!--                                 <!-- start of image -->
<!--                                 <td align="center" st-image="banner-image">-->
<!--                                    <div class="imgpop">-->
<!--                                       <a target="_blank" href="#"><img width="200" border="0" height="160" alt="" border="0" style="display:block; border:none; outline:none; text-decoration:none;" src="http://cdn.persiangig.com/preview/NjQsUefZCz/EmailEnvelope.jpg" class="banner"></a>-->
<!--                                    </div>-->
<!--                                 </td>-->
<!--                              </tr>-->
<!--                           </tbody>-->
<!--                        </table>-->
<!--                        <!-- end of image -->
<!--                     </td>-->
<!--                  </tr>-->
<!--               </tbody>-->
<!--            </table>-->
<!--         </td>-->
<!--      </tr>-->
<!--   </tbody>-->
<!--</table>-->
<!-- End of main-banner -->
<!-- Start of seperator -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="seperator">
   <tbody>
      <tr>
         <td>
            <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth">
               <tbody>
                  <tr>
                     <td align="center" height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of seperator -->
<!-- Start Full Text -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="full-text">
   <tbody>
      <tr>
         <td>
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
               <tbody>
                  <tr>
                     <td width="100%">
                        <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                           <tbody>
                              <!-- Spacing -->
                              <tr>
                                 <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td>
                                    <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                       <tbody>
                                          <!-- Title -->
                                          <tr>
                                             <td style="font-size: 30px; color: #333333; text-align:center; line-height: 30px;" st-title="fulltext-heading">
                                                بازیابی رمز عبور
                                             </td>
                                          </tr>
                                          <!-- End of Title -->
                                          <!-- spacing -->
                                          <tr>
                                             <td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                          </tr>
                                          <!-- End of spacing -->
                                          <!-- content -->
                                          <tr>
                                             <td style="font-size: 16px; color: #666666; text-align:center; line-height: 30px;" st-content="fulltext-content">
                                                کاربر عزیز، شما هم اکنون میتوانید بر روی لینک زیر کلیک کنید و وارد صفحه تغییر رمز عبور شوید و رمز عبور خود را تغییر دهید
                                             </td>
                                          </tr>
                                          <!-- End of content -->
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                              </tr>
                              <!-- Spacing -->
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- end of full text -->
<!-- Start of Postfooter -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="postfooter" >
   <tbody>
      <tr>
         <td>
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
               <tbody>
                  <tr>
                     <td width="100%">
                        <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                           <tbody>
                              <tr>
                                 <td align="center" valign="middle" style="font-size: 14px;color: #666666" st-content="postfooter">
                                    <a href="<?php echo $message_body; ?>" style="text-decoration: none; color: #0a8cce"><?php echo $message_body; ?></a>
                                 </td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td width="100%" height="20"></td>
                              </tr>
                              <!-- Spacing -->
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of postfooter -->

   </body>
   </html>