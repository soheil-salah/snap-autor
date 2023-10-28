<div class="row">
    <div class="col-2">
        <x-admin.forms.form-group type="number" label="Amount" name="amount" id="amount" min="0" value="{{ $user->ban != null && $user->ban->ban_type == 'duration' ? $user->ban->duration_amount : null }}" required />
    </div>
    <div class="col-10">
        <x-admin.forms.form-group-select label="Duration" name="pick_duration" id="pick_duration">
            <option {{ $user->ban != null && $user->ban->duration == 'minute' ? 'selected' : null }} value="minute">Minute</option>
            <option {{ $user->ban != null && $user->ban->duration == 'hour' ? 'selected' : null }} value="hour">Hour</option>
            <option {{ $user->ban != null && $user->ban->duration == 'day' ? 'selected' : null }} value="day">Day</option>
            <option {{ $user->ban != null && $user->ban->duration == 'week' ? 'selected' : null }} value="week">Week</option>
            <option {{ $user->ban != null && $user->ban->duration == 'month' ? 'selected' : null }} value="month">Month</option>
        </x-admin.forms.form-group-select>
    </div>
</div>