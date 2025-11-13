<?php

use function Livewire\Volt\{state, layout};

layout('layouts.default');
state(['code']);

?>

<div>
    <livewire:components.header :code="$code" />
</div>
