<!DOCTYPE html>
<html>

<head>
    <title>Email template</title>
    <style>
        @page {
            margin: 40px 50px;
            size: A4;
        }

        body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100%;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .container {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
        }
    </style>
</head>

<body style="margin:0; padding:0; font-family:'SuisseScreenRegular', sans-serif; background:#ffffff;">
    <div class="container">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;">
            <tr>
                <td align="center">
                    <table width="700" cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 40px auto;">

                        <!-- Header Logo -->
                        <tr>
                            <td align="center" style="padding-top:40px; padding-bottom:10px;">
                                <img src="{{ public_path('img/Logo.png') }}" width="85" alt="Logo" style="display:block;">
                            </td>
                        </tr>

                        <!-- Title -->
                        <tr>
                            <td align="center"
                                style="font-size: 22px;letter-spacing: -0.5px;font-weight:bold;line-height: 25px;padding-top: 20px;padding-bottom: 70px;font-family:'SangBleuOGBold';">
                                VIREMENT BANCAIRE
                            </td>
                        </tr>

                        <!-- Body Paragraph -->
                        <tr>
                            <td style="font-size:22px; font-weight:400; color:#000; line-height:1.45; padding:10px 0 10px 0;">

                                <p style="margin:0 0 20px 0;">
                                    Madame, Monsieur,
                                </p>

                                <p style="margin:0 0 20px 0;">
                                    Ci-dessous, vous trouverez les informations relatives à un
                                    versement e-banking en faveur de Civitas Suisse. En cas de
                                    question(s), n’hésitez pas à contacter notre trésorier, qui vous
                                    répondra au plus vite : <a href="" style="color: #0600FF;">tresorier@civitassuisse.ch.</a>
                                </p>

                            </td>
                        </tr>
                        <tr>
                            <td style="background:#D9D9D933;padding: 18px 25px;font-size: 22px;line-height: 1.4;">
                                <p style="margin:0 0 30px 0;">Versement en faveur de :</p>
                                <p style="margin:0;">Civitas Suisse</p>
                                <p style="margin:0;">C.P. 3000 8 Berne</p>
                                <p style="margin:0;">IBAN CH57 0900 0000 1772 4572 3</p>
                                <p style="margin:0;">Motif : Don de soutien</p>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-size:22px; color:#000; padding-top:25px; line-height:1.6;">

                                <p style="margin:0 0 35px 0;">
                                    Nous vous remercions d’avance pour votre précieux soutien.
                                </p>

                                <p style="margin:0 0 70px 0;">
                                    Pour le Comité de Civitas Suisse,
                                </p>

                                <p style="margin:0;">
                                    Alain Späth, président
                                </p>

                            </td>
                        </tr>

                        <!-- Bottom Image -->
                        <tr>
                            <td align="center" style="padding-top:40px; display: flex;justify-content: end;">
                                <img src="{{ public_path('img/bottom-img.png') }}" width="500" alt="Bottom Image" style="display:block;">
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>