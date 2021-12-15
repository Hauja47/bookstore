<div class="input-wrapper">
    <label for="{{ $input_id }}" class="input-label">
        {{ $label_title }}
        <span class="{{ $required ? $required : 'd-none' }}">*</span>
    </label>

    {{-- photo --}}
    @if ($input_type == 'file')
        <input type="file" accept="image/*" name="{{ $input_name }}" id="{{ $input_id }}" class="input-file">
        <div class="img-wrapper">
            <img src="{{ asset($path_photo) }}" alt="">
        </div>
        {{-- date --}}
    @elseif ($input_type == 'date')
        <input {{ $disabled }} type="date" placeholder="" value="{{ old($input_name, $input_value) }}"
            name="{{ $input_name }}" id="{{ $input_id }}" class="input-text" max="{{ date('Y-m-d') }}">

        {{-- datetime --}}
    @elseif ($input_type == 'datetime')
        <input {{ $disabled }} type="datetime" placeholder="" value="{{ old($input_name, $input_value) }}"
            name="{{ $input_name }}" id="{{ $input_id }}" class="input-text"
            max="{{ date('H:i d-m-Y') }}">

        {{-- email --}}
    @elseif ($input_type == 'email')
        <input {{ $disabled }} type="email" placeholder="" value="{{ old($input_name, $input_value) }}"
            name="{{ $input_name }}" id="{{ $input_id }}" class="input-text">

        {{-- tel --}}
    @elseif ($input_type == 'tel')
        <input {{ $disabled }} type="tel" pattern="(0|\+84)[0-9]{9}" placeholder=""
            value="{{ old($input_name, $input_value) }}" name="{{ $input_name }}" id="{{ $input_id }}"
            class="input-text">

        {{-- password --}}
    @elseif ($input_type == 'password')
        <div class="input-password">
            <input {{ $disabled }} type="password" placeholder="" value="{{ old($input_name, $input_value) }}"
                name="{{ $input_name }}" id="{{ $input_id }}" class="input-text">
            <i class="fas fa-eye"></i>
        </div>
        {{-- text --}}
    @elseif ($input_type == 'text')
        <input {{ $disabled }} type="text" placeholder="" value="{{ old($input_name, $input_value) }}"
            name="{{ $input_name }}" id="{{ $input_id }}" class="input-text">

        {{-- number --}}
    @elseif ($input_type == 'number')
            {{-- quantity --}}
        @if (str_contains($input_id, 'quantity') || str_contains($input_id, 'stock')
                    || str_contains($input_id, 'rate')  || str_contains($input_id, 'import'))
            <input {{ $disabled }} type="number" placeholder="" value="{{ old($input_name, $input_value) }}"
                name="{{ $input_name }}" id="{{ $input_id }}" class="input-text" min="0" step="1">
            {{-- year --}}
        @elseif (str_contains($input_id, 'year'))
            <input {{ $disabled }} type="number" placeholder="" value="{{ old($input_name, $input_value) }}"
                name="{{ $input_name }}" id="{{ $input_id }}" class="input-text" min="1901" step="1"
                max="{{ date('Y') }}">
            {{-- price --}}
        @else
            <input {{ $disabled }} type="number" placeholder="" value="{{ old($input_name, $input_value) }}"
                name="{{ $input_name }}" id="{{ $input_id }}" class="input-text" min="0" step="1000">
        @endif
    @endif

    @error($input_name)
        <p class="error-msg">{{ $message }}</p>
        {{-- <p class="error-msg">Trường này không được trống</p> --}}
    @enderror
</div>
