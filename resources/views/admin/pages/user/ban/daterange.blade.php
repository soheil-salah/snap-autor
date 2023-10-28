<x-admin.forms.form-group label="Date Range" name="daterange" id="daterange" class="daterange" value="{{ $user->ban != null && $user->ban->ban_type == 'daterange' ? date('m/d/Y', strtotime($user->ban->from)).' - '.date('m/d/Y', strtotime($user->ban->to)) : null }}" />

<script src="{{ asset('dist/libs/bootstrap-material-datetimepicker/node_modules/moment/moment.js') }}"></script>
<script src="{{ asset('dist/libs/daterangepicker/daterangepicker.js') }}"></script>
<script>
    $(".daterange").daterangepicker();
</script>