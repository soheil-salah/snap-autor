<x-email-template-layout>
    
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p>Sorry {{ $user->firstname.' '.$user->lastname }},</p>
                <p>Your account has been banned</p>
                
                @if($user->ban->ban_type == 'duration')
                <p>Your account has been banned for {{ $user->ban->duration_amount }} {{ $user->ban->duration }}</p>
                @elseif($user->ban->ban_type == 'daterange')
                <p>Your account has been banned from date <b>{{ date('Y-m-d', strtotime($user->ban->from)) }}</b> to date <b>{{ date('Y-m-d', strtotime($user->ban->to)) }}</b></p>
                @elseif($user->ban->ban_type == 'forever')
                <p>Your account has been banned until further notice</p>
                @endif

                <p>If you feel there's misunderstand or you banned by mistake. Please contact us at {{ 'support@'.config('app.domain') }} and we will solve this issue.</p>
            </td>
        </tr>
    </table>

</x-email-template-layout>