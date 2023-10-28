<x-email-template-layout>
    
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p>Goodbye {{ $user->firstname.' '.$user->lastname }},</p>
                <p>Your account has been removed</p>
                <p>All your data has been removed from our database</p>
                <p>We are sad to see you leave us 😔. We hope to join us again</p>
            </td>
        </tr>
    </table>

</x-email-template-layout>