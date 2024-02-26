<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Attollere Şifre Sıfırla</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding: 10px 0 30px 0;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                   style="border: 1px solid #cccccc; border-collapse: collapse;">
                <tr>
                    <td align="center" bgcolor="#894b9d"
                        style="padding: 80px 0 70px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                        <img src="https://attollere.com/images/mail-logo.png" alt="Attollere" style="display: block;"/>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                    <b>Merhaba, {{ $user->first_name }} {{ $user->last_name }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                    Aşağıdaki bağlantıya tıklayarak şifrenizi sıfırlayabilirsiniz.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ url('https://hesap.attollere.com/sifre-sifirla').'forgot-password.blade.php/'.$token }}">Şifre
                                        Sıfırla</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#894b9d" style="padding: 30px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;"
                                    width="75%">
                                    © Copyright 2022-2023 Attollere Elektronik Hizmetler Tic. A.Ş.
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
</html>
