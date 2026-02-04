@props(["label", "value" => 0, "accent" => "bg-gray-400", "valueColor" => "text-gray-700"])

<div class="relative rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
    <div class="{{ $accent }} absolute left-0 top-0 h-full w-1 rounded-l-xl"></div>

    <p class="text-sm font-medium text-gray-500">
        {{ $label }}
    </p>

    <p class="{{ $valueColor }} mt-2 text-3xl font-bold">
        {{ $value }}
    </p>

    <p class="mt-1 text-sm font-semibold text-gray-700">
        {{ $slot }}
    </p>
</div>

