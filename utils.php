<?php
include_once("env.php");

function sendVerificationMail($email, $verificationCode) {

	$subject="Verify Email";
	$headers .= "MIME-Version: 1.0"."\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
	$headers .= 'From:MailComics'."\r\n";
	$messages = '<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="x-apple-disable-message-reformatting">
		<!--[if mso]>
	  <noscript>
		<xml>
		  <o:OfficeDocumentSettings>
			<o:PixelsPerInch>96</o:PixelsPerInch>
		  </o:OfficeDocumentSettings>
		</xml>
	  </noscript>
	  <![endif]-->
		<style>
			table,
			td,
			div,
			h1,
			p {
				font-family: Arial, sans-serif;
			}
		</style>
	</head>
	
	<body style="margin:0;padding:0;">
		<table role="presentation"
			style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
			<tr>
				<td align="center" style="padding:0;">
					<table role="presentation"
						style="min-width:400px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
						<tr>
							<td align="center" style="padding:24px 0 24px 0;background:#70bbd9;">
								<h1>MailComics</h1>
							</td>
						</tr>
						<tr>
							<td style="padding:36px 30px 42px 30px;">
								<table role="presentation"
									style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
									<tr>
										<td style="padding:0;">
											<table role="presentation"
												style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
												<tr>
													<td style="padding:0;vertical-align:top;color:#153643;">
														<p
															style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
															This mail was sent to you because you signed up at <a href="#"
															style="color:#ee4c50;text-decoration:underline;">MailComics.</a> Please verify your email by clicking <a href="' . (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/php-sumeetmathpati/email_verification.php?code='.$verificationCode.'"
																style="color:#ee4c50;text-decoration:underline;">here</a>
														</p>
														<p>
															<a href="' . (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . HOST . '/php-sumeetmathpati/email_verification.php?code='.$verificationCode.'">
																<button
																	style="background-color: #ee4c50; color: white; padding: 8px 8px; border: 0;">Yes,
																	Sign me up!</button>
															</a>
														</p>
														<p
															style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
															Thanks for signing up on <a href="#"
																style="color:#ee4c50;text-decoration:underline;">MailComics</a>
															You will recieve comics every 5 minutes, for FREE.
														</p>
														<p
															style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
															<a href="' . (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . HOST . '/php-sumeetmathpati/remove_email.php?code='.$verificationCode.'"
																style="color:#ee4c50;text-decoration:underline;"><br>No!
																This wan not me.</a>
														</p>
													</td>
	
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td style="padding:30px;background:#ee4c50;">
								<table role="presentation"
									style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
									<tr>
										<td style="padding:0;width:50%;" align="left">
											<p
												style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
												&reg; MailComics 2021<br />
											</p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
	
	</html>';
	
	mail($email,$subject,$messages,$headers);
}

function sendComicMail($email, $activationcode, $imgUrl, $imgName) {
	$subject = 'New Comic from MailComics';
	$htmlMessage = '
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width,initial-scale=1">
			<title></title>
			<!--[if mso]>
		<noscript>
			<xml>
			<o:OfficeDocumentSettings>
				<o:PixelsPerInch>96</o:PixelsPerInch>
			</o:OfficeDocumentSettings>
			</xml>
		</noscript>
		<![endif]-->
			<style>
				table,
				td,
				div,
				h1,
				p {
					font-family: Arial, sans-serif;
				}
			</style>
		</head>

		<body style="margin:0;padding:0;">
			<table role="presentation"
				style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
				<tr>
					<td align="center" style="padding:0;">
						<table role="presentation"
							style="min-width:400px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
							<tr>
								<td align="center" style="padding:24px 0 24px 0;background:#70bbd9;">
									<h1>MailComics</h1>
								</td>
							</tr>
							<tr>
								<td style="padding:36px 30px 42px 30px;">
									<table role="presentation"
										style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
										<tr>
											<td style="padding:0 0 36px 0;color:#153643;">
												<h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">
													"' . $imgName . '"
												</h1>
											</td>
										</tr>
										<tr>
											<td style="padding:0;">
												<table role="presentation"
													style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
													<tr>
														<td style="width:260px;padding:0;vertical-align:top;color:#153643;">
															<p
																style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
																<img src="' . $imgUrl . '" alt="" width="100%" maxwidth="600px"
																	style="height:auto;display:block;
																	box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;" />
															</p>
															<p
																style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
																Lorem ipsum.</p>
															
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="padding:30px;background:#ee4c50;">
									<table role="presentation"
										style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
										<tr>
											<td style="padding:0;width:50%;" align="left">
												<p
													style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
													&reg; MailComics 2021<br /><a href="' . (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . HOST . '/php-sumeetmathpati/remove_email.php?code='.$activationcode.'&unsub=1"
														style="color:#ffffff;text-decoration:underline;">Unsubscribe</a>
												</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</body>
		</html>';

	$encoded_content = chunk_split(base64_encode(file_get_contents($imgName . ".png")));
	$random_hash = md5(date('r', time())); 

	// Headers
	$headers = "From: sumeet221b@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\"\r\n"; 
	$headers .= "X-Priority: 3\r\n";
	$headers .= "X-MSMail-Priority: Normal\r\n";    
	$headers .= "X-Mailer: PHP/" . phpversion();

	// Message body
	$body = "--PHP-mixed-" . $random_hash . "\r\n";
	$body .= "Content-Type: text/html; charset=\"UTF-8\"\r\n";
	$body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
	$body .= $htmlMessage;
	$body .= "\r\n\r\n";
	$body .= "\r\n--PHP-mixed-" . $random_hash . "\r\n\r\n";

	// Attachment body
	$body .= "--PHP-mixed-" . $random_hash . "\r\n";
	$body .= "Content-Type: multipart/mixed; name=\"$imgName .png\"\r\n";
	$body .= "Content-Transfer-Encoding: base64\r\n";
	$body .= "Content-Disposition: attachment; filename=\"$imgName .png\"\r\n\r\n";
	$body .= $encoded_content;
	$body .= "\r\n--PHP-mixed-" . $random_hash . "\r\n\r\n";

	mail($email, $subject, $body, $headers);
}

function getComicJson() {
	$url="https://c.xkcd.com/random/comic/";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$a = curl_exec($ch); 
	$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); 

	// echo $url;
	$comicNumber = parse_url($url);
	$data = file_get_contents("https://xkcd.com" . $comicNumber['path'] ."info.0.json");
	$decodedData = json_decode($data);
	return $decodedData;
}
?>