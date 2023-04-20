@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input text-sx sm:text-base rounded sm:rounded-md shadow-none block mt-1 bg-gray-200 font-haireline text-sm px-2 sm:px-3 py-1 sm:py-2 border-transparent outline-non  focus:bg-transparent focus:border-red-400 focus:outline-none focus:shadow-none']) !!}>
