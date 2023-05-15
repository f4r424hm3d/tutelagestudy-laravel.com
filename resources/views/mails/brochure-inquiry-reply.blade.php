<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width" />
</head>

<body
  style="width:100%;height:100%;background:#efefef;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;color:#3E3E3E;font-family:Helvetica, Arial, sans-serif;line-height:1.65;margin:0;padding:0;">
  <table border="0" cellpadding="0" cellspacing="0"
    style="width:100%;background:#efefef;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;color:#3E3E3E;font-family:Helvetica, Arial, sans-serif;line-height:1.65;margin:0;padding:0;">
    <tr>
      <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
        <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
          <tr>
            <td valign="top" align="center" class="masthead" style="padding:20px 0;background:#03618c;color:white;">
              <h1 style="font-size:32px;margin:0 auto;max-width:90%;line-height:1.25;">
                <a href="{{ url('/') }}" target="_blank" style="text-decoration:none;color:#ffffff;">Tutelage Study</a>
                <p style="margin-bottom:0;line-height:12px;font-weight:normal;margin-top:15px;font-size:18px;"></p>
              </h1>
            </td>
          </tr>
          <tr>
            <td valign="top" class="content" style="background:white;padding:20px 35px 10px 35px;">
              <h3>Hello
                <?php print $name; ?>,
              </h3>
              <p style="text-align: justify">
                Thank you for your interest in <span style="color: black; font-weight: bold;">
                  <?php print $intrested_university; ?>
                </span> brochure. One of our admission counsellors will be in touch with you shortly.
                <br>
                {{-- <br>
                <span style="color: black; font-weight: bold;">
                  Download your brochure by <a href="{{ asset($brochure_path) }}"><b>CLICK HERE</b></a> for {{
                  $destination
                  }}.
                </span> --}}
                <br>
                <br>
                You can call us directly <a href="tel:919818560331">+91 9818 560 331</a>
                <br>
                In case of any queries, feel free to contact us at <span
                  style="color: #fcb709;font-weight:bold">info@tutelagestudy.com</span>
              </p>
              <hr>
            </td>
          </tr>
          <tr>
            <td valign="top" align="center" class="masthead" style="padding:20px 0;background:#03618c;color:white;">
              <h1 style="font-size:32px;margin:0 auto;max-width:90%;line-height:1.25;">
              </h1>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>