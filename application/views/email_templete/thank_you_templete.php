<?php
   $siteName = $mailData['siteName'];
   $UserName = $mailData['UserName'];
?>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>121 lifestyle</title>
      <!-- <link href="https://fonts.googleapis.com/css?family=roboto:300,300i,400,400i,500,500i,600,700,800,900" rel="stylesheet"> -->
   </head>
   <body style="background-color: #f1f1f1; font-family: roboto, sans-serif; font-size: 15px; margin: 0; padding: 0;">
      <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" style="background: #f1f1f1; font-family: "roboto", sans-serif; font-size: 14px;">
      <tbody>
         <tr>
            <td align="center">
               <table border="0" cellpadding="10" cellspacing="0" width="600" align="center">
                  <tbody>
                     <tr>
                        <td align="center">
                           <table border="0" cellpadding="10" cellspacing="0" width="600">
                              <tbody>
                                 <tr>
                                    <td align="center"><a href=""><img src="<?= base_url('assets/admin/img/logo.png');?>"></a></td>
                                 </tr>
                              </tbody>
                           </table>
                           <table border="0" cellpadding="10" cellspacing="10" width="600" style="background: #fff; border:3px solid #ddd;">
                              <tbody>
                                 <tr>
                                    <td align="center" style="font-size: 30px; font-weight: bold; color: #222; letter-spacing: 1px; border-bottom:2px solid #115aa6;">Account Created</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <table border="0" cellpadding="0" cellspacing="0" width="600">
                                          <tbody>
                                             <tr>
                                                <td align="left">Hi <?= $UserName; ?> 
                                                  <br>Welcome to <?= $siteName;?><br>
                                                  Thank You ! For Register with us.<br />
                                                  Please wait for the Admin Approval for Login you account.<br />
                                                  Your Account has been created Successfully <br>
                                                  </b><br>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <table border="0" cellpadding="0" cellspacing="0" width="600">
                                          <tbody>
                                             <tr>
                                                <td align="left" valign="top">
                                                   <p>Team, <br><a href="<?= base_url();?>"><?= $siteName; ?></a></p>
                                                </td>
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
            </td>
         </tr>
      </tbody>
      </table>
   </body>
</html>
