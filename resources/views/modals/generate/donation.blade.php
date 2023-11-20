<div class="mb-2">
    <label>Range From</label>
    <input type="date" id="from" name="from" value="{{ old('from') ?? $from ?? '' }}" class="form-control">
</div>

<div class="mb-2">
    <label>Range To</label>
    <input type="date" id="to" name="to" value="{{ old('to') ?? $to ?? '' }}" class="form-control">
</div>

<div class="mb-2">
    <label>Province</label>
    <select name="province" id="province" class="form-control">
        <option selected>Select</option>
        @foreach ($provinces as $province)
        <option
        @if ($province->id == $prov)
        selected
        @endif
        value="{{ $province->id }}">{{ $province->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-12">
    <label for="diocese">Diocese</label>
    <select name="diocese" id="diocese" class="form-control">
        <option selected>Select</option>
        @foreach ($dioceses as $diocese)
        <option
        @if ($diocese->id == $dio)
        selected
        @endif
         value="{{ $diocese->id }}">{{ $diocese->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-12">
    <label for="donation_type">Donation Type</label>
    <select name="donation_type" id="donation_type" class="form-control">
        <option selected>Select</option>
        <option
        @if ($don_type == "CoN Projects Support")
        selected
        @endif
         >CoN Projects Support</option>
        <option
        @if ($don_type == "CoN Mission Partners")
        selected
        @endif
         >CoN Mission Partners</option>
        <option
        @if ($don_type == "CoN Missions Vision Support")
        selected
        @endif
         >CoN Missions Vision Support</option>
        <option
        @if ($don_type == "Others")
        selected
        @endif
         >Others</option>
    </select>
</div>
