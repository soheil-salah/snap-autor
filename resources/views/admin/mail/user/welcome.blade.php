<x-email-template-layout>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p>Hi {{ $user->firstname.' '.$user->lastname }},</p>
                <p>Your account has been created, and you can find the credentials below</p>
                <p>Email : {{ $user->email }}</p>
                <p>Password : {{ $password }}</p>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                    class="btn btn-primary">
                    <tbody>
                        <tr>
                            <td align="left">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td> <a href="{{ route('dashboard') }}" target="_blank">Login to your account</a> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>If you faced some problems with logging in. Please contact us at {{ 'info@'.config('app.domain') }}</p>
                <p>Glad you could join and welcome aboard 😊.</p>
                <p><b>Important Hint :</b> Please don't share this email with anyone.</p>
            </td>
        </tr>
    </table>

</x-email-template-layout>