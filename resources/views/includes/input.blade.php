<div class="input-wrapper">
    <label for="{{ $input_id }}" class="input-label">
        {{ $label_title }}
        <span class="{{ $required ? $required : 'd-none' }}">*</span>
    </label>

    {{-- photo --}}
    @if ($input_type == 'file')
        <input type="file" accept="image/png, image/gif, image/jpeg" name="{{ $input_name }}" id="{{ $input_id }}"
            class="input-file">
        <div class="img-wrapper">
            <img src="{{ asset($path_photo) }}" alt="">
        </div>
    {{-- date --}}
    @elseif ($input_type == 'date')
        {{-- add date --}}
        @if ($input_value == '')
            <input {{ $disabled }} type="date" placeholder="" value="{{ old($input_name) }}" name="{{ $input_name }}"
                id="{{ $input_id }}" class="input-text" max="{{ date("Y-m-d") }}">
            {{-- edit date --}}
        @else
            <input {{ $disabled }} type="date" placeholder="" value="{{ $input_value }}" name="{{ $input_name }}"
                id="{{ $input_id }}" class="input-text" max="{{ date("Y-m-d") }}">
        @endif
    {{-- datetime --}}
    @elseif ($input_type == 'datetime')
        {{-- add datetime --}}
        @if ($input_value == '')
            <input {{ $disabled }} type="datetime" placeholder="" value="{{ old($input_name) }}" name="{{ $input_name }}"
                id="{{ $input_id }}" class="input-text" max="{{ date("H:i d-m-Y") }}">
            {{-- edit datetime --}}
        @else
            <input {{ $disabled }} type="datetime" placeholder="" value="{{ $input_value }}" name="{{ $input_name }}"
                id="{{ $input_id }}" class="input-text" max="{{ date("H:i d-m-Y") }}">
        @endif
    {{-- email --}}
    @elseif ($input_type == 'email')
        {{-- add email --}}
        @if ($input_value == '')
            <input {{ $disabled }} type="email" placeholder="" value="{{ old($input_name) }}" name="{{ $input_name }}"
                id="{{ $input_id }}" class="input-text">
            {{-- edit email --}}
        @else
            <input {{ $disabled }} type="email" placeholder="" value="{{ $input_value }}" name="{{ $input_name }}"
                id="{{ $input_id }}" class="input-text">
        @endif
    {{-- tel --}}
    @elseif ($input_type == 'tel')
        {{-- add tel --}}
        @if ($input_value == '')
            <input {{ $disabled }} type="tel" pattern="(0|\+84)[0-9]{9}" placeholder="" value="{{ old($input_name) }}" name="{{ $input_name }}"
                id="{{ $input_id }}" class="input-text">
            {{-- edit tel --}}
        @else
            <input {{ $disabled }} type="tel" pattern="(0|\+84)[0-9]{9}" placeholder="" value="{{ $input_value }}" name="{{ $input_name }}"
                id="{{ $input_id }}" class="input-text">
        @endif
    {{-- text --}}
    @elseif ($input_type == 'text')
        {{-- add text --}}
        @if ($input_value == '')
            <input {{ $disabled }} type="text" placeholder="" value="{{ old($input_name) }}" name="{{ $input_name }}"
                id="{{ $input_id }}" class="input-text">
            {{-- edit text --}}
        @else
            <input {{ $disabled }} type="text" placeholder="" value="{{ $input_value }}" name="{{ $input_name }}"
                id="{{ $input_id }}" class="input-text">
        @endif
    {{-- number --}}
    @elseif ($input_type == 'number')
        {{-- quantity --}}
        @if (str_contains($input_id, 'quantity') || str_contains($input_id, 'stock'))
            {{-- add --}}
            @if (empty($input_value))
                <input {{ $disabled }} type="number" placeholder="" value="{{ old($input_name) }}"
                    name="{{ $input_name }}" id="{{ $input_id }}" class="input-text" min="0" step="1">
                {{-- edit --}}
            @else
                <input {{ $disabled }} type="number" placeholder="" value="{{ $input_value }}"
                    name="{{ $input_name }}" id="{{ $input_id }}" class="input-text" min="0" step="1">
            @endif
        {{-- year --}}
        @elseif (str_contains($input_id, 'year'))
            {{-- add --}}
            @if (empty($input_value))
                <input {{ $disabled }} type="number" placeholder="" value="{{ old($input_name) }}"
                    name="{{ $input_name }}" id="{{ $input_id }}" class="input-text" min="1900" step="1" max="{{ date("Y") }}">
                {{-- edit --}}
            @else
                <input {{ $disabled }} type="number" placeholder="" value="{{ $input_value }}"
                    name="{{ $input_name }}" id="{{ $input_id }}" class="input-text" min="1900" step="1" max="{{ date("Y") }}">
            @endif
        {{-- price --}}
        @else
            {{-- add --}}
            @if ($input_value == '')
                <input {{ $disabled }} type="number" placeholder="" value="{{ old($input_name) }}"
                    name="{{ $input_name }}" id="{{ $input_id }}" class="input-text" min="0" step="1000">
                {{-- edit --}}
            @else
                <input {{ $disabled }} type="number" placeholder="" value="{{ $input_value }}"
                    name="{{ $input_name }}" id="{{ $input_id }}" class="input-text" min="0" step="1000">
            @endif
        @endif
    @endif

    @error('{{ $input_name }}')
        <p class="error-msg">{{ $message }}</p>
        {{-- <p class="error-msg">Trường này không được trống</p> --}}
    @enderror
</div>
